<?php
include './connection.php';

if (isset($_POST['registrar'])) {
    extract($_POST);
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $consulta = "INSERT INTO user (nombre, apPAt, apMAt, correo, telefono, rol)
                     VALUES ('$nombre', '$apPAt', '$apMAt', '$correo', '$telefono', '$rol')";
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
    echo '<script>window.location.href = "../index.php";</script>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/style.css">
    <title>Registrar Uuario</title>
    <style>
        .container {
            width: 35%;
            margin: auto;
            background-color: #f8f9fc;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: black;
            margin-top: 3rem;
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .login-heading {
            text-align: center;
            color: white;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        h1{
    margin: 0;
    color: #5f5b57;
    font-size: 2.5rem;
    font-weight: 500;
}

button{
    width: 170px;
    height: 60px;
    line-height: 60px;
    border-radius: 1px;
    font-weight: 500;
    display: inline-block;
    margin-top: 34px;
    transition: 0.3s linear;display: flex;
    justify-content: center;
    align-items: center;
    background: #e99c2e;
    border: 1px solid #e99c2e;
    white-space: nowrap;
    color: #fff;
    font-size: 1rem;
    font-weight: 500;
    text-transform: capitalize;
    border-radius: 3px;
}
    </style>
</head>

<body>
    <div class="container">
        <form method="POST">
            <h1 class="-heading">Registro de usuario</h1><br>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apPAt">Apellido Paterno:</label>
                <input type="text" name="apPAt" id="apPAt" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apMAt">Apellido Materno:</label>
                <input type="text" name="apMAt" id="apMAt" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" name="telefono" id="telefono" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" name="correo" id="correo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="rol">Rol:</label>
                <select name="rol" id="rol" class="form-control" required>
                    <option value="admin">Administrador</option>
                    <option value="user">Usuario</option>
                </select>
            </div>
            <input type="hidden" name="registrar" value="registrar">

            <center><div class="form-group">
                <button type="submit" class="button">Registrar</button>
            </div></center>
        </form>
    </div>
</body>

</html>