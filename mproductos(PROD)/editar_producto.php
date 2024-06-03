<?php
include 'connection.php';

// Obtener el ID del producto a editar desde la URL
$idProducto = $_GET['id'];

// Consulta para obtener los datos del producto a editar
$consulta = "SELECT * FROM productos WHERE id_producto = $idProducto";
$resultado = mysqli_query($conexion, $consulta);

// Si se encontró el producto, se muestran sus datos en el formulario
if ($resultado && mysqli_num_rows($resultado) == 1) {
    $row = mysqli_fetch_assoc($resultado);

    $nombre = $row['nombre'];
    $descripcion = $row['descripcion'];
    $precio = $row['precio'];
    $categoria = $row['categoria'];
    $estado = $row['estado'];
    $imagenPrincipal = $row['imagen_principal'];
} else {
    // Si no se encontró el producto, se muestra un mensaje de error
    echo '<p>Producto no encontrado.</p>';
    exit();
}

// Si se envía el formulario, se actualiza la información del producto
if (isset($_POST['enviar'])) {
    $nombreActualizado = $_POST['nombre'];
    $descripcionActualizada = $_POST['descripcion'];
    $precioActualizado = $_POST['precio'];
    $categoriaActualizada = $_POST['categoria'];
    $estadoActualizado = $_POST['estado'];
    $imagenPrincipalActualizada = $_POST['imagenPrincipal'];

    $consultaActualizacion = "UPDATE productos SET 
                                nombre = '$nombreActualizado', 
                                descripcion = '$descripcionActualizada', 
                                precio = $precioActualizado, 
                                categoria = '$categoriaActualizada', 
                                estado = '$estadoActualizado', 
                                imagen_principal = '$imagenPrincipalActualizada' 
                            WHERE id_producto = $idProducto";

    if (mysqli_query($conexion, $consultaActualizacion)) {
        echo '<script>alert("Producto actualizado exitosamente"); window.location.href = "productos.php";</script>';
    } else {
        echo '<script>alert("Error al actualizar el producto");</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>
    <link rel="stylesheet" href="style.css">
</head>
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
<body>
    <main>
        <div class="container">
            <h2>Editar producto</h2>
            <form action="editar.php?id=<?php echo $idProducto; ?>" method="post">
                <table border="0" style="width: 100%; border-collapse: collapse; margin: 20px 0;">
                    <tr>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <label for="nombre">Nombre:</label>
                        </td>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <label for="descripcion">Descripción:</label>
                        </td>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <textarea id="descripcion" name="descripcion" rows="5" required><?php echo $descripcion; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <label for="precio">Precio:</label>
                        </td>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <input type="number" id="precio" name="precio" step="0.01" value="<?php echo $precio; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <label for="categoria">Categoría:</label>
                        </td>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <input type="text" id="categoria" name="categoria" value="<?php echo $categoria; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <label for="estado">Estado:</label>
                        </td>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <select id="estado" name="estado" value="<?php echo $estado; ?>" required>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <label for="imagenPrincipal">Imagen principal:</label>
                        </td>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <input type="file" id="imagenPrincipal" name="imagenPrincipal">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding: 8px; text-align: center;">
                            <button type="submit" name="enviar">Actualizar producto</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </main>
</body>
</html>
