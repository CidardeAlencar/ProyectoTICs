<?php
@include 'connection.php';
$_A = connection();
if (isset($_POST['id_preg']) && isset($_POST['respuesta'])) {
    $_B = $_POST['id_preg'];
    $_C = $_POST['respuesta'];
    $_D = "UPDATE users_preguntas SET respuesta='$_C' WHERE id_preg='$_B'";
    $_E = mysqli_query($_A, $_D);
    if ($_E) {
        echo 'Respuesta guardada correctamente.';
    } else {
        echo 'Error al guardar la respuesta: ' . mysqli_error($_A);
    }
} else {
    echo 'No se recibieron datos válidos.';
}
?>
