<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormField extends Model
{
    protected $fillable = [
        'google_form_id',
        'field_name',
        'field_id',
        'value_type',
        'value_data',
        'order'
    ];

    protected $casts = [
        'value_data' => 'array'
    ];

    public function googleForm(): BelongsTo
    {
        return $this->belongsTo(GoogleForm::class);
    }

    public function generateValue()
    {
        switch ($this->value_type) {
            case 'fixed':
                return $this->value_data['value'] ?? '';

            case 'random':
                $min = $this->value_data['min'] ?? 1;
                $max = $this->value_data['max'] ?? 100;
                return rand($min, $max);

            case 'list':
                $items = $this->value_data['items'] ?? [];
                return $items[array_rand($items)] ?? '';

            default:
                return '';
        }
    }
}
