<?php
include "createaccesstoken.php";
$referenceId = "2d0489b2-fe81-43f4-9338-d9c96bbf8bb5";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay/" . $referenceId);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer " . $accessToken,
    "X-Target-Environment: sandbox",
    "Ocp-Apim-Subscription-Key: $secodary_key"
));
$response = curl_exec($ch);
curl_close($ch);
$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
echo 'Response status code is : ' . $httpcode;



