<?php
require __DIR__ . '/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
function getFirebaseDatabase() {
    $_A = __DIR__ . '/credenciales-firebase.json';
    $_B = (new Factory)->withServiceAccount($_A)->withDatabaseUri('https://proyectoventas-9f9d6-default-rtdb.firebaseio.com');
    return $_B->createDatabase();
}
?>
