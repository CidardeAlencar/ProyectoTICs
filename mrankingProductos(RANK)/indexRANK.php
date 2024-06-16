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
    <link rel="stylesheet" href="mrankingProductos(RANK)/assets/styleRANK.css">
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
            echo '<img src="mrankingProductos(RANK)/assets/'.$row["imagen"].'" alt="'.$row["nombre"].'" onclick="openPopup(\'mrankingProductos(RANK)/assets/'.$row["imagen"].'\', \''.$row["nombre"].'\', \''.$row["precio"].'\', \''.$row["categoria"].'\', '.$row["ventas"].')">';
            
            echo '<p>'.$row["nombre"].'</p>';
            echo '<p class="ventas">Ventas: '.$row["ventas"].'</p>'; 
            echo '</div>';
        }
    } else {
        echo "No se encontraron productos.";
    }
    $conn->close();
    ?>
</div>

<!-- Popup para mostrar la imagen y la información adicional -->
<div id="popup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <img id="popupImg">
        <h2 id="popupTitle"></h2>
        <p id="popupCategory"></p>
        <p id="popupPrice"></p>
        <p id="popupSales"></p>
    </div>
</div>

<script>
function openPopup(imgSrc, imgAlt, price, category, sales) {
    var popup = document.getElementById("popup");
    var popupImg = document.getElementById("popupImg");
    var popupTitle = document.getElementById("popupTitle");
    var popupCategory = document.getElementById("popupCategory");
    var popupPrice = document.getElementById("popupPrice");
    var popupSales = document.getElementById("popupSales");

    popupImg.src = imgSrc;
    popupImg.alt = imgAlt;
    popupTitle.textContent = imgAlt;
    popupCategory.textContent = "Categoría: " + category;
    popupPrice.textContent = "Precio: $" + price;
    popupSales.textContent = "Ventas: " + sales;

    popup.style.display = "flex"; // Cambiar a flex para usar el alineamiento central
    document.body.style.overflow = "hidden"; // Evitar el scroll del fondo
}

// Función para cerrar el popup
function closePopup() {
    var popup = document.getElementById("popup");
    popup.style.display = "none";
    document.body.style.overflow = ""; // Restaurar el scroll del fondo
}

// Cerrar popup al hacer clic fuera de la ventana
window.onclick = function(event) {
    var popup = document.getElementById("popup");
    if (event.target == popup) {
        popup.style.display = "none";
        document.body.style.overflow = ""; // Restaurar el scroll del fondo
    }
}
</script>

</body>
</html>
