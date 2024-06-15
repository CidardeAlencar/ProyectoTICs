<?php
$svr_nm = "localhost";
$usr_nm = "root";
$pswd = "";
$db_nm = "gestion_personal";  // Cambia a la nueva base de datos

// Crear conexión
$conexion = new mysqli($svr_nm, $usr_nm, $pswd, $db_nm);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

function verificarFuerzaBruta($usuario) {
    global $conexion;
    $ip = $_SERVER['REMOTE_ADDR'];
    $tiempo_limite = 15 * 60; // 15 minutos
    $max_intentos = 5;

    $stmt = $conexion->prepare("SELECT COUNT(*) FROM login_attempts WHERE username = ? AND ip_address = ? AND timestamp > (NOW() - INTERVAL ? SECOND)");
    $stmt->bind_param("ssi", $usuario, $ip, $tiempo_limite);
    $stmt->execute();
    $stmt->bind_result($intentos);
    $stmt->fetch();
    $stmt->close();

    return $intentos >= $max_intentos;
}

function registrarIntentoFallido($usuario) {
    global $conexion;
    $ip = $_SERVER['REMOTE_ADDR'];

    $stmt = $conexion->prepare("INSERT INTO login_attempts (username, ip_address, timestamp) VALUES (?, ?, NOW())");
    $stmt->bind_param("ss", $usuario, $ip);
    $stmt->execute();
    $stmt->close();
}

function limpiarIntentosFallidos($usuario) {
    global $conexion;
    $ip = $_SERVER['REMOTE_ADDR'];

    $stmt = $conexion->prepare("DELETE FROM login_attempts WHERE username = ? AND ip_address = ?");
    $stmt->bind_param("ss", $usuario, $ip);
    $stmt->execute();
    $stmt->close();
}
?>
