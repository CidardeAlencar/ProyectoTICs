<?php
include 'connection.php';

// Obtener el ID del contrato a editar desde la URL
$idContrato = $_GET['id'];

// Consulta para obtener los datos del contrato a editar

$consulta = "SELECT Contratos.*, clientes.nombre AS clienteNombre, proveedores.nombre AS proveedorNombre, empleados.nombre AS empleadoNombre, productosservicios.nombre AS productoServicioNombre 
FROM Contratos 
JOIN clientes ON Contratos.clienteId = clientes.clienteId 
JOIN proveedores ON Contratos.proveedorId = proveedores.proveedorId 
JOIN empleados ON Contratos.empleadoId = empleados.empleadoId 
JOIN productosservicios ON Contratos.productoServicioId = productosservicios.productoServicioId 
WHERE Contratos.contratoId = $idContrato";

$resultado = mysqli_query($conexion, $consulta);

// Si se encontró el contrato, se muestran sus datos en el formulario
if ($resultado && mysqli_num_rows($resultado) == 1) {
    $row = mysqli_fetch_assoc($resultado);

    $clienteNombre = $row['clienteNombre'];
    $proveedorNombre = $row['proveedorNombre'];
    $empleadoNombre = $row['empleadoNombre'];
    $productoServicioNombre = $row['productoServicioNombre'];
    $fechaInicio = $row['fechaInicio'];
    $fechaFin = $row['fechaFin'];
    $monto = $row['monto'];
    $condiciones = $row['condiciones'];
    $estado = $row['estado'];
    // ...
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
        echo '<script>alert("Contrato actualizado exitosamente"); window.location.href = "listar_contrato.php";</script>';
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
            <h2>Ver contrato</h2>
            <table>
                <tr>
                    <td><strong>Cliente ID:</strong></td>
                    <td><?php echo $clienteNombre; ?></td>
                </tr>
                <tr>
                    <td><strong>Proveedor ID:</strong></td>
                    <td><?php echo $proveedorNombre; ?></td>
                </tr>
                <tr>
                    <td><strong>Empleado ID:</strong></td>
                    <td><?php echo $empleadoNombre; ?></td>
                </tr>
                <tr>
                    <td><strong>Producto/Servicio ID:</strong></td>
                    <td><?php echo $productoServicioNombre; ?></td>
                </tr>
                <tr>
                    <td><strong>Fecha de inicio:</strong></td>
                    <td><?php echo $fechaInicio; ?></td>
                </tr>
                <tr>
                    <td><strong>Fecha de fin:</strong></td>
                    <td><?php echo $fechaFin; ?></td>
                </tr>
                <tr>
                    <td><strong>Monto:</strong></td>
                    <td><?php echo $monto; ?></td>
                </tr>
                <tr>
                    <td><strong>Condiciones:</strong></td>
                    <td><?php echo $condiciones; ?></td>
                </tr>
                <tr>
                    <td><strong>Estado:</strong></td>
                    <td><?php echo $estado; ?></td>
                </tr>
            </table>
            <div style="text-align: center;">
                <button type="button" name="atras" onclick="window.history.back();">Atrás</button>
            </div>
        </div>
    </main>
</body>

</html>