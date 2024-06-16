<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación de Desempeño</title>
    <link rel="stylesheet" href="../mcategorizacion(CATE)/assets/styles/styleCATE.css">
    <style>
        /* Estilos CSS específicos para la página */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .App {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            background: white;
            padding: 20px;
            display: inline-block;
            width: 90%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #66666666;
            color: black;
            background-color: #fff0db;
            text-align: left;
        }

        th {
            background-color: #e99c2e;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Media Query para dispositivos móviles */
        @media only screen and (max-width: 600px) {
            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            thead,
            tbody,
            tr {
                display: block;
            }

            td {
                display: block;
                width: 90%;
                background-color: #fff0db;
            }

            th {
                display: none;
            }

            tr {
                margin-bottom: 10px;
                border: 1px solid #fff;
            }

            td:before {
                content: attr(data-label);
                font-weight: bold;
                display: inline-block;
                width: 45%;
                color: #e99c2e;
                margin-bottom: 10px;
                word-wrap: break-word;
                white-space: pre-wrap;
            }
        }

        .taks {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .search-form {
            margin-bottom: 10px;
        }

        .search-form input[type="text"] {
            width: 200px;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .search-form button {
            padding: 8px 16px;
            font-size: 16px;
            background-color: #666666;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        /* Botón de edición */
        .edit-btn {
            background-color: #666666;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            /* Quitamos la subrayado por defecto de los enlaces */
            display: inline-block;
            /* Hacemos que se muestre como un bloque */
        }

        .edit-btn:hover {
            background-color: #e99c2e;
        }

        /* Action buttons styling */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            /* Espacio entre los botones */
            margin-top: 20px;
        }

        button.btn {
            background-color: #e99c2e;
            color: #fff;
            font-size: 1.2em;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        /* Back button specific styles */
        button.back-btn {
            background-color: #666666;
        }
    </style>
</head>

<body>
    <div class="App">
        <h1 class="title-compras">EVALUACIÓN</h1>
        <h1 class="title-compras">DE DESEMPEÑO</h1>

        <div class="table-container">
            <h2 style="color:#e99c2e;">Editar datos de los trabajadores</h2>

            <!-- Formulario de búsqueda -->
            <div class="taks">
                <form class="search-form" method="GET" action="">
                    <input type="text" name="buscar" placeholder="Buscar por nombre..." value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : ''; ?>">
                    <button type="submit">Buscar</button>
                </form>
            </div>

            <!-- Tabla de resultados -->
            <table>
                <thead>
                    <tr>
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center;">Nombre del Trabajador</th>
                        <th style="text-align: center;">Cargo</th>
                        <th style="text-align: center;">Ocasional 25%</th>
                        <th style="text-align: center;">Mitad 50%</th>
                        <th style="text-align: center;">Frecuente 75%</th>
                        <th style="text-align: center;">Siempre 100%</th>
                        <th style="text-align: center;">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Inicializamos la conexión a la base de datos
                    $conexion = mysqli_connect("localhost", "root", "", "users_crud_php");

                    // Verificamos la conexión
                    if (!$conexion) {
                        die("Error al conectar con la base de datos: " . mysqli_connect_error());
                    }

                    // Consulta SQL inicial para obtener todos los registros
                    $sql = "SELECT id, nombreTrabajador, cargoDesempeno, ocasional, mitad, frecuente, siempre FROM evaluaciondesempeno";

                    // Verificamos si se envió el formulario de búsqueda
                    if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
                        $busqueda = $_GET['buscar'];

                        // Consulta SQL modificada para buscar por nombre del trabajador
                        $sql_busqueda = "SELECT id, nombreTrabajador, cargoDesempeno, ocasional, mitad, frecuente, siempre 
                                         FROM evaluaciondesempeno 
                                         WHERE nombreTrabajador LIKE '%$busqueda%'";

                        $sql = $sql_busqueda;
                    }

                    $resultado = $conexion->query($sql);

                    // Inicializamos la variable para almacenar los resultados de la búsqueda
                    $resultados = [];

                    // Almacenamos los resultados de la búsqueda en el array $resultados
                    if ($resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_assoc()) {
                            $resultados[] = $row;
                        }
                    } else {
                        echo "<tr><td colspan='8' style='text-align: center;' class='no-results-container'><div class='no-results'>No se encontraron resultados</div></td></tr>";
                    }

                    // Mostrar los registros en la tabla
                    foreach ($resultados as $row) {
                        echo "<tr>";
                        echo "<td data-label='ID'>" . $row["id"] . "</td>";
                        echo "<td data-label='Nombre del Trabajador'>" . $row["nombreTrabajador"] . "</td>";
                        echo "<td data-label='Cargo'>" . $row["cargoDesempeno"] . "</td>";
                        echo "<td data-label='Ocasional 25%'>" . $row["ocasional"] . "</td>";
                        echo "<td data-label='Mitad 50%'>" . $row["mitad"] . "</td>";
                        echo "<td data-label='Frecuente 75%'>" . $row["frecuente"] . "</td>";
                        echo "<td data-label='Siempre 100%'>" . $row["siempre"] . "</td>";
                        echo "<td data-label='Acción'><a href='editardosCATE.php?id=" . htmlspecialchars($row["id"]) . "' class='edit-btn'>Editar</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="action-buttons">
            <button type="button" class="btn back-btn" onclick="window.location.href='indexCATE.php'">Atrás</button>
        </div>
    </div>
</body>

</html>

<?php
// Cerramos la conexión a la base de datos al final del archivo
$conexion->close();
?>