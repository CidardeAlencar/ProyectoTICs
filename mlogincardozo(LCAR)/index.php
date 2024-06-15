<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="contenedor">
        <h2>Iniciar Sesión</h2>
        <form method="post" action="autenticacion.php">
            <label for="id_ci">CI:</label>
            <input type="text" id="id_ci" name="id_ci" required>

            <label for="id_captcha">Captcha:</label>
            <input type="text" id="id_captcha" name="id_captcha" required>
            <img src="generar_captcha.php" alt="Imagen Captcha">

            <input type="submit" value="Entrar">
        </form>
    </div>
</body>
</html>
