<?php
include 'connection.php';

// Obtener el ID del venta a editar desde la URL
$idventa = $_GET['id'];

// Consulta para obtener los datos del venta a editar
$consulta = "SELECT * FROM ventas WHERE VentaID = $idventa";
$resultado = mysqli_query($conexion, $consulta);

// Si se encontró el venta, se muestran sus datos en el formulario
if ($resultado && mysqli_num_rows($resultado) == 1) {
    $row = mysqli_fetch_assoc($resultado);

    $nombre = $row['Nombre'];
    $descripcion = $row['Descripcion'];
    $precio = $row['Precio'];
    $cantidad = $row['Cantidad'];
    $fechaAgregado = $row['FechaAgregado'];
    $estado = $row['Estado']; // Asegúrate de que tu tabla tiene una columna 'Estado'
} else {
    // Si no se encontró el venta, se muestra un mensaje de error
    echo '<p>venta no encontrado.</p>';
    exit();
}

// Si se envía el formulario, se actualiza la información del venta
if (isset($_POST['enviar'])) {
    $nombreActualizado = $_POST['nombre'];
    $descripcionActualizada = $_POST['descripcion'];
    $precioActualizado = $_POST['precio'];
    $cantidadActualizada = $_POST['cantidad'];
    $fechaAgregadoActualizada = $_POST['fecha_agregado'];
    $estadoActualizado = $_POST['estado']; // Recoge el estado actualizado del formulario

    $consultaActualizacion = "UPDATE ventas SET 
                                nombre = '$nombreActualizado', 
                                descripcion = '$descripcionActualizada', 
                                precio = $precioActualizado, 
                                cantidad = $cantidadActualizada, 
                                fechaAgregado = '$fechaAgregadoActualizada',
                                estado = '$estadoActualizado' 
                            WHERE VentaId = $idventa";

    if (mysqli_query($conexion, $consultaActualizacion)) {
        echo '<script>alert("venta actualizado exitosamente"); window.location.href = "indexVENT.php";</script>';
    } else {
        echo '<script>alert("Error al actualizar el venta");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar contrato</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    /* Estilos CSS generales (igual que antes, pero sin header y footer) */
    button[name="atras"] {
        background-color: blue;
        color: white;
    }

    button[name="atras"]:hover {
        background-color: darkblue;
    }

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

        width: 80%;
        max-width: 800px;
        margin: 0 auto;
    }

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
        background-color: #4a4a4a;
        color: #fff;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"],
    textarea,
    select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    button {
        background-color: #4a4a4a;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #333;
    }

    @media (max-width: 768px) {
        .container {
            width: 95%;
        }
    }
</style>


<body>
    <main>
        <div class="container">
            <h2><i class="fa fa-edit"></i> Editar Venta</h2>
            <form action="editar_venta.php?id=<?php echo $idventa; ?>" method="post">
                <table>
                    <tr>
                        <td><label for="nombre"><i class="fa fa-tag"></i> Nombre:</label></td>
                        <td><input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="descripcion"><i class="fa fa-info-circle"></i> Descripción:</label></td>
                        <td><textarea id="descripcion" name="descripcion" rows="5" required><?php echo $descripcion; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="precio"><i class="fa fa-dollar-sign"></i> Precio:</label></td>
                        <td><input type="number" id="precio" name="precio" step="0.01" value="<?php echo $precio; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="cantidad"><i class="fa fa-sort-numeric-up"></i> Cantidad:</label></td>
                        <td><input type="number" id="cantidad" name="cantidad" value="<?php echo $cantidad; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="fecha_agregado"><i class="fa fa-calendar-alt"></i> Fecha Agregado:</label></td>
                        <td><input type="date" id="fecha_agregado" name="fecha_agregado" value="<?php echo $fechaAgregado; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="estado"><i class="fa fa-toggle-on"></i> Estado:</label></td>
                        <td>
                            <select id="estado" name="estado">
                                <option value="Activo" <?php echo ($estado == 'Activo') ? 'selected' : ''; ?>>Activo</option>
                                <option value="Inactivo" <?php echo ($estado == 'Inactivo') ? 'selected' : ''; ?>>Inactivo</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <button type="submit" name="enviar"><i class="fa fa-save"></i> Actualizar venta</button>
                            <button type="button" name="atras" onclick="window.history.back();"><i class="fa fa-arrow-left"></i> Atrás</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </main>
</body>

</html>