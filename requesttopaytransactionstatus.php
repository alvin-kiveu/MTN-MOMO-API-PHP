<?php
include "config.php";
$reference_id = ""; // Replace with your reference ID
$access_token = ""; // Replace with your access token
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay/" . $reference_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); // Ensure GET request
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer " . $access_token,
    "X-Target-Environment: sandbox",
    "Ocp-Apim-Subscription-Key: $secodary_key"
));
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
echo 'Response status code is : ' . $httpcode . "<br>";
echo 'Response: ' . $response;



