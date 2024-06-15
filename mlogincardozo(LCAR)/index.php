<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
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
