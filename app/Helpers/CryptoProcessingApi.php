<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use SebastianBergmann\Environment\Console;

class CryptoProcessingApi
{
	public function callApi($method, $endpoint, $params)
	{
		$BASE_URI = config('app.crypto_processing_base_uri');
		$TOKEN = config('app.crypto_processing_token');
		// $TOKEN = 'ddd';

		$client = new Client();

		try {
			$response = $client->request($method, $BASE_URI . $endpoint, [
				'headers' => [
					'Authorization' => 'Bearer ' . $TOKEN,
				],
				'form_params' => $params
			]);
			$response = json_decode($response->getBody(), true);

			return response()->json([
				'error' => false,
				'apiData' => $response
			])->getData();
		} catch (GuzzleException $e) {
			Log::log("Error", $e->getMessage());
			return response()->json([
				'error' => true,
				'message' => 'Please retry. Contact admin if this persists',
			], 500)->getData();
		}
	}
}
