<?php

function connection(){
    $host = "localhost";
    $user = "root";
    $pass = "";

    $bd = "atencion_cliente";

    $connect = mysqli_connect($host, $user, $pass);

    mysqli_select_db($connect, $bd);

    return $connect;
};
?>
