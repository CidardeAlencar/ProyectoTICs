<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examinar Elementos</title>
</head>
<body>
    <h2>PRODUCTOS MAS VENDIDOS DEL SITIO WEB</h2>
    
    <?php
    // Establecer la conexión con la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tics";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }

    // Consulta SQL para obtener los elementos de la tabla producto
    $sql = "SELECT * FROM producto";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar los datos en una tabla
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Ranking De preferencia</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["nombre"]."</td><td>".$row["descripcion"]."</td><td>".$row["precio"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron elementos en la tabla producto";
    }

    $conn->close();
    ?>

    <br>

</body>
</html>


