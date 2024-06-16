<?php
include('../connection.php');
//Se usa para guardar en la BD personal
//include('../firebase.php');
//Se usa para guardar en la BD del curso
include('../../firebase.php');

$con = connection();
$database = getFirebaseDatabase();

//Guardar en MYSQL
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tipoUsuario']) && isset($_POST['mensaje']) && isset($_POST['clientId'])) {
    $tipoUsuario = $_POST['tipoUsuario'];
    $mensaje = $_POST['mensaje'];
    $clientId = $_POST['clientId'];

    $sql = "INSERT INTO mensajes_cliente (mensaje, respuesta, tipoUsuario, clientId) 
            VALUES ('$mensaje', '', '$tipoUsuario', '$clientId')";
    $query = mysqli_query($con, $sql);

    if ($query) {
        echo 'Mensaje guardado correctamente.';
        $messageId = mysqli_insert_id($con);
        
    } else {
        echo 'Error al guardar el mensaje: ' . mysqli_error($con);
    }
} else {
    echo 'No se recibieron datos válidos.';
}

// Guardar en Firebase
if ($database) {
    $newMessage = $database->getReference('mensajes_cliente')->push([
        'id' => $messageId,
        'mensaje' => $mensaje,
        'respuesta' => '',
        'tipoUsuario' => $tipoUsuario,
        'clientId' => $clientId,
        'fecha' => date('Y-m-d H:i:s')
    ]);

    // Verificar si se guardó correctamente en Firebase (opcional)
    if ($newMessage) {
        echo 'Mensaje guardado correctamente en Firebase.';
    } else {
        echo 'Error al guardar el mensaje en Firebase.';
    }
} else {
    echo 'Error: No se pudo establecer conexión con Firebase.';
}
?>
