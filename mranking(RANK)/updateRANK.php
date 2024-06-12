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
        <form action="editRANK.php" method="POST">
            <h1>Editar Prefencia de Usuario</h1>
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="text" name="name" value="<?= $row['name'] ?>">
            <input type="text" name="lastname" value="<?= $row['lastname'] ?>">
            <input type="text" name="favorite" value="<?= $row['favorite'] ?>">

            <input type="submit" value="Actualizar Información">
        </form>
    </div>
</body>
</html>
