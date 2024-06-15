<?php
@include 'connection.php';
$_A = connection();
$_B = "SELECT * FROM users_preguntas";
$_C = mysqli_query($_A, $_B);
while ($_D = mysqli_fetch_array($_C)) {
    echo "ID: " . $_D['id_preg'] . "<br>";
    echo "Cliente: " . $_D['cliente'] . "<br>";
    echo "Pregunta: " . $_D['pregunta'] . "<br>";
    echo "Fecha: " . $_D['fecha'] . "<br><br>";
}
?>
