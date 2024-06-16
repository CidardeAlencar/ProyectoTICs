<?php
include('../connection.php');
include('../firebase.php');

$con = connection();
$database = getFirebaseDatabase();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Asegurar que la respuesta sea JSON
    header('Content-Type: application/json');

    // Obtener los datos del cuerpo de la solicitud
    $data = json_decode(file_get_contents("php://input"), true);

    $messageId = $data['messageId'];
    $respuesta = $data['respuesta'];

    // Preparar la consulta SQL para actualizar o insertar la respuesta
    $sql = "INSERT INTO mensajes_cliente (id, respuesta) VALUES (?, ?)
            ON DUPLICATE KEY UPDATE respuesta = VALUES(respuesta)";

    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "is", $messageId, $respuesta);
    
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Error al guardar la respuesta en la base de datos.']);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
} else {
    // Asegurar que la respuesta sea JSON
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Método no permitido para esta solicitud.']);
}
?>
