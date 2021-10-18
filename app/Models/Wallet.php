<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
	use HasFactory;

	protected $fillable = [
		'user_id',
		'wallet_id_string',
		'name',
		'crypto_type',
		'total_received',
		'total_sent',
		'balance',
	];

	public function address()
	{
		return $this->hasOne(Address::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
