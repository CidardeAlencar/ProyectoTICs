<?php
@include 'connection.php';
$_A = $_GET['id'];
$_B = "SELECT Contratos.*, clientes.nombre AS clienteNombre, proveedores.nombre AS proveedorNombre, empleados.nombre AS empleadoNombre, productosservicios.nombre AS productoServicioNombre 
FROM Contratos 
JOIN clientes ON Contratos.clienteId = clientes.clienteId 
JOIN proveedores ON Contratos.proveedorId = proveedores.proveedorId 
JOIN empleados ON Contratos.empleadoId = empleados.empleadoId 
JOIN productosservicios ON Contratos.productoServicioId = productosservicios.productoServicioId 
WHERE Contratos.contratoId = $_A";
$_C = mysqli_query($conexion, $_B);
if ($_C && mysqli_num_rows($_C) == 1) {
    $_D = mysqli_fetch_assoc($_C);
    $_E = $_D['clienteNombre'];
    $_F = $_D['proveedorNombre'];
    $_G = $_D['empleadoNombre'];
    $_H = $_D['productoServicioNombre'];
    $_I = $_D['fechaInicio'];
    $_J = $_D['fechaFin'];
    $_K = $_D['monto'];
    $_L = $_D['condiciones'];
    $_M = $_D['estado'];
} else {
    echo '<p>Contrato no encontrado.</p>';
    exit();
}
if (isset($_POST['enviar'])) {
    $_N = $_POST['cliente_id'];
    $_O = $_POST['proveedor_id'];
    $_P = $_POST['empleado_id'];
    $_Q = $_POST['producto_servicio_id'];
    $_R = $_POST['fecha_inicio'];
    $_S = $_POST['fecha_fin'];
    $_T = $_POST['monto'];
    $_U = $_POST['condiciones'];
    $_V = $_POST['estado'];
    $_W = "UPDATE Contratos SET 
                clienteId = $_N, 
                proveedorId = $_O, 
                empleadoId = $_P, 
                productoServicioId = $_Q, 
                fechaInicio = '$_R', 
                fechaFin = '$_S', 
                monto = $_T, 
                condiciones = '$_U', 
                estado = '$_V' 
            WHERE contratoId = $_A";
    if (mysqli_query($conexion, $_W)) {
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