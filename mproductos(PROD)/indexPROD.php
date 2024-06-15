<?php
@include 'connection.php';

$_A = "SELECT * FROM productos";
$_B = mysqli_query($conexion, $_A);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear producto</title>
    <style>
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
            background-color: #e99c2e;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #e68a0d;
        }
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
                    if ($_B) {
                        while ($_C = mysqli_fetch_assoc($_B)) {
                            $_D = $_C['id_producto'];
                            $_E = $_C['nombre'];
                            $_F = $_C['descripcion'];
                            $_G = $_C['precio'];
                            $_H = $_C['categoria'];
                            $_I = $_C['estado'];

                            echo "<tr>
                                <td>$_D</td>
                                <td>$_E</td>
                                <td>$_F</td>
                                <td>$_G</td>
                                <td>$_H</td>
                                <td>$_I</td>
                                <td>
                                    <a href='mproductos(PROD)/editar_producto.php?id=$_D'>Editar</a> | 
                                    <a href='mproductos(PROD)/eliminar_producto.php?id=$_D'>Eliminar</a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No hay productos registrados</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <a href="mproductos(PROD)/crear_producto.php">Crear nuevo producto</a>
        </div>
    </main>
</body>
</html>
