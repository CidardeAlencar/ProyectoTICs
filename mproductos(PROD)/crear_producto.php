<?php
@include 'connection.php';

if (isset($_POST['enviar'])) {
    $_A = $_POST['nombre'];
    $_B = $_POST['descripcion'];
    $_C = $_POST['precio'];
    $_D = $_POST['categoria'];
    $_E = $_POST['estado'];
    $_F = $_POST['imagenPrincipal'];

    $_G = "INSERT INTO productos (nombre, descripcion, precio, categoria, estado, imagen_principal) VALUES ('$_A', '$_B', $_C, '$_D', '$_E', '$_F')";

    if (mysqli_query($conexion, $_G)) {
        echo '<script>alert("Producto creado exitosamente"); window.location.href = "../index.php";</script>';
    } else {
        echo '<script>alert("Error al crear el producto");</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear producto</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fc;
}
header {
    background-color: #fff;
    padding: 20px;
    text-align: center;
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
            <h2>Formulario de creación de producto</h2>
            <form method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="5" required></textarea>

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" step="0.01" required>

                <label for="categoria">Categoría:</label>
                <input type="text" id="categoria" name="categoria" required>

                <label for="estado">Estado:</label>
                <select id="estado" name="estado" required>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>

                <label for="imagenPrincipal">Imagen principal:</label>
                <input type="file" id="imagenPrincipal" name="imagenPrincipal">

                <button type="submit" name="enviar">Crear producto</button>
            </form>
        </div>
    </main>
</body>
</html>
