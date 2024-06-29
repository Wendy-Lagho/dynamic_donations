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
        'comments',
        'donation_date',
        'status',
        'receipt_sent',
        'admin_approved',
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
