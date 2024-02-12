<?php




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
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

print_r($response);

if ($response === false) {
    echo 'Curl error: ' . curl_error($curl);
} else {
    // Decode JSON response
    $json_response = json_decode($response, true);

    // Check if JSON decoding was successful
    if ($json_response !== null) {
        // Output the decoded JSON response
        echo json_encode($json_response, JSON_PRETTY_PRINT);
    } else {
        // Output the raw response if JSON decoding failed
        echo $response;
    }
}

curl_close($curl);
?>
