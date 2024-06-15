<!DOCTYPE html>
<html lang="es">
<head>
    <title>Home</title>
    <?php include 'mproveedores(PROV)/inc/linkPROV.php'; ?>
</head>
<body id="container-page-index">
    <?php include 'mproveedores(PROV)/inc/navbarPROV.php'; ?>
    
    <section class="providers-section">
        <div class="container">
            <?php
            $_A = "localhost";
            $_B = "root";
            $_C = "";
            $_D = "prov";
            $_E = new mysqli($_A, $_B, $_C, $_D);

            if ($_E->connect_error) {
                die("Conexión fallida: " . $_E->connect_error);
            }

            $_F = "SELECT * FROM proveedor";
            $_G = $_E->query($_F);

            if ($_G->num_rows > 0) {
                while($_H = $_G->fetch_assoc()) {
                    echo "<div class='provider-card'>";
                    echo "<img src='mproveedores(PROV)/{$_H['Imagen']}' alt='{$_H['NombreProveedor']}'>";
                    echo "<div class='provider-details'>";
                    echo "<h2>{$_H['NombreProveedor']}</h2>";
                    echo "<p>Dirección: {$_H['Direccion']}</p>";
                    echo "<p>Teléfono: {$_H['Telefono']}</p>";
                    echo "<a href='#' class='btn'>Ver más</a>";
                    echo "</div></div>";
                }
            } else {
                echo "No hay proveedores registrados";
            }
            $_E->close();
            ?>
        </div>
    </section>

    <?php include 'mproveedores(PROV)//inc/footerPROV.php'; ?>
</body>
</html>