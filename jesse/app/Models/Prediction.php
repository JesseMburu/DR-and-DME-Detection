<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'original_filename',
        'stored_path',
        'diagnosis',
        'confidence',
        'raw_output',
        'status',
        'processed_at',
        'error_message',
    ];

    protected $casts = [
        'raw_output' => 'array',
        'processed_at' => 'datetime',
        'confidence' => 'float',
    ];
}

