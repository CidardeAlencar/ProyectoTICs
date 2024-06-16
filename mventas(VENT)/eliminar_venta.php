<?php
include 'connection.php';

// Obtener el ID del venta a eliminar desde la URL
$idventa = $_GET['id'];

// Si se confirma la eliminación (se envía el formulario con el botón "Eliminar"), se elimina el venta
if (isset($_POST['eliminar'])) {
    $consultaEliminar = "UPDATE ventas SET estado = 'inactivo' WHERE VentaID = $idventa";

    if (mysqli_query($conexion, $consultaEliminar)) {
        echo '<script>alert("venta eliminada exitosamente"); window.location.href = "./indexVENT.php";</script>';
    } else {
        echo '<script>alert("Error al eliminar el venta"); window.location.href = "./indexVENT.php";</script>';
    }
}

// Consulta para obtener los datos del venta a eliminar
$consulta = "SELECT * FROM ventas WHERE VentaID = $idventa";
$resultado = mysqli_query($conexion, $consulta);

// Si se encontró el venta, se muestra el mensaje de confirmación
if ($resultado && mysqli_num_rows($resultado) == 1) {
    // ...
} else {
    // Si no se encontró el venta, se muestra un mensaje de error
    echo '<p>venta no encontrado.</p>';
    exit();
}
?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #e99c2e;
    }

    main {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .container {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;

        width: 80%;
        max-width: 800px;
        margin: 0 auto;
    }

    h1,
    h2 {
        color: #fff;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #e99c2e;
        color: #fff;
    }

    a {
        color: #e99c2e;
        text-decoration: none;
    }

    a:hover {
        color: #e99c2e;
    }

    button {
        background-color: #e99c2e;
        /* Color principal (cambiado) */
        
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin: 0 15px;
        /* Espacio entre botones */
    }

    button:hover {
        background-color: #e99c2e;
    }

    /* Formularios */

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    select,
    textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    /* Ajustes para dispositivos móviles */

    @media (max-width: 768px) {
        .container {
            width: 95%;
        }

        button {
            font-size: 14px;
        }
    }

    /* Estilos específicos para la página de eliminar */

    .eliminar {
        text-align: center;
        margin-top: 20px;
    }

    .eliminar h2 {
        color: #e99c2e;
        /* Color principal */
        margin-bottom: 20px;
    }

    .eliminar p {
        font-size: 18px;
        margin-bottom: 20px;
    }

    .eliminar form {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        /* Alinear en vertical */
        height: 10
    }

    /* Estilos específicos para la página de eliminar */

    .eliminar {
        text-align: center;
        margin-top: 20px;
    }

    .eliminar h2 {
        color: #e99c2e;
        /* Color principal */
        margin-bottom: 20px;
    }

    .eliminar p {
        font-size: 18px;
        margin-bottom: 20px;
    }

    .eliminar form {
        /* No style needed here (removed) */
    }

    .button-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
        /* Center horizontally */
    }

    .button-container button {
        margin: 0 15px;
        /* Space between buttons */
    }

    button[name="atras"] {
        background-color: #e99c2e;
        color: white;
    }

    button[name="atras"]:hover {
        background-color: #e99c2e;
    }
</style>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar contrato</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h2 class="text-center"><i class="fas fa-ban"></i> Inabilitar Venta</h2>
                    </div>
                    <div class="card-body">
                        <p class="lead text-center">¿Seguro que desea inabilitar la venta?</p>
                        <form action="eliminar_venta.php?id=<?php echo $idventa; ?>" method="post">
                            <div class="text-center">
                                <button type="submit" name="eliminar" class="btn btn-danger mr-2"><i class="fas fa-check"></i> Inabilitar</button>
                                <button type="button" name="atras" onclick="window.history.back();" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Atrás</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>