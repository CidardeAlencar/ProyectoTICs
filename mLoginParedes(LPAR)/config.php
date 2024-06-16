<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_demo";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

function checkBruteForce($username) {
    global $conn;
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $time_limit = 15 * 60; // 15 minutos
    $max_attempts = 5;

    $stmt = $conn->prepare("SELECT COUNT(*) FROM login_attempts WHERE username = ? AND ip_address = ? AND timestamp > (NOW() - INTERVAL ? SECOND)");
    $stmt->bind_param("ssi", $username, $ip_address, $time_limit);
    $stmt->execute();
    $stmt->bind_result($attempts);
    $stmt->fetch();
    $stmt->close();

    return $attempts >= $max_attempts;
}

function logFailedAttempt($username) {
    global $conn;
    $ip_address = $_SERVER['REMOTE_ADDR'];

    $stmt = $conn->prepare("INSERT INTO login_attempts (username, ip_address, timestamp) VALUES (?, ?, NOW())");
    $stmt->bind_param("ss", $username, $ip_address);
    $stmt->execute();
    $stmt->close();
}

function clearFailedAttempts($username) {
    global $conn;
    $ip_address = $_SERVER['REMOTE_ADDR'];

    $stmt = $conn->prepare("DELETE FROM login_attempts WHERE username = ? AND ip_address = ?");
    $stmt->bind_param("ss", $username, $ip_address);
    $stmt->execute();
    $stmt->close();
}
?>
