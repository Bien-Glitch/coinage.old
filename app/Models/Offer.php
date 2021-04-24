<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'crypto_type',
        'percentage',
        'min_amount',
        'max_amount'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
