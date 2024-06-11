<?php
include 'connection.php';

// Obtener el ID del producto a eliminar desde la URL
$idProducto = $_GET['id'];

// Consulta para obtener los datos del producto a eliminar
$consulta = "SELECT * FROM productos WHERE id_producto = $idProducto";
$resultado = mysqli_query($conexion, $consulta);

// Si se encontró el producto, se muestra el mensaje de confirmación
if ($resultado && mysqli_num_rows($resultado) == 1) {
    $row = mysqli_fetch_assoc($resultado);

    $nombre = $row['nombre'];

    echo '<br><h2>¿Seguro que desea eliminar el producto "' . $nombre . '"?</h2><br>';
    echo '<form action="eliminar_producto.php?id=' . $idProducto . '" method="post">';
    echo '<div class="button-container">';
        echo '<button type="submit" name="eliminar">Eliminar</button>';
        echo '<button type="button" onclick="window.location.href=\'../index.php\'">Cancelar</button>';
        echo'</div>';
    echo '</form>';
} else {
    // Si no se encontró el producto, se muestra un mensaje de error
    echo '<p>Producto no encontrado.</p>';
    exit();
}

// Si se confirma la eliminación (se envía el formulario con el botón "Eliminar"), se elimina el producto
if (isset($_POST['eliminar'])) {
    $consultaEliminar = "DELETE FROM productos WHERE id_producto = $idProducto";

    if (mysqli_query($conexion, $consultaEliminar)) {
        echo '<script>alert("Producto eliminado exitosamente"); window.location.href = "../index.php";</script>';
    } else {
        echo '<script>alert("Error al eliminar el producto"); window.location.href = "../index.php";</script>';
    }
}

?>

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
    background-color: #e99c2e; /* Color principal (cambiado) */
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 0 15px; /* Espacio entre botones */
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

    button {
        font-size: 14px;
    }
}

/* Estilos específicos para la página de eliminar */

.eliminar {
    text-align: center;
    margin-top: 20px;
}

.eliminar h2 {
    color: #e99c2e; /* Color principal */
    margin-bottom: 20px;
}

.eliminar p {
    font-size: 18px;
    margin-bottom: 20px;
}

.eliminar form {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column; /* Alinear en vertical */
    height: 10
}   /* Estilos específicos para la página de eliminar */

.eliminar {
    text-align: center;
    margin-top: 20px;
}

.eliminar h2 {
    color: #e99c2e; /* Color principal */
    margin-bottom: 20px;
}

.eliminar p {
    font-size: 18px;
    margin-bottom: 20px;
}


.button-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 auto; /* Center horizontally */
}

.button-container button {
    margin: 0 15px; /* Space between buttons */
}
    </style>
