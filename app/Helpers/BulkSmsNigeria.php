<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class BulkSmsNigeria
{
	protected $API_KEY;
	protected $SENDER_ID;
	protected $DND;
	protected $RESPONSE_TYPE;

	function __construct()
	{
		$this->API_KEY = config('bulksmsnigeria.api_key');
		$this->SENDER_ID = config('bulksmsnigeria.sender_id');
		$this->DND = config('bulksmsnigeria.dnd');
		$this->RESPONSE_TYPE = 'json';
	}

	public static function sendSMS($OTP, $mobileNumber)
	{
		$API_KEY = config('bulksmsnigeria.api_key');
		$SENDER_ID = config('bulksmsnigeria.sender_id');
		$DND = config('bulksmsnigeria.dnd');
		$RESPONSE_TYPE = 'json';

		$client = new Client([
			'base_uri' => 'https://www.bulksmsnigeria.com'
		]);

		//Your message to send, Adding URL encoding.
		$message = "Welcome to CoinageNG, Your OTP is : $OTP, Do not share with anyone.";


		//Preparing post parameters
		$postData = array(
			'api_token' => $API_KEY,
			'to' => $mobileNumber,
			'from' => $SENDER_ID,
			'body' => $message,
			'dnd' => $DND,
		);

		try {
			$client->request('POST', '/api/v1/sms/create', [
				'headers' => [
					'Accept' => 'application/json',
				],
				'query' => $postData,
			]);

			return response()->json([
				'error' => false,
			])->getData();
		} catch (GuzzleException $e) {
			return response()->json([
				'error' => true,
				'message' => $e->getMessage(),
			], 500)->getData();
		}
	}
}
