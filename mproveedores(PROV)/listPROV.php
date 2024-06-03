<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambia esto según tu configuración
$password = ""; // Cambia esto según tu configuración
$dbname = "prov";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener lista de proveedores
$sql = "SELECT * FROM proveedor";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proveedores</title>
    <link rel="stylesheet" href="./css/stylePROV.css">
</head>
<body>
    <?php include './inc/linkPROV.php'; ?>
    <?php include './inc/navbarPROV.php'; ?>
    <div class="container">
        <h1 class="tittles-pages-logo">Lista de Proveedores</h1>
        <div class="contenedor-tabla">
            <table>
                <tr class="contenedor-tr">
                    <th class="table-cell-td">NIT</th>
                    <th class="table-cell-td">Nombre</th>
                    <th class="table-cell-td">Dirección</th>
                    <th class="table-cell-td">Teléfono</th>
                    <th class="table-cell-td">Página Web</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr class='contenedor-tr'>
                                <td class='table-cell-td'>{$row['NITProveedor']}</td>
                                <td class='table-cell-td'>{$row['NombreProveedor']}</td>
                                <td class='table-cell-td'>{$row['Direccion']}</td>
                                <td class='table-cell-td'>{$row['Telefono']}</td>
                                <td class='table-cell-td'><a href='{$row['PaginaWeb']}' target='_blank'>{$row['PaginaWeb']}</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr class='contenedor-tr'><td class='table-cell-td' colspan='5'>No hay proveedores</td></tr>";
                }
                $conn->close();
                ?>
            </table>
        </div>
        <p style="text-align: center;"><a href="form_proveedorPROV.php" style="display: inline-block; padding: 10px 20px; background-color: #333333; color: #e99c2e; text-decoration: none; border-radius: 4px; transition: background-color 0.3s ease;">Agregar Proveedor</a></p>

    </div>
    <?php include './inc/footerPROV.php'; ?>
</body>
</html>
