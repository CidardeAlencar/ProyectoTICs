<?php
@include '../connection.php';
$_A = connection();
$_B = "SELECT * FROM users";
$_C = mysqli_query($_A, $_B);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Usuarios</title>
</head>
<body>
    <div class="users-form">
        <h1>Lista de Usuarios</h1>
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
                <?php while ($_D = mysqli_fetch_array($_C)): ?>
                <tr>
                    <th><?= $_D['id'] ?></th>
                    <th><?= $_D['name'] ?></th>
                    <th><?= $_D['lastname'] ?></th>
                    <th><?= $_D['username'] ?></th>
                    <th><?= $_D['password'] ?></th>
                    <th><?= $_D['email'] ?></th>
                    <th><a href="ejemploModulo(EM)/updateEM.php?id=<?= $_D['id'] ?>" class="users-table--edit">Editar</a></th>
                    <th><a href="ejemploModulo(EM)/deleteEM.php?id=<?= $_D['id'] ?>" class="users-table--delete">Eliminar</a></th>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
