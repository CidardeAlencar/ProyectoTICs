<?php
session_start();
require 'config.php';

$_A = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_B = $_POST['code'];
    $_C = $_SESSION['user_id'];

    $_D = $conn->prepare("SELECT 2fa_code, 2fa_expires FROM empleados WHERE id = ?");
    $_D->bind_param("i", $_C);
    $_D->execute();
    $_D->bind_result($_E, $_F);
    $_D->fetch();
    $_D->close();

    if ($_B == $_E && new DateTime() < new DateTime($_F)) {
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $_C;

        $_G = $conn->prepare("UPDATE empleados SET 2fa_code = NULL, 2fa_expires = NULL WHERE id = ?");
        $_G->bind_param("i", $_C);
        $_G->execute();
        $_G->close();

        header("Location: welcome.php");
        exit();
    } else {
        $_A = "Código de verificación incorrecto o expirado.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verificación de Dos Factores</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Verificación de Dos Factores</h2>
        <?php if ($_A): ?>
            <div class="error-message"><?php echo $_A; ?></div>
        <?php endif; ?>
        <form method="post" action="verify.php">
            <label for="code">Código de Verificación:</label>
            <input type="text" id="code" name="code" required>
            <input type="submit" value="Verificar">
        </form>
    </div>
</body>
</html>
