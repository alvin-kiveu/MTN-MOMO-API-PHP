<?php
include "config.php";
include "function.php";
echo "==========================<br>";
echo "Create API User<br>";
echo "==========================<br>";
$reference_id = generate_uuid();
echo "Reference ID: " . $reference_id . "<br>";
echo "Callback URL: https://paymant.werusubbot.com/callback.php <br>";
// Set the request URL and data
$url = 'https://sandbox.momodeveloper.mtn.com/v1_0/apiuser';
$data = array(
  'providerCallbackHost' => 'https://paymant.werusubbot.com/callback.php'
);
// Set the headers
$headers = array(
  'Content-Type: application/json',
  'X-Reference-Id: '. $reference_id,
  'Ocp-Apim-Subscription-Key: '. $secodary_key
);
// Initialize cURL
$curl = curl_init();
// Set the cURL options
curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POST => true,
  CURLOPT_POSTFIELDS => json_encode($data),
  CURLOPT_HTTPHEADER => $headers
));
// Execute the cURL request
$response = curl_exec($curl);
//Check for errors
if (curl_errno($curl)) {
  $error_msg = curl_error($curl);
  echo "cURL Error: " . $error_msg;
} else {
  //Get http status code
  $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  // Close the cURL session
  curl_close($curl);
  // Output the response status
  if ($httpcode == 201) {
    echo 'API user created successfully, Ref ID : '. $reference_id .' & response status code is : ' . $httpcode;
  } else {
    echo 'API user creation failed, Response status code is : ' . $httpcode;
    echo "<br>";
    echo "Error : " . $response;
  }
}
echo "<br>";
echo "==========================<br>";
