<?php
include './connection.php';


if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $consulta = "DELETE FROM user WHERE id = '$id'";
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
    echo '<script>window.location.href = "./user.php";</script>';
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
    <title>Eliminar Usuario</title>
    <style>
        .container {
            width: 35%;
            margin: auto;
            background-color: #f8f9fc;
            padding: 0.5rem;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: black;
            margin-top: 3rem;
            border-radius: 10px;
        }

        .confirmation {
            text-align: center;
            margin-top: 2rem;
        }

        .confirmation h3 {
            color: red;
        }

        .buttons-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .buttons-container button {
            margin: 0 10px;
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
        <div class="confirmation">
            <h3>¿Estás seguro de que quieres eliminar este usuario?</h3>
            <div class="buttons-container">
                <form method="GET">
                    <input type="hidden" name="eliminar" value="<?php echo $_GET['id']; ?>">
                    <button type="submit">Sí, Eliminar</button>
                </form>
                <button onclick="window.location.href='./user.php'">Cancelar</button>
            </div>
        </div>
    </div>
</body>


</html>