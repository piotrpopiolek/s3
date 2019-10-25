<?php

require __DIR__ . '/vendor/autoload.php';

use Guzzle\Http\Client;


// create our http client (Guzzle)
$client = new Client('http://localhost:8800', array(
    'request.options' => array(
        'exceptions' => false,
    )
));

// Get all magazines
$request = $client->get('/magazyn');
$response = $request->send();

echo $response;
echo "\n\n";

// Add new magazine
$data = array(
    'name' => 'nazwa',
    'description' => 'opis',
    'index' => 'indeks',
    'barcode' => 'kod kreskowy',
    'client' => 'klient',
    'status' => 'status'
);

$request = $client->post('/magazyn', null, json_encode($data));
$uri = $request->getUri();
$response = $request->send();

echo $uri;
echo $response;
echo "\n\n";