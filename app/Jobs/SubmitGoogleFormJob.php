<?php

namespace App\Jobs;

use App\Models\FormExecution;
use App\Models\ExecutionLog;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SubmitGoogleFormJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 60;
    public $tries = 3;

    protected $execution;
    protected $responseNumber;

    public function __construct(FormExecution $execution, int $responseNumber)
    {
        $this->execution = $execution;
        $this->responseNumber = $responseNumber;
        $this->onQueue('google-forms');
    }

    public function handle()
    {
        try {
            $formData = $this->generateFormData();
            $response = $this->submitToGoogleForm($formData);

            $this->logSuccess($formData, $response);
            $this->updateExecutionProgress(true);
        } catch (\Exception $e) {
            $this->logFailure($e->getMessage());
            $this->updateExecutionProgress(false);

            Log::error('Google Form submission failed', [
                'execution_id' => $this->execution->id,
                'response_number' => $this->responseNumber,
                'error' => $e->getMessage()
            ]);
        }
    }

    private function generateFormData(): array
    {
        $data = [];

        foreach ($this->execution->googleForm->fields as $field) {
            $data[$field->field_id] = $field->generateValue();
        }

        return $data;
    }

    private function submitToGoogleForm(array $formData): array
    {
        $client = new Client([
            'timeout' => 30,
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
            ]
        ]);

        $response = $client->post($this->execution->googleForm->form_url, [
            'form_params' => $formData,
            'allow_redirects' => true
        ]);

        return [
            'status_code' => $response->getStatusCode(),
            'body' => (string) $response->getBody()
        ];
    }

    private function logSuccess(array $requestData, array $responseData): void
    {
        ExecutionLog::create([
            'form_execution_id' => $this->execution->id,
            'response_number' => $this->responseNumber,
            'status' => 'success',
            'request_data' => $requestData,
            'response_data' => $responseData
        ]);
    }

    private function logFailure(string $errorMessage): void
    {
        ExecutionLog::create([
            'form_execution_id' => $this->execution->id,
            'response_number' => $this->responseNumber,
            'status' => 'failed',
            'error_message' => $errorMessage
        ]);
    }

    private function updateExecutionProgress(bool $success): void
    {
        $this->execution->refresh();

        if ($success) {
            $this->execution->increment('completed_responses');
        } else {
            $this->execution->increment('failed_responses');
        }

        $totalProcessed = $this->execution->completed_responses + $this->execution->failed_responses;

        if ($totalProcessed >= $this->execution->total_responses) {
            $this->execution->update([
                'status' => 'completed',
                'completed_at' => now()
            ]);
        }
    }
}
