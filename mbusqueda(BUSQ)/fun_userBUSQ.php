<?php
include 'db_connectBUSQ.php';

// FUNCIONALIDAD DE LA VISTA USUARIO
$searchType = $_GET['searchType'] ?? null;
$searchInput = $_GET['searchInput'] ?? null;
$filter = $_GET['filter'] ?? null;
$sql = "SELECT * FROM productos";

if ($searchType && $searchInput) {
    if ($searchType == 'nombre') {
        $sql .= " WHERE nombre LIKE '%$searchInput%'";
    } elseif ($searchType == 'categoria') {
        $sql .= " WHERE categoria LIKE '%$searchInput%'";
    }
} elseif ($filter) {
    if ($filter == 'offers') {
        $sql .= " WHERE oferta = 1";
    } elseif ($filter == 'bestSellers') {
        $sql .= " WHERE ventas > 20";
    }
}

$result = $conn->query($sql);
$output = "";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output .= "<div class='product'>";
        $output .= "<img src='" . $row["imagen"] . "' alt='" . $row["nombre"] . "'>";
        $output .= "<p>" . ($row["oferta"] ? "En oferta" : "") . "</p>";
        $output .= "<h2>" . $row["nombre"] . "</h2>";
        $output .= "<p>Precio: Bs " . $row["precio"] . "</p>";
        // $output .= "<p>Ventas: " . $row["ventas"] . "</p>";
        $output .= "</div>";
    }
} else {
    $output = "No se encontraron productos.";
}
echo $output;
$conn->close();
?>
