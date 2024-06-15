<?php
$_A = "localhost";
$_B = "root";
$_C = "";
$_D = "users_crud_php";
$_E = mysqli_connect($_A, $_B, $_C, $_D);
if(!$_E){
    echo "No se realizo la conexion a la base de datos, el error fue:" . mysqli_connect_error();
}
?>
