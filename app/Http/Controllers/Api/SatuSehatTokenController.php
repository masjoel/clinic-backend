<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class SatuSehatTokenController extends Controller
{
    public function token()
    {
        // $satusehat_url = 'https://api-satusehat-stg.dto.kemkes.go.id';
        // $client_id = 'snf1cD7wnmwF7sYGLdfdgFKm3wC5HAvgqZiRAhv6Lx1uAsut';
        // $client_secret = 'yXJt89ONtePl5a6oSsjhWRPajPwxkPHxexwdeC1rlf8wsA4YGerZzd1OjdzMFNYn';
        $satusehat_url = env('SATUSEHAT_BASE_URL_STG');
        $client_id = env('CLIENTID_STG');
        $client_secret = env('CLIENTSECRET_STG');
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $satusehat_url.'/oauth2/v1/accesstoken?grant_type=client_credentials',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'client_id='.$client_id.'&client_secret='.$client_secret,
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
