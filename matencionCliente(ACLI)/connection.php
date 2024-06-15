<?php
function connection() {
    $_A = "localhost";
    $_B = "root";
    $_C = "";
    $_D = "users_crud_php";
    $_E = mysqli_connect($_A, $_B, $_C);
    mysqli_select_db($_E, $_D);
    return $_E;
}
?>
