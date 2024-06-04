<!DOCTYPE html>
<html lang="es">
<head>
    <title>Home</title>
    <?php include './inc/linkPROV.php'; ?>
</head>

<body id="container-page-index">
    <?php include './inc/navbarPROV.php'; ?>
    
    <!-- Sección de proveedores -->
    <section class="providers-section">
        <div class="container">
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

            if ($result->num_rows > 0) {
                // Iterar sobre los resultados y mostrar cada proveedor
                while($row = $result->fetch_assoc()) {
                    echo "<div class='provider-card'>";
                    echo "<img src='{$row['Imagen']}' alt='{$row['NombreProveedor']}'>";
                    echo "<div class='provider-details'>";
                    echo "<h2>{$row['NombreProveedor']}</h2>";
                    echo "<p>Dirección: {$row['Direccion']}</p>";
                    echo "<p>Teléfono: {$row['Telefono']}</p>";
                    echo "<a href='#' class='btn'>Ver más</a>";
                    echo "</div></div>";
                }
            } else {
                echo "No hay proveedores registrados";
            }
            $conn->close();
            ?>
        </div>
    </section>

    <?php include './inc/footerPROV.php'; ?>
</body>
</html>
