<?php
include 'connection.php';

// Obtener el ID del contrato a anular desde la URL
$idContrato = $_GET['id'];

// Si se confirma la anulación (se envía el formulario con el botón "Anular"), se anula el contrato
if (isset($_POST['anular'])) {
    $consultaAnular = "UPDATE Contratos SET estado = 'inactivo' WHERE contratoId = $idContrato";

    if (mysqli_query($conexion, $consultaAnular)) {
        echo '<script>alert("Contrato anulado exitosamente"); window.location.href = "./index.php";</script>';
    } else {
        echo '<script>alert("Error al anular el contrato"); window.location.href = "./index.php";</script>';
    }
}

// Consulta para obtener los datos del contrato a anular
$consulta = "SELECT * FROM Contratos WHERE contratoId = $idContrato";
$resultado = mysqli_query($conexion, $consulta);

// Si se encontró el contrato, se muestra el mensaje de confirmación
if ($resultado && mysqli_num_rows($resultado) == 1) {
    // ...
} else {
    // Si no se encontró el contrato, se muestra un mensaje de error
    echo '<p>Contrato no encontrado.</p>';
    exit();
}
?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fc;
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
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        width: 80%;
        max-width: 800px;
        margin: 0 auto;
    }

    h1,
    h2 {
        color: #333;
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
        color: #e68a0d;
    }

    button {
        background-color: #e99c2e;
        /* Color principal (cambiado) */
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin: 0 15px;
        /* Espacio entre botones */
    }

    button:hover {
        background-color: #e68a0d;
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
        background-color: blue;
        color: white;
    }

    button[name="atras"]:hover {
        background-color: darkblue;
    }
</style>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar contrato</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="eliminar">
        <div class="container">
            <h2>Anular contrato</h2>
            <p>¿Seguro que desea anular el contrato?</p>
            <form action="anular_contrato.php?id=<?php echo $idContrato; ?>" method="post">
                <div class="button-container">
                    <button type="submit" name="anular">Anular</button>
                    <button type="button" name="atras" onclick="window.history.back();">Atrás</button>
                </div>
            </form>
        </div>
    </main>
</body>