<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class SatuSehatTokenController extends Controller
{
    protected $satusehatUrl;
    protected $clientId;
    protected $clientSecret;

    public function __construct()
    {
        $this->satusehatUrl = config('satusehat.satusehat_url');
        $this->clientId = config('satusehat.client_id');
        $this->clientSecret = config('satusehat.client_secret');
    }
    public function token()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->satusehatUrl.'/oauth2/v1/accesstoken?grant_type=client_credentials',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'client_id='.$this->clientId.'&client_secret='.$this->clientSecret,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response);
        $token = $data->access_token;
        return response()->json(['token' => $token], 200);
    }
}
