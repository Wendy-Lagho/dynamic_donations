<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'need_id',
        'donation_date',
        'quantity',
        'unit',
        'status',
        'receipt_sent',
        'comments',
        'admin_approved',
    ];

    protected $casts = [
        'donation_date' => 'datetime', // Ensure donation_date is treated as a Carbon instance
        'receipt_sent' => 'boolean', // Assuming receipt_sent is intended to be a boolean
        'admin_approved' => 'boolean', // Assuming admin_approved is intended to be a boolean
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship to the Need model
    public function need()
    {
        return $this->belongsTo(Need::class, 'need_id');
    }
}
