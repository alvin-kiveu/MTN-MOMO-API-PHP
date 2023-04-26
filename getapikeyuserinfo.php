<?php
//INCLUDE THE API USER CREATED
include 'createapiuser.php';
$url = "https://sandbox.momodeveloper.mtn.com/v1_0/apiuser/$reference_id";
// Set the headers
$headers = array(
    'Content-Type: application/json',
    'Ocp-Apim-Subscription-Key: '. $secodary_key
);
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers
));
$response = curl_exec($curl);
if(curl_errno($curl)) {
    $error_msg = curl_error($curl);
    echo "cURL Error: " . $error_msg;
}
curl_close($curl);
echo $response;
