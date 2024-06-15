<?php
// Datos del servidor local
$obf_srvnm = "localhost";
$obf_usrnm = "root";
$obf_pswrd = "";
$obf_dbnm = "db_tienda";

// Crear conexión
$obf_cnn = new mysqli($obf_srvnm, $obf_usrnm, $obf_pswrd, $obf_dbnm);

// Verificar conexión
if ($obf_cnn->connect_error) {
    die("Connection failed: " . $obf_cnn->connect_error);
}
?>
