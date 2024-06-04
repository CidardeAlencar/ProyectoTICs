<?php
include 'connection.php';

$consulta = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $consulta);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear producto</title>
    <style>
        /* Estilos CSS generales (igual que antes, pero sin header y footer) */

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fc;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
            margin: 0 auto;
        }

        h1, h2 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #e99c2e;
            color: #fff;
        }

        a {
            color: #e99c2e;
            text-decoration: none;
        }

        a:hover {
            color: #e68a0d;
        }

        button {
            background-color: #e99c2e; /* Color principal (cambiado) */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #e68a0d;
        }

        /* Formularios */

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        /* Ajustes para dispositivos móviles */

        @media (max-width: 768px) {
            .container {
                width: 95%;
            }
        }
    </style>
</head>
<body>
    <main>
        <div class="container">
            <h2>Lista de productos</h2>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Categoría</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultado) {
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            $idProducto = $row['id_producto'];
                            $nombre = $row['nombre'];
                            $descripcion = $row['descripcion'];
                            $precio = $row['precio'];
                            $categoria = $row['categoria'];
                            $estado = $row['estado'];

                            echo "<tr>
                                <td>$idProducto</td>
                                <td>$nombre</td>
                                <td>$descripcion</td>
                                <td>$precio</td>
                                <td>$categoria</td>
                                <td>$estado</td>
                                <td>
                                    <a href='editar_producto.php?id=$idProducto'>Editar</a> | 
                                    <a href='eliminar_producto.php?id=$idProducto'>Eliminar</a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No hay productos registrados</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <a href="crear_producto.php">Crear nuevo producto</a>
        </div>
    </main>
</body>
</html>
