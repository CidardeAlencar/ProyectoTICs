<?php
@include 'connection.php';
$_A = connection();
$_B = $_POST['cliente'];
$_C = $_POST['pregunta'];
$_D = date("Y-m-d H:i:s");
$_E = "INSERT INTO users_preguntas (cliente, pregunta, fecha) VALUES ('$_B', '$_C', '$_D')";
$_F = mysqli_query($_A, $_E);
if ($_F) {
    Header("Location: indexACLI.php");
}
?>
