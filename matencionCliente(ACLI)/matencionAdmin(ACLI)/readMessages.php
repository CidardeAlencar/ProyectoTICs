<?php
include('../connection.php');

$con = connection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Asegurar que la respuesta sea JSON
    header('Content-Type: application/json');

    // Obtener el cuerpo de la solicitud y decodificarlo
    $input = json_decode(file_get_contents('php://input'), true);
    $filter = isset($input['filter']) ? $input['filter'] : 'all';

    // Definir la consulta SQL según el filtro
    switch ($filter) {
        case 'with_response':
            $sql = "SELECT * FROM mensajes_cliente WHERE respuesta != ''";
            break;
        case 'without_response':
            $sql = "SELECT * FROM mensajes_cliente WHERE respuesta = ''";
            break;
        default:
            $sql = "SELECT * FROM mensajes_cliente";
            break;
    }

    // Ejecutar la consulta y verificar errores
    if ($query = mysqli_query($con, $sql)) {
        $messages = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $messages[] = $row;
        }

        // Log para depuración
        error_log("Mensajes obtenidos con filtro $filter");

        echo json_encode($messages);
    } else {
        // Log y respuesta de error
        error_log("Error en la consulta SQL: " . mysqli_error($con));
        echo json_encode(['error' => 'Error al obtener mensajes.']);
    }
} else {
    // Asegurar que la respuesta sea JSON
    header('Content-Type: application/json');

    // Log para depuración
    error_log("No se recibieron datos válidos o método no es POST.");

    echo json_encode(['error' => 'No se recibieron datos válidos.']);
}
?>
