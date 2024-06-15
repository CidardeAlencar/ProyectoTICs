<?php
// Verificar si se recibieron los datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userId']) && isset($_POST['estado'])) {
    // Conectar a la base de datos
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "users_crud_php";
    $conexion = mysqli_connect($host, $user, $password, $database);

    // Verificar la conexión
    if (!$conexion) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    // Obtener los datos del POST
    $userId = mysqli_real_escape_string($conexion, $_POST['userId']);
    $estado = mysqli_real_escape_string($conexion, $_POST['estado']);

    // Actualizar el estado del usuario en la base de datos
    $sql = "UPDATE user SET estado = '$estado' WHERE id = '$userId'";

    if (mysqli_query($conexion, $sql)) {
        // Si la actualización fue exitosa, enviar una respuesta adecuada
        echo json_encode(array('success' => true, 'message' => 'Estado actualizado correctamente.'));
    } else {
        // Si hubo un error en la consulta, enviar una respuesta de error
        echo json_encode(array('success' => false, 'message' => 'Error al actualizar el estado.'));
    }

    // Cerrar la conexión
    mysqli_close($conexion);
} else {
    // Si no se recibieron correctamente los datos por POST, enviar una respuesta de error
    echo json_encode(array('success' => false, 'message' => 'Datos incorrectos.'));
}
?>
