<?php
@include '../connection.php';
$_A = connection();
$_B = $_GET['id'];
$_C = "SELECT * FROM users WHERE id='$_B'";
$_D = mysqli_query($_A, $_C);
$_E = mysqli_fetch_array($_D);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Editar Usuarios</title>
</head>
<body>
    <div class="users-form">
        <form action="editEM.php" method="POST">
            <h1>Editar Usuario</h1>
            <input type="hidden" name="id" value="<?= $_E['id'] ?>">
            <input type="text" name="name" value="<?= $_E['name'] ?>">
            <input type="text" name="lastname" value="<?= $_E['lastname'] ?>">
            <input type="text" name="username" value="<?= $_E['username'] ?>">
            <input type="text" name="password" value="<?= $_E['password'] ?>">
            <input type="text" name="email" value="<?= $_E['email'] ?>">
            <input type="submit" value="Actualizar Información">
        </form>
    </div>
</body>
</html>
