<?php
@include 'connection.php';
$_A = "SELECT 
            c.contratoId, 
            cli.nombre AS cliente, 
            p.nombre AS proveedor, 
            e.nombre AS empleado, 
            ps.nombre AS productoServicio, 
            c.fechaInicio, 
            c.fechaFin, 
            c.monto, 
            c.estado 
        FROM Contratos c
        JOIN Clientes cli ON c.clienteId = cli.clienteId
        JOIN Proveedores p ON c.proveedorId = p.proveedorId
        JOIN Empleados e ON c.empleadoId = e.empleadoId
        JOIN ProductosServicios ps ON c.productoServicioId = ps.productoServicioId";
$_B = mysqli_query($conexion, $_A);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Contratos</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<style>
    /* Estilos generales */

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fc;
    }

    header {
        background-color: #fff;
        padding: 20px;
        text-align: center;
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
        max-width: 1200px;
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
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #e68a0d;
    }

    .button-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    .button-container button {
        margin: 0 10px;
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
</style>

<body>
    <header>
        <h1>Listado de Contratos</h1>
    </header>
    <main>
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Proveedor</th>
                        <th>Empleado</th>
                        <th>Producto/Servicio</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Monto</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
if ($_A && mysqli_num_rows($_A) > 0) {
    while ($_B = mysqli_fetch_assoc($_A)) {
        echo "<tr>";
        echo "<td>" . $_B['contratoId'] . "</td>";
        echo "<td>" . $_B['cliente'] . "</td>";
        echo "<td>" . $_B['proveedor'] . "</td>";
        echo "<td>" . $_B['empleado'] . "</td>";
        echo "<td>" . $_B['productoServicio'] . "</td>";
        echo "<td>" . $_B['fechaInicio'] . "</td>";
        echo "<td>" . $_B['fechaFin'] . "</td>";
        echo "<td>" . $_B['monto'] . "</td>";
        echo "<td>" . $_B['estado'] . "</td>";
        echo '<td>';
        echo '<a href="verContrato.php?id=' . $_B['contratoId'] . '">Ver</a> | ';
        echo '<a href="editar_contrato.php?id=' . $_B['contratoId'] . '">Editar</a> | ';
        echo '<a href="anular_contrato.php?id=' . $_B['contratoId'] . '">Eliminar</a>';
        echo '</td>';
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='10'>No se encontraron contratos.</td></tr>";
}
?>

                </tbody>
            </table>
            <div class="button-container">
                <button onclick="window.location.href='crear_contrato.php'">Crear Nuevo Contrato</button>
            </div>
        </div>
    </main>
</body>

</html>