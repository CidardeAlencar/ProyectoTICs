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
    <title>Listar Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 800px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        h2 {
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
    </style>
</head>
<body>
    <div class="modal-content">
        <span class="close" onclick="window.history.back();">&times;</span>
        <h2>Lista de Productos</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Estado</th>
                    <th>Imagen</th>
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
                        $imagen = $row['imagen_principal'];

                        echo "<tr>
                                <td>$idProducto</td>
                                <td>$nombre</td>
                                <td>$descripcion</td>
                                <td>$precio</td>
                                <td>$categoria</td>
                                <td>$estado</td>
                                <td><img src='assets/images/$imagen' alt='$nombre' width='50'></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No hay productos registrados</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        window.onclick = function(event) {
            if (event.target == document.querySelector('.modal-content')) {
                window.history.back();
            }
        }
    </script>
</body>
</html>
