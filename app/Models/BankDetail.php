<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    use HasFactory;

    protected $table = 'bank_details';

    protected $fillable = [
        'user_id',
        'account_name',
        'account_number',
        'account_type',
        'bank_name',
        'bank_code',
        'is_verified'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
