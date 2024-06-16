<?php
include 'connection.php';

// Obtener el ID del contrato a editar desde la URL
$idContrato = $_GET['id'];

// Consulta para obtener los datos del contrato a editar
$consulta = "SELECT * FROM Contratos WHERE contratoId = $idContrato";
$resultado = mysqli_query($conexion, $consulta);

$consultaClientes = "SELECT * FROM Clientes";
$resultadoClientes = mysqli_query($conexion, $consultaClientes);

$consultaProveedores = "SELECT * FROM Proveedores";
$resultadoProveedores = mysqli_query($conexion, $consultaProveedores);

$consultaEmpleados = "SELECT * FROM Empleados";
$resultadoEmpleados = mysqli_query($conexion, $consultaEmpleados);

$consultaProductosServicios = "SELECT * FROM ProductosServicios";
$resultadoProductosServicios = mysqli_query($conexion, $consultaProductosServicios);
// Si se encontró el contrato, se muestran sus datos en el formulario
if ($resultado && mysqli_num_rows($resultado) == 1) {
    $row = mysqli_fetch_assoc($resultado);

    $clienteId = $row['clienteId'];
    $proveedorId = $row['proveedorId'];
    $empleadoId = $row['empleadoId'];
    $productoServicioId = $row['productoServicioId'];
    $fechaInicio = $row['fechaInicio'];
    $fechaFin = $row['fechaFin'];
    $monto = $row['monto'];
    $condiciones = $row['condiciones'];
    $estado = $row['estado'];
} else {
    // Si no se encontró el contrato, se muestra un mensaje de error
    echo '<p>Contrato no encontrado.</p>';
    exit();
}

// Si se envía el formulario, se actualiza la información del contrato
if (isset($_POST['enviar'])) {
    $clienteIdActualizado = $_POST['cliente_id'];
    $proveedorIdActualizado = $_POST['proveedor_id'];
    $empleadoIdActualizado = $_POST['empleado_id'];
    $productoServicioIdActualizado = $_POST['producto_servicio_id'];
    $fechaInicioActualizada = $_POST['fecha_inicio'];
    $fechaFinActualizada = $_POST['fecha_fin'];
    $montoActualizado = $_POST['monto'];
    $condicionesActualizadas = $_POST['condiciones'];
    $estadoActualizado = $_POST['estado'];

    $consultaActualizacion = "UPDATE Contratos SET 
                                clienteId = $clienteIdActualizado, 
                                proveedorId = $proveedorIdActualizado, 
                                empleadoId = $empleadoIdActualizado, 
                                productoServicioId = $productoServicioIdActualizado, 
                                fechaInicio = '$fechaInicioActualizada', 
                                fechaFin = '$fechaFinActualizada', 
                                monto = $montoActualizado, 
                                condiciones = '$condicionesActualizadas', 
                                estado = '$estadoActualizado' 
                            WHERE contratoId = $idContrato";

    if (mysqli_query($conexion, $consultaActualizacion)) {
        echo '<script>alert("Contrato actualizado exitosamente"); window.location.href = "indexCONT.php";</script>';
    } else {
        echo '<script>alert("Error al actualizar el contrato");</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar contrato</title>
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
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
        background-color: #e99c2e;
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
        background-color: #e99c2e;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #e68a0d;
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
            <h2>Editar contrato</h2>
            <form action="editarCONT.php?id=<?php echo $idContrato; ?>" method="post">
                <table>
                    <!-- Cliente ID -->
                    <tr>
                        <td><label for="cliente_id">Cliente:</label></td>
                        <td>
                            <select id="cliente_id" name="cliente_id" required>
                                <?php while ($cliente = mysqli_fetch_assoc($resultadoClientes)) : ?>
                                    <option value="<?php echo $cliente['clienteId']; ?>" <?php if ($clienteId == $cliente['clienteId']) echo "selected"; ?>>
                                        <?php echo $cliente['nombre']; ?> <!-- Reemplaza 'nombre' por el campo que quieras mostrar -->
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </td>
                    </tr>

                    <!-- Proveedor ID -->
                    <tr>
                        <td><label for="proveedor_id">Proveedor:</label></td>
                        <td>
                            <select id="proveedor_id" name="proveedor_id" required>
                                <?php while ($proveedor = mysqli_fetch_assoc($resultadoProveedores)) : ?>
                                    <option value="<?php echo $proveedor['proveedorId']; ?>" <?php if ($proveedorId == $proveedor['proveedorId']) echo "selected"; ?>>
                                        <?php echo $proveedor['nombre']; ?> <!-- Reemplaza 'nombre' por el campo que quieras mostrar -->
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </td>
                    </tr>

                    <!-- Empleado ID -->
                    <tr>
                        <td><label for="empleado_id">Empleado:</label></td>
                        <td>
                            <select id="empleado_id" name="empleado_id" required>
                                <?php while ($empleado = mysqli_fetch_assoc($resultadoEmpleados)) : ?>
                                    <option value="<?php echo $empleado['empleadoId']; ?>" <?php if ($empleadoId == $empleado['empleadoId']) echo "selected"; ?>>
                                        <?php echo $empleado['nombre']; ?> <!-- Reemplaza 'nombre' por el campo que quieras mostrar -->
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </td>
                    </tr>

                    <!-- Producto/Servicio ID -->
                    <tr>
                        <td><label for="producto_servicio_id">Producto/Servicio:</label></td>
                        <td>
                            <select id="producto_servicio_id" name="producto_servicio_id" required>
                                <?php while ($productoServicio = mysqli_fetch_assoc($resultadoProductosServicios)) : ?>
                                    <option value="<?php echo $productoServicio['productoServicioId']; ?>" <?php if ($productoServicioId == $productoServicio['productoServicioId']) echo "selected"; ?>>
                                        <?php echo $productoServicio['nombre']; ?> <!-- Reemplaza 'nombre' por el campo que quieras mostrar -->
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="fecha_inicio">Fecha de Inicio:</label></td>
                        <td><input type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo $fechaInicio; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="fecha_fin">Fecha de fin:</label></td>
                        <td><input type="date" id="fecha_fin" name="fecha_fin" value="<?php echo $fechaFin; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="monto">Monto:</label></td>
                        <td><input type="number" id="monto" name="monto" step="0.01" value="<?php echo $monto; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="condiciones">Condiciones:</label></td>
                        <td><textarea id="condiciones" name="condiciones" rows="5" required><?php echo $condiciones; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="estado">Estado:</label></td>
                        <td>
                            <select id="estado" name="estado" required>
                                <option value="activo" <?php if ($estado == "activo") echo "selected"; ?>>Activo</option>
                                <option value="inactivo" <?php if ($estado == "inactivo") echo "selected"; ?>>Inactivo</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <button type="submit" name="enviar">Actualizar contrato</button>
                            <button type="button" name="atras" onclick="window.history.back();">Atrás</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </main>
</body>

</html>