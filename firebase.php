<?php
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

function g3tF1r3b4s3D4t4b4s3() {
    $_C0NF = __DIR__ . '/credenciales-firebase.json';
    $_F4CT = (new Factory)
        ->withServiceAccount($_C0NF)
        ->withDatabaseUri('https://fir-php-d7973-default-rtdb.firebaseio.com/'); 

    $_DB = $_F4CT->createDatabase();

    return $_DB;
}
?>
