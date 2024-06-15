<?php
@include 'connection.php';

$_A = $_GET['id'];
$_B = "SELECT * FROM productos WHERE id_producto = $_A";
$_C = mysqli_query($conexion, $_B);

if ($_C && mysqli_num_rows($_C) == 1) {
    $_D = mysqli_fetch_assoc($_C);
    $_E = $_D['nombre'];
    $_F = $_D['descripcion'];
    $_G = $_D['precio'];
    $_H = $_D['categoria'];
    $_I = $_D['estado'];
    $_J = $_D['imagen_principal'];
} else {
    echo '<p>Producto no encontrado.</p>';
    exit();
}

if (isset($_POST['enviar'])) {
    $_K = $_POST['nombre'];
    $_L = $_POST['descripcion'];
    $_M = $_POST['precio'];
    $_N = $_POST['categoria'];
    $_O = $_POST['estado'];
    $_P = $_POST['imagenPrincipal'];

    $_Q = "UPDATE productos SET 
            nombre = '$_K', 
            descripcion = '$_L', 
            precio = $_M, 
            categoria = '$_N', 
            estado = '$_O', 
            imagen_principal = '$_P' 
        WHERE id_producto = $_A";

    if (mysqli_query($conexion, $_Q)) {
        echo '<script>alert("Producto actualizado exitosamente"); window.location.href = "../index.php";</script>';
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
<body>
    <main>
        <div class="container">
            <h2>Editar producto</h2>
            <form action="editar_producto.php?id=<?php echo $_A; ?>" method="post">
                <table border="0" style="width: 100%; border-collapse: collapse; margin: 20px 0;">
                    <tr>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <label for="nombre">Nombre:</label>
                        </td>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <input type="text" id="nombre" name="nombre" value="<?php echo $_E; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <label for="descripcion">Descripción:</label>
                        </td>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <textarea id="descripcion" name="descripcion" rows="5" required><?php echo $_F; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <label for="precio">Precio:</label>
                        </td>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <input type="number" id="precio" name="precio" step="0.01" value="<?php echo $_G; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <label for="categoria">Categoría:</label>
                        </td>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <input type="text" id="categoria" name="categoria" value="<?php echo $_H; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <label for="estado">Estado:</label>
                        </td>
                        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
                            <select id="estado" name="estado" value="<?php echo $_I; ?>" required>
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
