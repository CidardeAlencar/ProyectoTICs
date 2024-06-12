<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: index.php");
    die();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Bienvenido, <?php echo $_SESSION['login_user']; ?>!</h2>
        <a href="mLoginParedes(LPAR)/logout.php" class="logout-btn">Cerrar sesión</a>
    </div>
</body>
</html>
