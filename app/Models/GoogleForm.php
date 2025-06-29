<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GoogleForm extends Model
{
    protected $fillable = [
        'name',
        'form_id',
        'form_url',
        'description',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function fields(): HasMany
    {
        return $this->hasMany(FormField::class);
    }

    public function executions(): HasMany
    {
        return $this->hasMany(FormExecution::class);
    }
}
