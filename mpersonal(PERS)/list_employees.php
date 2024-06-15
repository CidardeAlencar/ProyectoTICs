<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .cnt {
            max-width: 1100px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: orange;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: orange;
            color: white;
        }

        .btn {
            background-color: orange;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: darkorange;
        }

        .search-btn {
            background-color: orange;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        .search-btn:hover {
            background-color: darkorange;
        }
    </style>
</head>
<body>
<div class="cnt">
        <h1>Gestión de Personal</h1>
        <a href="mpersonal(PERS)/add_employee.php" class="btn">Añadir Empleado</a>
        <a href="mpersonal(PERS)/add_academic_record.php" class="btn">Añadir Registro Académico</a>
        <a href="mpersonal(PERS)/edit_employee.php" class="btn">Editar Empleado</a>
        <a href="mpersonal(PERS)/change_status.php" class="btn">Cambiar Estado</a>
        <a href="mpersonal(PERS)/list_employees.php" class="btn">Lista de Empleados</a>
        <a href="../index.php" class="btn">Regresar</a>
    </div>
    <div class="cnt">
        <h1>Lista de Empleados</h1>
        <form method="get" action="">
            <label for="search">Buscar:</label>
            <input type="text" id="search" name="search" placeholder="Nombre, Apellido, Correo o CI">
            <input type="submit" value="Buscar" class="btn search-btn">
        </form>
        <table>
            <tr>
                <th>CI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo Electrónico</th>
                <th>Número de Celular</th>
                <th>Cargo</th>
                <th>Departamento</th>
                <th>Estado</th>
                <th>Grado e Institución</th>
            </tr>
            <?php
            include 'db.php';

            $w = "";

            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $s = $_GET['search'];
                $w = "WHERE nombre LIKE '%$s%' OR apellido LIKE '%$s%' OR correo LIKE '%$s%' OR ci = '$s'";
            }

            $q = "SELECT empleados.*, registros_academicos.grado, registros_academicos.institucion FROM empleados LEFT JOIN registros_academicos ON empleados.id_empleado = registros_academicos.id_empleado $w";
            $r = $conn->query($q);

            if ($r->num_rows > 0) {
                while($row = $r->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ci"] . "</td>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["apellido"] . "</td>";
                    echo "<td>" . $row["correo"] . "</td>";
                    echo "<td>" . $row["numero_celular"] . "</td>";
                    echo "<td>" . $row["cargo"] . "</td>";
                    echo "<td>" . $row["departamento"] . "</td>";
                    echo "<td>" . $row["estado"] . "</td>";
                    echo "<td>";
                    if ($row["grado"]) {
                        echo $row["grado"] . " en " . $row["institucion"];
                    } else {
                        echo "No hay registros académicos";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No hay empleados registrados.</td></tr>";
            }
            $conn->close();
            ?>
        </table>
        <a href="./index.php" class="btn btn-primary">Regresar</a>
    </div>
</body>
</html>
