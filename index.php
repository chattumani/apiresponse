<?php

$apiKey = "8C82FE6FD9A74B8789EAFC7C83B441C7";
$apiSecret = "8sshHhyC02+Azz/zXPVvOMhRqPNolqzWfeP2iRM7";
$email = "chaity@symberity.com";
$password = "S@mberity2";

$token = base64_encode("$apiKey:$apiSecret");

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://purple-api.cygnature.io/api/v1.0/auth/token',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => "email=$email&password=$password",
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic ' . $token,
    'app_auth_type: cygnature-oauth2',
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

// Print the response for debugging
echo "Response: " . $response . "\n";

curl_close($curl);

// Decode JSON response
$responseArray = json_decode($response, true);

// Check if response is valid JSON
if ($responseArray === null) {
    die("Error decoding JSON response");
}

// Print the access token
echo "Access Token: " . $responseArray['data']['access_token'] . "\n";

?>
