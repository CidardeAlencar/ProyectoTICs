<?php
include('connection.php');

$con = connection();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['respuesta'])) {
    $messageId = $_POST['id'];
    $replyMessage = $_POST['respuesta'];

    $sql = "UPDATE mensajes_cliente SET respuesta = '$replyMessage' WHERE id = $messageId";
    $query = mysqli_query($con, $sql);

    if ($query) {
        echo 'Respuesta guardada correctamente.';
    } else {
        echo 'Error al guardar la respuesta: ' . mysqli_error($con);
    }
} else {
    echo 'No se recibieron datos válidos.';
}
?>
