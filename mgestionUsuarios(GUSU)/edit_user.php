<?php
@include './connection.php';
if (isset($_POST['editar'])) {
    extract($_POST);
    $_A = "UPDATE user SET nombre = '$_B', apPAt = '$_C', apMAt = '$_D', correo = '$_E', telefono = '$_F' WHERE id = '$_G'";
    mysqli_query($conexion, $_A);
    mysqli_close($conexion);
    echo '<script>window.location.href = "../index.php";</script>';
    exit();
}
if (isset($_POST['cambiar'])) {
    extract($_POST);
    $_H = '$2y$10$AR40PCQ/GXZDxpyX2./zsO.HxcLM8BHfvo6VYnMS3kqxSo5h/ADqq';
    $_I = "UPDATE user SET password_hash = '$_H', cambio_pass = '0' WHERE id = '$_G'";
    mysqli_query($conexion, $_I);
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
    <title>Editar Usuario</title>
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
        select.form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #fff;
            color: #000;
        }
        .buttong {
            width: 13rem;
        }
        h3{
            margin: 0;
            color: #5f5b57;
            font-size: 2.5rem;
            font-weight: 500;
            z-index: 444;
        }
        button{
            width: 170px;
            height: 60px;
            line-height: 60px;
            border-radius: 1px;
            font-weight: 500;
            display: inline-block;
            margin-top: 34px;
            transition: 0.3s linear;
            display: flex;
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
    <?php
    $_J = $_GET['id'];
    $_K = "SELECT * FROM user WHERE id = '$_J'";
    $_L = mysqli_query($conexion, $_K);
    $_M = mysqli_fetch_array($_L);
    ?>
    <div class="container">
        <form method="POST">
            <h3 class="in-heading">Editar Usuario</h3><br>
            <input type="hidden" name="id" value="<?php echo $_M['id']; ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $_M['nombre']; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apPAt">Apellido Paterno:</label>
                <input type="text" name="apPAt" id="apPAt" value="<?php echo $_M['apPAt']; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apMAt">Apellido Materno:</label>
                <input type="text" name="apMAt" id="apMAt" value="<?php echo $_M['apMAt']; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" name="correo" id="correo" value="<?php echo $_M['correo']; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" name="telefono" id="telefono" value="<?php echo $_M['telefono']; ?>" class="form-control" required>
            </div>
            <input type="hidden" name="editar" value="editar">
            <center>
                <div class="form-group">
                    <button type="submit" class="buttong">Guardar Cambios</button>
                </div>
            </center>
        </form>
    </div>
    <div class="container">
        <form method="POST">
            <?php $_N = $_GET['id']; ?>
            <input type="hidden" name="id" id="id" value="<?php echo $_N; ?>">
            <input type="hidden" name="cambiar" value="cambiar">
            <center><button type="submit" class="buttong" onclick="return confirm('¿Estás seguro de que deseas restablecer la contraseña?')">Restaurar Contraseña</button></center>
        </form>
    </div>
</body>
</html>
