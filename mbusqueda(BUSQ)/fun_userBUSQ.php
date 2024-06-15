<?php
include 'db_connectBUSQ.php';

// FUNCIONALIDAD DE LA VISTA USUARIO
$obf_st = $_GET['searchType'] ?? null;
$obf_si = $_GET['searchInput'] ?? null;
$obf_flt = $_GET['filter'] ?? null;
$obf_sql = "SELECT * FROM productos";

if ($obf_st && $obf_si) {
    if ($obf_st == 'nombre') {
        $obf_sql .= " WHERE nombre LIKE '%$obf_si%'";
    } elseif ($obf_st == 'categoria') {
        $obf_sql .= " WHERE categoria LIKE '%$obf_si%'";
    }
} elseif ($obf_flt) {
    if ($obf_flt == 'offers') {
        $obf_sql .= " WHERE oferta = 1";
    } elseif ($obf_flt == 'bestSellers') {
        $obf_sql .= " WHERE ventas > 20";
    }
}

$obf_r = $conn->query($obf_sql);
$obf_out = "";

if ($obf_r->num_rows > 0) {
    while ($obf_row = $obf_r->fetch_assoc()) {
        $obf_out .= "<div class='product'>";
        $obf_out .= "<img src='" . $obf_row["imagen"] . "' alt='" . $obf_row["nombre"] . "'>";
        $obf_out .= "<p>" . ($obf_row["oferta"] ? "En oferta" : "") . "</p>";
        $obf_out .= "<h2>" . $obf_row["nombre"] . "</h2>";
        $obf_out .= "<p>Precio: Bs " . $obf_row["precio"] . "</p>";
        // $obf_out .= "<p>Ventas: " . $obf_row["ventas"] . "</p>";
        $obf_out .= "</div>";
    }
} else {
    $obf_out = "No se encontraron productos.";
}
echo $obf_out;
$conn->close();
?>
