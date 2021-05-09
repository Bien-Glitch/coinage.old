<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dob',
        'id_number',
        'id_type',
        'id_front',
        'id_back',
        'is_verified',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
