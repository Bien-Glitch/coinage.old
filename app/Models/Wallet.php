<?php

namespace App\Models;

use App\Helpers\CryptoProcessingApi;
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

	public function getWallet($option)
	{
		$cryptoProcessingWalletApi = new CryptoProcessingApi();
		$wallet_id = $this->wallet_id_string;

		$addressResponse = $cryptoProcessingWalletApi->callApi('get', '/wallets' . '/' . $wallet_id . '/addresses', null);
		$value = $addressResponse->apiData->data[0]->$option;

		return number_format($value, 8);
	}
}
