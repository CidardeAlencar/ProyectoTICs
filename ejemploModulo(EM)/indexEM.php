<?php
include('connection.php');

$con = connection();

$sql = "SELECT * FROM users";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "ejemploModulo(EM)/assets/styleEM.css">
    <title>Usuarios CRUD</title>
</head>
<body>
    <div class = "users-form">
        <form action="ejemploModulo(EM)/insertEM.php" method = "POST">
            <h1>Crear Usuario</h1>
            <input type="text" name = "name" placeholder = "Nombre">
            <input type="text" name = "lastname" placeholder = "Apellido">
            <input type="text" name = "username" placeholder = "Usuario">
            <input type="text" name = "password" placeholder = "Password">
            <input type="text" name = "email" placeholder = "Email">

            <input type="submit" value = "Agregar Usuario">
        </form>
    </div>

    <div class = "users-table">
        <h2>Usuarios Registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($query)): ?>
                <tr>
                    <th> <?= $row['id']?> </th>
                    <th> <?= $row['name']?> </th>
                    <th> <?= $row['lastname']?> </th>
                    <th> <?= $row['username']?> </th>
                    <th> <?= $row['password']?> </th>
                    <th> <?= $row['email']?> </th>

                    <th><a href="ejemploModulo(EM)/updateEM.php?id=<?= $row['id'] ?>" class = "users-table--edit">Editar</a></th>
                    <th><a href="ejemploModulo(EM)/deleteEM.php?id=<?= $row['id'] ?>" class = "users-table--delete">Eliminar</a></th>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>
</html>