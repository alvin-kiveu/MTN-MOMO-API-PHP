<?php
//INCLUDE API KEY
include "createapikey.php";
$url = "https://sandbox.momodeveloper.mtn.com/collection/token/";
$headers = array(
    'Authorization: Basic '. base64_encode($reference_id.':'.$apikey),
    'Ocp-Apim-Subscription-Key: '. $secodary_key
);
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => $headers
));
$response = curl_exec($curl);
if(curl_errno($curl)) {
    $error_msg = curl_error($curl);
    echo "cURL Error: " . $error_msg;
}
curl_close($curl);
$data = json_decode($response);
if($data->access_token) {
   $access_token = $data->access_token;
}else{
    echo "Failed to generate access token";
}


