<?php
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

function getFirebaseDatabase() {
    $firebaseConfig = __DIR__ . '/credenciales-firebase.json';
    $factory = (new Factory)
        ->withServiceAccount($firebaseConfig)
        ->withDatabaseUri('https://fir-php-d7973-default-rtdb.firebaseio.com/'); 

    $database = $factory->createDatabase();

    return $database;
}
?>