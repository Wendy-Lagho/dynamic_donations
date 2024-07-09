<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_id',
        'payment_amount',
        'payment_currency',
        'payer_id',
        'payer_name',
        'payer_surname',
        'payer_email',
        'payment_status',
    ];
}
