<?php
include 'db_connectBUSQ.php';
require '../firebase.php';

// Funcion para obtener datos con MySQL
function getResultsFromMySQL($searchType, $searchInput, $conn) {
    $sql = "SELECT * FROM admins_busq";

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
    return $result;
}

// Funcion para obtener datos mediante Firebase
function getResultsFromFirebase($searchType, $searchInput) {
    $database = getFirebaseDatabase();
    $reference = $database->getReference('admins_busq');
    $snapshot = $reference->getSnapshot();
    $admins = $snapshot->getValue();
    
    $filteredAdmins = [];

    if ($admins) {
        foreach ($admins as $key => $admin) {
            if ($searchType == 'administrador' && $searchInput) {
                if (stripos($admin['nombre'], $searchInput) !== false || stripos($admin['apellido_paterno'], $searchInput) !== false || stripos($admin['apellido_materno'], $searchInput) !== false) {
                    $filteredAdmins[$key] = $admin;
                }
            } elseif ($searchType == 'ci' && $searchInput) {
                if (stripos($admin['ci'], $searchInput) !== false) {
                    $filteredAdmins[$key] = $admin;
                }
            } elseif ($searchType == 'cargo' && $searchInput) {
                if (stripos($admin['cargo'], $searchInput) !== false) {
                    $filteredAdmins[$key] = $admin;
                }
            } elseif ($searchType == 'activos' && $admin['estado'] == 1) {
                $filteredAdmins[$key] = $admin;
            } elseif ($searchType == 'inactivos' && $admin['estado'] == 0) {
                $filteredAdmins[$key] = $admin;
            }
        }
    }

    return $filteredAdmins;
}

$searchType = $_GET['searchType'] ?? null;
$searchInput = $_GET['searchInput'] ?? null;

// Variable para alternar entre MySQL y Firebase
$useFirebase = false;

if ($useFirebase) {
    $admins = getResultsFromFirebase($searchType, $searchInput);
} else {
    $result = getResultsFromMySQL($searchType, $searchInput, $conn);
}

$output = "<table border='1'>
            <tr>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>CI</th>
                <th>Cargo</th>
                <th>Estado</th>
            </tr>";

if ($useFirebase) {
    if (count($admins) > 0) {
        foreach ($admins as $admin) {
            $output .= "<tr>";
            $output .= "<td>" . $admin["nombre"] . "</td>";
            $output .= "<td>" . $admin["apellido_paterno"] . "</td>";
            $output .= "<td>" . $admin["apellido_materno"] . "</td>";
            $output .= "<td>" . $admin["ci"] . "</td>";
            $output .= "<td>" . $admin["cargo"] . "</td>";
            $output .= "<td>" . ($admin["estado"] ? "Activo" : "Inactivo") . "</td>";
            $output .= "</tr>";
        }
    } else {
        $output .= "<tr><td colspan='6'>No se encontraron administradores.</td></tr>";
    }
} else {
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
}

$output .= "</table>";
echo $output;

if (!$useFirebase) {
    $conn->close();
}
?>
