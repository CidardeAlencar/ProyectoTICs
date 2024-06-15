<?php
include('connection.php');

$conn = connection();

// Revisar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener los productos con sus ventas
$sql = "SELECT id, nombre, precio, categoria, imagen, oferta, ventas
        FROM productos
        ORDER BY id";

$result = $conn->query($sql);

// Cerrar la etiqueta PHP para comenzar el HTML
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./mranking(RANK)/assets/styles/stylesRANK.css">
    <title>Listado de Productos</title>
</head>
<body>

<div class="preferences-table">
    <h1>Listado de Productos con Ventas</h1>
    
    <table>
        <thead>
            <tr>
                <th>Imagen</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Oferta</th>
                <th>Ventas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><img src='".$row['imagen']."' alt='Imagen del producto'></td>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['nombre']."</td>";
                    echo "<td>".$row['precio']."</td>";
                    echo "<td>".$row['categoria']."</td>";
                    echo "<td>".($row['oferta'] == 1 ? 'Sí' : 'No')."</td>";
                    echo "<td>".$row['ventas']."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No se encontraron productos.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
// Cerrar la conexión
$conn->close();
?>

</body>
</html>
