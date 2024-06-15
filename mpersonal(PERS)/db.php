<?php
$srv = "localhost";
$usr = "root";
$pwd = "";
$db = "gestion_personal";

$con = new mysqli($srv, $usr, $pwd, $db);

if ($con->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
}
?>
