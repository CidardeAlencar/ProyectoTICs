<?php
include 'db_connectBUSQ.php';

// FUNCIONALIDAD VISTA ADMIN
$obf_st = $_GET['searchType'] ?? null;
$obf_si = $_GET['searchInput'] ?? null;
$obf_sql = "SELECT * FROM admins";

if ($obf_st) {
    if ($obf_st == 'administrador' && $obf_si) {
        $obf_sql .= " WHERE nombre LIKE '%$obf_si%' OR apellido_paterno LIKE '%$obf_si%' OR apellido_materno LIKE '%$obf_si%'";
    } elseif ($obf_st == 'ci' && $obf_si) {
        $obf_sql .= " WHERE ci LIKE '%$obf_si%'";
    } elseif ($obf_st == 'cargo' && $obf_si) {
        $obf_sql .= " WHERE cargo LIKE '%$obf_si%'";
    } elseif ($obf_st == 'activos') {
        $obf_sql .= " WHERE estado = 1";
    } elseif ($obf_st == 'inactivos') {
        $obf_sql .= " WHERE estado = 0";
    }
}

$obf_r = $conn->query($obf_sql);
$obf_out = "<table border='1'>
            <tr>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>CI</th>
                <th>Cargo</th>
                <th>Estado</th>
            </tr>";

if ($obf_r->num_rows > 0) {
    while ($obf_row = $obf_r->fetch_assoc()) {
        $obf_out .= "<tr>";
        $obf_out .= "<td>" . $obf_row["nombre"] . "</td>";
        $obf_out .= "<td>" . $obf_row["apellido_paterno"] . "</td>";
        $obf_out .= "<td>" . $obf_row["apellido_materno"] . "</td>";
        $obf_out .= "<td>" . $obf_row["ci"] . "</td>";
        $obf_out .= "<td>" . $obf_row["cargo"] . "</td>";
        $obf_out .= "<td>" . ($obf_row["estado"] ? "Activo" : "Inactivo") . "</td>";
        $obf_out .= "</tr>";
    }
} else {
    $obf_out .= "<tr><td colspan='6'>No se encontraron administradores.</td></tr>";
}

$obf_out .= "</table>";
echo $obf_out;
$conn->close();
?>
