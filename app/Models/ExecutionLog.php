<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExecutionLog extends Model
{
    protected $fillable = [
        'form_execution_id',
        'response_number',
        'status',
        'request_data',
        'response_data',
        'error_message'
    ];

    protected $casts = [
        'request_data' => 'array',
        'response_data' => 'array'
    ];

    public function execution(): BelongsTo
    {
        return $this->belongsTo(FormExecution::class, 'form_execution_id');
    }
}
