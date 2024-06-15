<?php
function connection() {
    $_A = "localhost";
    $_B = "root";
    $_C = "";
    $_D = "contracts_db";
    $_E = mysqli_connect($_A, $_B, $_C);
    mysqli_select_db($_E, $_D);
    return $_E;
}
?>
