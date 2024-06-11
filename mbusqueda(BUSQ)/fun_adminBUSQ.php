<?php
include 'db_connectBUSQ.php';

// FUNCIONALIDAD VISTA ADMIN
$searchType = $_GET['searchType'] ?? null;
$searchInput = $_GET['searchInput'] ?? null;
$sql = "SELECT * FROM admins";

if ($searchType) {
    if ($searchType == 'administrador' && $searchInput) {
        $sql .= " WHERE nombre LIKE '%$searchInput%' OR apellido_paterno LIKE '%$searchInput%' OR apellido_materno LIKE '%$searchInput%'";
    } elseif ($searchType == 'ci' && $searchInput) {
        $sql .= " WHERE ci LIKE '%$searchInput%'";
    } elseif ($searchType == 'cargo' && $searchInput) {
        $sql .= " WHERE cargo LIKE '%$searchInput%'";
    } elseif ($searchType == 'activos') {
        $sql .= " WHERE estado = 1";
    } elseif ($searchType == 'inactivos') {
        $sql .= " WHERE estado = 0";
    }
}

$result = $conn->query($sql);
$output = "<table border='1'>
            <tr>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>CI</th>
                <th>Cargo</th>
                <th>Estado</th>
            </tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output .= "<tr>";
        $output .= "<td>" . $row["nombre"] . "</td>";
        $output .= "<td>" . $row["apellido_paterno"] . "</td>";
        $output .= "<td>" . $row["apellido_materno"] . "</td>";
        $output .= "<td>" . $row["ci"] . "</td>";
        $output .= "<td>" . $row["cargo"] . "</td>";
        $output .= "<td>" . ($row["estado"] ? "Activo" : "Inactivo") . "</td>";
        $output .= "</tr>";
    }
} else {
    $output .= "<tr><td colspan='6'>No se encontraron administradores.</td></tr>";
}

$output .= "</table>";
echo $output;
$conn->close();
?>
