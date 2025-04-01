<?php
//INCLUDE THE API USER CREATED
include 'createapiuser.php';
//GET API USER CREATED
$url = "https://sandbox.momodeveloper.mtn.com/v1_0/apiuser/$reference_id/apikey";
$headers = array(
    'Content-Type: application/json',
    'Ocp-Apim-Subscription-Key: ' . $secodary_key
);
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_POSTFIELDS => ''
));
curl_setopt($curl, CURLOPT_USERPWD, $secodary_key . ':');
$response = curl_exec($curl);
if (curl_errno($curl)) {
    $error_msg = curl_error($curl);
    echo "cURL Error: " . $error_msg;
}
curl_close($curl);
// echo $response;
// Parse the JSON response
$data = json_decode($response);
echo "==========================<br>";
echo "Create API key<br>";
echo "==========================<br>";
// Check if the API key was generated successfully
$data = json_decode($response);
if ($data !== null) {
    $apikey = $data->apiKey; // Accessing the apiKey value
    echo "APY KEY: " . $apikey . "<br>";
} else {
    echo "Invalid JSON data";
}
echo "==========================<br>";
