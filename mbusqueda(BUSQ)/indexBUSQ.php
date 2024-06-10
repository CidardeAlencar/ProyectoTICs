<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tienda";

// Creamos la conexión con la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificamos la conexión
if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

$keyword = isset($_GET['search']) ? $_GET['search'] : '';
$keyword = $conn->real_escape_string($keyword);

$sql = "SELECT * FROM productos WHERE nombre LIKE '%$keyword%' OR categoria LIKE '%$keyword%'";
$result = $conn->query($sql);

$productos = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}
$conn->close();

echo json_encode($productos);
?>
