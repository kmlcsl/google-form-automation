<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GoogleForm;
use App\Models\FormExecution;
use App\Jobs\SubmitGoogleFormJob;
use Illuminate\Http\Request;

class ExecutionController extends Controller
{
    public function index()
    {
        $executions = FormExecution::with('googleForm')
            ->latest()
            ->paginate(15);

        return view('admin.executions.index', compact('executions'));
    }

    public function show(FormExecution $execution)
    {
        $execution->load(['googleForm', 'logs' => function ($query) {
            $query->latest()->take(100);
        }]);

        return view('admin.executions.show', compact('execution'));
    }

    public function execute(Request $request, GoogleForm $googleForm)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'total_responses' => 'required|integer|min:1|max:10000',
            'delay_seconds' => 'required|integer|min:1|max:300'
        ]);

        $execution = FormExecution::create([
            'google_form_id' => $googleForm->id,
            'name' => $validated['name'],
            'total_responses' => $validated['total_responses'],
            'delay_seconds' => $validated['delay_seconds'],
            'status' => 'running',
            'started_at' => now()
        ]);

        // Dispatch jobs dengan delay
        for ($i = 1; $i <= $validated['total_responses']; $i++) {
            SubmitGoogleFormJob::dispatch($execution, $i)
                ->delay(now()->addSeconds($i * $validated['delay_seconds']));
        }

        return redirect()->route('admin.executions.show', $execution)
            ->with('success', "Eksekusi dimulai! {$validated['total_responses']} respons akan dikirim dengan delay {$validated['delay_seconds']} detik.");
    }
}
