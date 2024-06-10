<?php
include 'connection.php';

if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    $estado = $_POST['estado'];
    $imagenPrincipal = $_POST['imagenPrincipal'];

    $consulta = "INSERT INTO productos (nombre, descripcion, precio, categoria, estado, imagen_principal) VALUES ('$nombre', '$descripcion', $precio, '$categoria', '$estado', '$imagenPrincipal')";

    if (mysqli_query($conexion, $consulta)) {
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
</head><style>
    /* Estilos generales */

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fc; /* Color de fondo del cuerpo */
}

header {
    background-color: #fff; /* Color de fondo del encabezado */
    padding: 20px;
    text-align: center;
}

main {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh; /* Altura mínima del contenido principal */
}

.container {
    background-color: #fff; /* Color de fondo del contenedor principal */
    padding: 30px;
    border-radius: 10px; /* Bordes redondeados */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra */
    width: 80%; /* Ancho del contenedor */
    max-width: 800px; /* Ancho máximo */
    margin: 0 auto; /* Centrar el contenedor */
}

h1, h2 {
    color: #333; /* Color de los títulos */
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse; /* Eliminar bordes entre celdas */
    margin: 20px 0;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #e99c2e; /* Color de fondo de los encabezados de tabla */
    color: #fff; /* Color del texto en los encabezados de tabla */
}

a {
    color: #e99c2e; /* Color de los enlaces */
    text-decoration: none; /* Eliminar subrayado en los enlaces */
}

a:hover {
    color: #e68a0d; /* Color de los enlaces al pasar el cursor */
}

button {
    background-color: #e99c2e; /* Color de fondo de los botones */
    color: #fff; /* Color del texto en los botones */
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #e68a0d; /* Color de fondo de los botones al pasar el cursor */
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
        width: 95%; /* Ancho del contenedor en dispositivos móviles */
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
