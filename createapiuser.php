<?php
// Generate UUID with the format 8-4-4-4-12
function generate_uuid()
{
  return sprintf(
    '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff),
    mt_rand(0, 0x0fff) | 0x4000,
    mt_rand(0, 0x3fff) | 0x8000,
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff)
  );
}
$reference_id = generate_uuid();
$secodary_key = "9ca287c8d46e4455a8faab803dd2e4d2";
// Set the request URL and data
$url = 'https://sandbox.momodeveloper.mtn.com/v1_0/apiuser';
$data = array(
  'providerCallbackHost' => 'https://portal.umeskiasoftwares.com/umeskiapay/momocallbackurl.php'
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
// Check for errors
// if (curl_errno($curl)) {
//   $error_msg = curl_error($curl);
//   echo "cURL Error: " . $error_msg;
// } else {
//   //Get http status code
//   $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//   // Close the cURL session
//   curl_close($curl);
//   // Output the response status
//   if ($httpcode == 201) {
//     echo 'API user created successfully, Ref ID : '. $reference_id .' & response status code is : ' . $httpcode;
//   } else {
//     echo 'API user creation failed, Response status code is : ' . $httpcode;
//     echo "<br>";
//     echo "Error : " . $response;
//   }
// }
