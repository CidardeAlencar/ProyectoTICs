<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script>
        function refreshCaptcha() {
            document.getElementById('captcha_image').src = 'captcha.php?' + Math.random();
        }

        setInterval(refreshCaptcha, 60000); // Recargar CAPTCHA cada 60 segundos
    </script>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php
        session_start();
        if (isset($_SESSION['error_message'])) {
            echo '<div class="error-message">' . $_SESSION['error_message'] . '</div>';
            unset($_SESSION['error_message']);
        }
        ?>
        <form action="login.php" method="post">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <label for="captcha">Ingrese el código de la imagen:</label>
            <input type="text" id="captcha" name="captcha" required>
            <br>
            <img id="captcha_image" src="captcha.php" alt="CAPTCHA Image">
            <br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
