<?php
require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Google\Cloud\Firestore\ServiceAccount;
use Kreait\Firebase\Auth;
use GuzzleHttp\Client;


$factory = (new Factory)
->withServiceAccount('clientdb-e7462-firebase-adminsdk-iqoz7-45cb0788ed.json')
->withDatabaseUri('https://clientdb-e7462-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();
$auth = $factory->createAuth();

// $client = new Client();
// $apiKey = 'clientdb-e7462-firebase-adminsdk-iqoz7-45cb0788ed.json';
// $databaseURL = 'https://clientdb-e7462-default-rtdb.firebaseio.com/';
// $response = $client->get("$databaseURL.json?auth=$apiKey");

// $data = json_decode($response->getBody(), true);
// print_r($data);
?>