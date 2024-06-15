<?php
include 'db_connectBUSQ.php';
require '../firebase.php';

// Funcion para obtener datos con MySQL
function getResultsFromMySQL($searchType, $searchInput, $filter, $conn) {
    $sql = "SELECT * FROM productos_busq";

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
    return $result;
}

// Funcion para obtener datos mediante Firebase
function getResultsFromFirebase($searchType, $searchInput, $filter) {
    $database = getFirebaseDatabase();
    $reference = $database->getReference('productos_busq');
    $snapshot = $reference->getSnapshot();
    $productos = $snapshot->getValue();
    
    $filteredProductos = [];

    if ($productos) {
        foreach ($productos as $key => $producto) {
            if ($searchType == 'nombre' && $searchInput) {
                if (stripos($producto['nombre'], $searchInput) !== false) {
                    $filteredProductos[$key] = $producto;
                }
            } elseif ($searchType == 'categoria' && $searchInput) {
                if (stripos($producto['categoria'], $searchInput) !== false) {
                    $filteredProductos[$key] = $producto;
                }
            } elseif ($filter == 'offers' && $producto['oferta'] == 1) {
                $filteredProductos[$key] = $producto;
            } elseif ($filter == 'bestSellers' && $producto['ventas'] > 20) {
                $filteredProductos[$key] = $producto;
            }
        }
    }

    return $filteredProductos;
}

$searchType = $_GET['searchType'] ?? null;
$searchInput = $_GET['searchInput'] ?? null;
$filter = $_GET['filter'] ?? null;

// Variable para alternar entre MySQL y Firebase
$useFirebase = false;

if ($useFirebase) {
    $productos = getResultsFromFirebase($searchType, $searchInput, $filter);
} else {
    $result = getResultsFromMySQL($searchType, $searchInput, $filter, $conn);
}

$output = "";

if ($useFirebase) {
    if (count($productos) > 0) {
        foreach ($productos as $producto) {
            $output .= "<div class='product'>";
            $output .= "<img src='" . $producto["imagen"] . "' alt='" . $producto["nombre"] . "'>";
            $output .= "<p>" . ($producto["oferta"] ? "En oferta" : "") . "</p>";
            $output .= "<h2>" . $producto["nombre"] . "</h2>";
            $output .= "<p>Precio: Bs " . $producto["precio"] . "</p>";
            // $output .= "<p>Ventas: " . $producto["ventas"] . "</p>";
            $output .= "</div>";
        }
    } else {
        $output = "No se encontraron productos.";
    }
} else {
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
}

echo $output;

if (!$useFirebase) {
    $conn->close();
}
?>
