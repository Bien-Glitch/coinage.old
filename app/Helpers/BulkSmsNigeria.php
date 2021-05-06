<?php

namespace App\Helpers;

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


    public function sendSMS($OTP, $mobileNumber)
    {
        $isError = 0;
        $errorMessage = true;

        //Your message to send, Adding URL encoding.
        $message = "Welcome to CoinageNG, Your OTP is : $OTP, Do not share with anyone.";


        //Preparing post parameters
        $postData = array(
            'api_token' => $this->API_KEY,
            'to' => $mobileNumber,
            'from' => $this->SENDER_ID,
            'body' => $message,
            'dnd' => $this->DND,
        );

        $url = "https://www.bulksmsnigeria.com/api/v1/sms/create";

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
        ));

        // $headers = [
        //     'Accept: application/json',
        //     'Content-Type: application/json',
        // ];

        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        //Ignore SSL certificate verification
        // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        //get response
        $output = curl_exec($ch);

        //Print error if any
        if (curl_errno($ch)) {
            $isError = true;
            $errorMessage = curl_error($ch);
        }
        curl_close($ch);
        if ($isError) {
            return array('error' => true, 'message' => $errorMessage);
        } else {
            return array('error' => false);
        }
    }
}
