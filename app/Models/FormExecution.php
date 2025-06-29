<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormExecution extends Model
{
    protected $fillable = [
        'google_form_id',
        'name',
        'total_responses',
        'completed_responses',
        'failed_responses',
        'status',
        'delay_seconds',
        'started_at',
        'completed_at'
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'completed_at' => 'datetime'
    ];

    public function googleForm(): BelongsTo
    {
        return $this->belongsTo(GoogleForm::class);
    }

    public function logs(): HasMany
    {
        return $this->hasMany(ExecutionLog::class);
    }

    public function getProgressPercentageAttribute()
    {
        return $this->total_responses > 0
            ? round(($this->completed_responses + $this->failed_responses) / $this->total_responses * 100, 2)
            : 0;
    }
}
