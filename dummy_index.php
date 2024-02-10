<?php
echo "manish";
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
  CURLOPT_POSTFIELDS => 'email=chaity%40symberity.com&password=S%40mberity2',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic OEM4MkZFNkZEOUE3NEI4Nzg5RUFGQzdDODNCRDQ0MUM3Ojhzc2hIaHlDMDIrQXp6L3pYUHZvT01oUnFQTm9scXpXZmVQMmlSTTc=',
    'app_auth_type: cygnature-oauth2',
    'Accept: application/json',
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

// Get the request header before executing cURL request
//$requestHeader = curl_getinfo($curl, CURLINFO_HEADER_OUT);

// Output the request header
//echo "Request Header: " . $requestHeader . "\n";



$response = curl_exec($curl);



curl_close($curl);

// Decode the json response
$responseArray = json_decode($response, true);

// Check if response is valid json
if ($responseArray !== null && isset($responseArray['data']['access_token'])) {
    // Print the access token
    echo "Access Token: " . $responseArray['data']['access_token'];
} else {
    // Handle error or print response
    echo "Error: Unable to retrieve access token.";
}

?>
