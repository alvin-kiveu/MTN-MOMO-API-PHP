<?php
include "createaccesstoken.php";
$url = 'https://sandbox.momodeveloper.mtn.com/collection/v1_0/account/balance';
$headers = array(
    'Authorization: Bearer  '.$access_token,
    'X-Target-Environment: sandbox',
    'Ocp-Apim-Subscription-Key: '.$secodary_key
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
echo 'Response status code is : ' . $httpcode;

?>
