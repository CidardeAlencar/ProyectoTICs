<?php
include('../connection.php');

$con = connection();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['clientId'])) {
    $clientId = $_POST['clientId'];

    // Escapar el clientId para evitar SQL Injection
    $clientId = mysqli_real_escape_string($con, $clientId);

    $sql = "SELECT * FROM mensajes_cliente WHERE clientId = '$clientId'";
    $query = mysqli_query($con, $sql);

    $messages = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $messages[] = $row;
    }

    // Log para depuración
    error_log("Mensajes obtenidos para clientId $clientId: " . json_encode($messages));

    echo json_encode($messages);
} else {
    // Log para depuración
    error_log("No se recibieron datos válidos o método no es POST.");

    echo json_encode(['error' => 'No se recibieron datos válidos.']);
}
?>
