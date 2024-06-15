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
    $x12_v3 = "localhost";
    $y34_v3 = "root";
    $z56_v3 = "";
    $db78_v3 = "tics";

    $con_v3 = new mysqli($x12_v3, $y34_v3, $z56_v3, $db78_v3);
    
    if ($con_v3->connect_error) {
        die("Error en la conexión: " . $con_v3->connect_error);
    }

    $s23_v3 = "SELECT * FROM producto";
    $r45_v3 = $con_v3->query($s23_v3);

    if ($r45_v3->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Ranking De preferencia</th></tr>";
        while($rw67_v3 = $r45_v3->fetch_assoc()) {
            echo "<tr><td>".$rw67_v3["id"]."</td><td>".$rw67_v3["nombre"]."</td><td>".$rw67_v3["descripcion"]."</td><td>".$rw67_v3["precio"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron elementos en la tabla producto";
    }

    $con_v3->close();
    ?>

    <br>

</body>
</html>
