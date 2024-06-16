<?php
session_start();
require 'mlogincardozo(LCAR)/config.php';  // Incluye tu archivo de configuración de base de datos
require 'mlogincardozo(LCAR)/send_email.php'; // Incluye el archivo de envío de email

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Verifica las credenciales del usuario
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ? AND email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Genera el código de verificación y su tiempo de expiración
            $code = rand(100000, 999999);
            $expires = date("Y-m-d H:i:s", strtotime('+10 minutes'));

            // Almacena el código y la expiración en la base de datos
            $stmt = $conn->prepare("UPDATE users SET 2fa_code = ?, 2fa_expires = ? WHERE id = ?");
            $stmt->bind_param("ssi", $code, $expires, $id);
            $stmt->execute();

            // Envía el código de verificación por correo electrónico usando PHPMailer
            $subject = "Tu código de verificación";
            $message = "Tu código de verificación es: $code";

            if (sendVerificationEmail($email, $subject, $message)) {
                // Almacena temporalmente el ID del usuario en la sesión y redirige a la página de verificación
                $_SESSION['user_id'] = $id;
                header("Location: mlogincardozo(LCAR)/verify.php");
                exit();
            } else {
                $error = "Error al enviar el correo electrónico.";
            }
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Nombre de usuario o correo electrónico no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if ($error): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post" action="mlogincardozo(LCAR)/login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
