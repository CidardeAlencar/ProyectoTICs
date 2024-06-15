<?php
session_start();
require 'config.php';  // Incluye tu archivo de configuración de base de datos
require 'send_email.php'; // Incluye el archivo de envío de email

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ci = $_POST['ci'];
    $captcha = $_POST['captcha'];

    // Verificar el captcha
    if ($captcha !== $_SESSION['captcha']) {
        $error = "Captcha incorrecto.";
    } else {
        // Verifica el CI del usuario
        $stmt = $conn->prepare("SELECT id, email FROM empleados WHERE ci = ?");
        $stmt->bind_param("s", $ci);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $email);
            $stmt->fetch();

            // Genera el código de verificación y su tiempo de expiración
            $code = rand(100000, 999999);
            $expires = date("Y-m-d H:i:s", strtotime('+10 minutes'));

            // Almacena el código y la expiración en la base de datos
            $stmt = $conn->prepare("UPDATE empleados SET 2fa_code = ?, 2fa_expires = ? WHERE id = ?");
            $stmt->bind_param("ssi", $code, $expires, $id);
            $stmt->execute();

            // Envía el código de verificación por correo electrónico usando PHPMailer
            $subject = "Tu código de verificación";
            $message = "Tu código de verificación es: $code";

            if (sendVerificationEmail($email, $subject, $message)) {
                // Almacena temporalmente el ID del usuario en la sesión y redirige a la página de verificación
                $_SESSION['user_id'] = $id;
                header("Location: verify.php");
                exit();
            } else {
                $error = "Error al enviar el correo electrónico.";
            }
        } else {
            $error = "CI no encontrado.";
        }
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
        <form method="post" action="login.php">
            <label for="ci">CI:</label>
            <input type="text" id="ci" name="ci" required>

            <label for="captcha">Captcha:</label>
            <input type="text" id="captcha" name="captcha" required>
            <img src="captcha.php" alt="Captcha Image">

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
