<?php
$_A = "localhost";
$_B = "root";
$_C = "";
$_D = "gestion_personal";
$_E = new mysqli($_A, $_B, $_C, $_D);
if ($_E->connect_error) {
    die("Conexión fallida: " . $_E->connect_error);
}
function checkBruteForce($_F) {
    global $_E;
    $_G = $_SERVER['REMOTE_ADDR'];
    $_H = 15 * 60;
    $_I = 5;
    $_J = $_E->prepare("SELECT COUNT(*) FROM login_attempts WHERE username = ? AND ip_address = ? AND timestamp > (NOW() - INTERVAL ? SECOND)");
    $_J->bind_param("ssi", $_F, $_G, $_H);
    $_J->execute();
    $_J->bind_result($_K);
    $_J->fetch();
    $_J->close();
    return $_K >= $_I;
}
function logFailedAttempt($_F) {
    global $_E;
    $_G = $_SERVER['REMOTE_ADDR'];
    $_L = $_E->prepare("INSERT INTO login_attempts (username, ip_address, timestamp) VALUES (?, ?, NOW())");
    $_L->bind_param("ss", $_F, $_G);
    $_L->execute();
    $_L->close();
}
function clearFailedAttempts($_F) {
    global $_E;
    $_G = $_SERVER['REMOTE_ADDR'];
    $_M = $_E->prepare("DELETE FROM login_attempts WHERE username = ? AND ip_address = ?");
    $_M->bind_param("ss", $_F, $_G);
    $_M->execute();
    $_M->close();
}
?>
