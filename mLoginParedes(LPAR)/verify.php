<?php
session_start();
require 'config.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    $user_id = $_SESSION['user_id'];

    // Verifica el código y la expiración
    $stmt = $conn->prepare("SELECT 2fa_code, 2fa_expires FROM empleados WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($stored_code, $expires);
    $stmt->fetch();
    $stmt->close();  // Cierra el statement actual para evitar el error de sincronización

    if ($code == $stored_code && new DateTime() < new DateTime($expires)) {
        // Código correcto y no expirado
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $user_id;

        // Limpia el código de verificación
        $stmt = $conn->prepare("UPDATE empleados SET 2fa_code = NULL, 2fa_expires = NULL WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->close();

        header("Location: welcome.php");
        exit();
    } else {
        $error = "Código de verificación incorrecto o expirado.";
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
        <?php if ($error): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post" action="verify.php">
            <label for="code">Código de Verificación:</label>
            <input type="text" id="code" name="code" required>
            <input type="submit" value="Verificar">
        </form>
    </div>
</body>
</html>
