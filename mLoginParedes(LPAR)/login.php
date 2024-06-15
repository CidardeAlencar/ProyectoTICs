<?php
session_start();
require 'config.php';
require 'send_email.php';
$_A = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_B = $_POST['ci'];
    $_C = $_POST['captcha'];
    if ($_C !== $_SESSION['captcha']) {
        $_A = "Captcha incorrecto.";
    } else {
        $_D = $conn->prepare("SELECT id, email FROM empleados WHERE ci = ?");
        $_D->bind_param("s", $_B);
        $_D->execute();
        $_D->store_result();
        if ($_D->num_rows == 1) {
            $_D->bind_result($_E, $_F);
            $_D->fetch();
            $_G = rand(100000, 999999);
            $_H = date("Y-m-d H:i:s", strtotime('+10 minutes'));
            $_I = $conn->prepare("UPDATE empleados SET 2fa_code = ?, 2fa_expires = ? WHERE id = ?");
            $_I->bind_param("ssi", $_G, $_H, $_E);
            $_I->execute();
            $_J = "Tu código de verificación";
            $_K = "Tu código de verificación es: $_G";
            if (sendVerificationEmail($_F, $_J, $_K)) {
                $_SESSION['user_id'] = $_E;
                header("Location: verify.php");
                exit();
            } else {
                $_A = "Error al enviar el correo electrónico.";
            }
        } else {
            $_A = "CI no encontrado.";
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
        <?php if ($_A): ?>
            <div class="error-message"><?php echo $_A; ?></div>
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
