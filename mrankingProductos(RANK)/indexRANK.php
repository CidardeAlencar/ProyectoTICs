<?php
// Establecer la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users_crud_php";

$conn = new mysqli($servername, $username, $password, $dbname);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examinar Elementos</title>
    <link rel="stylesheet" href="mrankingProductos(RANK)\assets\styleRANK.css">
</head>
<body>
<div class="smooth-header">
    <div class="container">
        <h1>Los más vendidos de nuestro Sitio</h1>
        <p>Reviews</p>
    </div>
</div>
<div class="gallery">    
    <?php
    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }
    // Consulta para obtener la tabla de productos, ordenados por ventas descendentes
    $sql = "SELECT id, nombre, precio, categoria, imagen, ventas FROM productos ORDER BY ventas DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="product">';
            echo '<img src="mrankingProductos(RANK)/assets/'.$row["imagen"].'" alt="'.$row["nombre"].'">';
            echo '<p>'.$row["nombre"].'</p>';
            echo '</div>';
        }
    } else {
        echo "No se encontraron productos.";
    }
    $conn->close();
    ?>
    <br>
</div>
</body>
</html>
