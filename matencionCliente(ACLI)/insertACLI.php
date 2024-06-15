<?php
include('connection.php');

$con = connection();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tipoUsuario']) && isset($_POST['mensaje'])) {
    $tipoUsuario = $_POST['tipoUsuario'];
    $mensaje = $_POST['mensaje'];

    $sql = "INSERT INTO mensajes_cliente (tipoUsuario, mensaje) VALUES ('$tipoUsuario', '$mensaje')";
    $query = mysqli_query($con, $sql);

    if ($query) {
        echo 'Mensaje guardado correctamente.';
    } else {
        echo 'Error al guardar el mensaje: ' . mysqli_error($con);
    }
} else {
    echo 'No se recibieron datos válidos.';
}
?>
