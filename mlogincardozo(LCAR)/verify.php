<?php
session_start();
require 'config.php';

$error_mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo_verificacion = $_POST['codigo'];
    $id_usuario = $_SESSION['id_usuario'];

    // Verifica el código y la expiración
    $consulta = $conn->prepare("SELECT 2fa_code, 2fa_expires FROM empleados WHERE id = ?");
    $consulta->bind_param("i", $id_usuario);
    $consulta->execute();
    $consulta->bind_result($codigo_almacenado, $expiracion);
    $consulta->fetch();
    $consulta->close();  // Cierra el statement actual para evitar el error de sincronización

    if ($codigo_verificacion == $codigo_almacenado && new DateTime() < new DateTime($expiracion)) {
        // Código correcto y no expirado
        $_SESSION['logueado'] = true;
        $_SESSION['id_usuario'] = $id_usuario;

        // Limpia el código de verificación
        $consulta = $conn->prepare("UPDATE empleados SET 2fa_code = NULL, 2fa_expires = NULL WHERE id = ?");
        $consulta->bind_param("i", $id_usuario);
        $consulta->execute();
        $consulta->close();

        header("Location: bienvenido.php");
        exit();
    } else {
        $error_mensaje = "Código de verificación incorrecto o expirado.";
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
    <div class="contenedor">
        <h2>Verificación de Dos Factores</h2>
        <?php if ($error_mensaje): ?>
            <div class="mensaje-error"><?php echo $error_mensaje; ?></div>
        <?php endif; ?>
        <form method="post" action="verificar.php">
            <label for="codigo">Código de Verificación:</label>
            <input type="text" id="codigo" name="codigo" required>
            <input type="submit" value="Verificar">
        </form>
    </div>
</body>
</html>
