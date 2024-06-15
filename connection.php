<?php

function c0nn3cti0n(){
    $_H = "localhost";
    $_U = "root";
    $_P = "";

    $_D = "users_crud_php";

    $_C = mysqli_connect($_H, $_U, $_P);

    mysqli_select_db($_C, $_D);

    return $_C;
};
?>
