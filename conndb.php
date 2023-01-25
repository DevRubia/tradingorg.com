<?php

require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Google\Cloud\Firestore\ServiceAccount;
use Kreait\Firebase\Auth;



$factory = (new Factory)
->withServiceAccount('clientdb-e7462-firebase-adminsdk-iqoz7-45cb0788ed.json')
->withDatabaseUri('https://clientdb-e7462-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();
$auth = $factory->createAuth();
?>