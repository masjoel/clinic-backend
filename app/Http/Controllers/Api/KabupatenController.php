<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    protected $satuSehatToken;

    public function __construct(SatuSehatTokenController $satuSehatTokenController)
    {
        $this->satuSehatToken = $satuSehatTokenController;
    }

    public function index(Request $request)
    {
        $token = $this->satuSehatToken->token()->getData()->token;
        $curl = curl_init();
        $codes = $request->province_codes ?? 0;

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-satusehat-stg.dto.kemkes.go.id//masterdata/v1/cities?province_codes='.$codes,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response);
        return response()->json($data);
    }
}
