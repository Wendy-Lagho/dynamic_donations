<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Need extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'quantity_needed',
        'priority_level',
        'date_added',
        'status',
    ];
}
