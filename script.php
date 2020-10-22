<?php
// composer require guzzlehttp/guzzle:^7.0
require 'vendor/autoload.php';

// Dealing with errors

$firstName = "Testa";
$lastName = "Maximala";
$email = "laurenz920@gmail.com";
$lokalgruppe = "Rom";

// to overall config
$VOGELNEST_SECRET = "brotzeit";
$VOGELNEST_BASE_URL = 'http://localhost:5000';

$client = new  GuzzleHttp\Client([
    // Base URI is used with relative requests
    'base_uri' => $VOGELNEST_BASE_URL,
]);

$json = array('firstName' => $firstName, 'lastName' => $lastName,
    'email' => $email, 'lokalgruppe' => $lokalgruppe);

$response = $client->request('POST', 'create_user', [
    'json' => $json,
    'auth' => ['civicrm', $VOGELNEST_SECRET]
]);

print $response->getBody();

?>