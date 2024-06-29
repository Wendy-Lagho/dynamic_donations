<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Need extends Model
{
    use HasFactory;

    protected $fillable = [
        'need_name',
        'quantity_required',
        'fulfilled',
    ];

    protected $casts = [
        'fulfilled' => 'boolean',
    ];

    protected $table = 'needs'; // Specify the table name explicitly if different from the model name
}
