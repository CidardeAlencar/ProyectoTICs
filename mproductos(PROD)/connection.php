<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "users_crud_php";
$conexion = mysqli_connect($host, $user, $password, $database);
if(!$conexion){
echo "No se realizo la conexion a la base de datos, el error fue:".
mysqli_connect_error() ;
}
?>