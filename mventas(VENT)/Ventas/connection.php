<?php

$h_1 = "localhost";
$u_2 = "root";
$p_3 = "";
$d_4 = "ventaphp";
$conn_5 = mysqli_connect($h_1, $u_2, $p_3, $d_4);
if (!$conn_5) {
    echo "No se realizo la conexion a la base de datos, el error fue:" . mysqli_connect_error();
}
?>
