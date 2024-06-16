<?php
// Establecer la conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "users_crud_php (1)");

// Verificar la conexión
if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Consulta SQL inicial para obtener todos los registros de la tabla productos
$sql = "SELECT id_producto, nombre, descripcion, precio, categoria, estado, imagen_principal, fVencimiento FROM productos";
$resultado = $conexion->query($sql);

// Inicializar el array para almacenar los resultados de la búsqueda
$resultados = [];

// Verificar si se envió el formulario de búsqueda
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
    $busqueda = $_GET['buscar'];

    // Consulta SQL modificada para buscar por nombre del producto
    $sql_busqueda = "SELECT id_producto, nombre, descripcion, precio, categoria, estado, imagen_principal, fVencimiento 
                     FROM productos 
                     WHERE nombre LIKE '%$busqueda%'";

    $resultado = $conexion->query($sql_busqueda);

    // Almacenar los resultados de la búsqueda en el array $resultados
    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $resultados[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Lista de Productos</h1>

        <!-- Formulario de búsqueda -->
        <form class="form-inline mt-3 mb-3" method="GET" action="">
            <input type="text" class="form-control mr-sm-2" name="buscar" placeholder="Buscar por nombre..." value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : ''; ?>">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <!-- Tabla de resultados -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Producto</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Categoría</th>
                        <th>Estado</th>
                        <th>Imagen Principal</th>
                        <th>Fecha de Vencimiento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Mostrar los registros en la tabla
                    
                    
                    
                        foreach ($resultados as $row) {
                            echo "<tr>";
                            echo "<td>" . $row["id_producto"] . "</td>";
                            echo "<td>" . $row["nombre"] . "</td>";
                            echo "<td>" . $row["descripcion"] . "</td>";
                            echo "<td>" . $row["precio"] . "</td>";
                            echo "<td>" . $row["categoria"] . "</td>";
                            echo "<td>" . $row["estado"] . "</td>";
                            echo "<td><img src='" . $row["imagen_principal"] . "' width='100' height='100'></td>";
                            echo "<td>" . $row["fVencimiento"] . "</td>";
                            echo "</tr>";
                        }
                    
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

<?php
// Cerrar la conexión a la base de datos al final del archivo
$conexion->close();
?>
