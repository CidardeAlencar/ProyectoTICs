<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $captcha = $_POST['captcha'];

    if (checkBruteForce($username)) {
        $_SESSION['error_message'] = "Demasiados intentos fallidos. Inténtalo más tarde.";
        header("location: index.php");
        exit();
    }

    if ($captcha != $_SESSION['captcha']) {
        logFailedAttempt($username);
        $_SESSION['error_message'] = "El código CAPTCHA es incorrecto.";
        header("location: index.php");
        exit();
    }

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($password, $hashed_password)) {
        clearFailedAttempts($username);
        $_SESSION['login_user'] = $username;
        header("location: welcome.php");
    } else {
        logFailedAttempt($username);
        $_SESSION['error_message'] = "Usuario o contraseña inválidos.";
        header("location: index.php");
    }
}
?>
