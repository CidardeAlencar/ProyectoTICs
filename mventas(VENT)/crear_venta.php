<?php
include 'connection.php';

if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $fechaAgregado = date('Y-m-d');
    $estado = 'activo';

    // Consulta SQL para insertar la venta
    $consulta = "INSERT INTO ventas (Nombre, Descripcion, Precio, Cantidad, FechaAgregado, Estado) 
                 VALUES ('$nombre', '$descripcion', $precio, $cantidad, '$fechaAgregado', '$estado')";

    if (mysqli_query($conexion, $consulta)) {
        echo '<script>alert("Venta creada exitosamente"); window.location.href = "indexVENT.php";</script>';
    } else {
        echo '<script>alert("Error al crear la venta");</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Venta</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <main>
        <div class="container">
            <h2>Formulario de creación de venta</h2>
            <form method="POST">
            <label for="nombre">Nombre:</label>
<select id="nombre" name="nombre" required>
    <option value="">Selecciona un producto</option>
    <?php
    // Incluir el archivo de conexión si aún no está incluido
    include 'connection.php';

    // Consulta para obtener los nombres de los productos
    $consulta_productos = "SELECT nombre FROM productos";
    $resultado_productos = mysqli_query($conexion, $consulta_productos);

    // Iterar sobre los resultados y generar las opciones del select
    while ($fila = mysqli_fetch_assoc($resultado_productos)) {
        echo '<option value="' . $fila['nombre'] . '">' . $fila['nombre'] . '</option>';
    }
    ?>
</select>


                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="5" required></textarea>

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" step="0.01" required>

                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" required>

                <button type="submit" name="enviar">Crear Venta</button>
                <button type="button" name="atras" onclick="window.history.back();">Atrás</button>
            </form>
        </div>
    </main>
</body>

<style>
    /* Estilos generales */
    button[name="enviar"] {
        background-color: orange;
        color: white;
    }

    button[name="enviar"]:hover {
        background-color: darkorange;
    }

    button[name="atras"] {
        background-color: blue;
        color: white;
    }

    button[name="atras"]:hover {
        background-color: darkblue;
    }

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fc;
        /* Color de fondo del cuerpo */
    }

    header {
        background-color: #fff;
        /* Color de fondo del encabezado */
        padding: 20px;
        text-align: center;
    }

    main {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        /* Altura mínima del contenido principal */
    }

    .container {
        background-color: #fff;
        /* Color de fondo del contenedor principal */
        padding: 30px;
        border-radius: 10px;
        /* Bordes redondeados */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        /* Sombra */
        width: 80%;
        /* Ancho del contenedor */
        max-width: 800px;
        /* Ancho máximo */
        margin: 0 auto;
        /* Centrar el contenedor */
    }

    h1,
    h2 {
        color: #333;
        /* Color de los títulos */
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        /* Eliminar bordes entre celdas */
        margin: 20px 0;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #e99c2e;
        /* Color de fondo de los encabezados de tabla */
        color: #fff;
        /* Color del texto en los encabezados de tabla */
    }

    a {
        color: #e99c2e;
        /* Color de los enlaces */
        text-decoration: none;
        /* Eliminar subrayado en los enlaces */
    }

    a:hover {
        color: #e68a0d;
        /* Color de los enlaces al pasar el cursor */
    }

    button {
        background-color: #e99c2e;
        /* Color de fondo de los botones */
        color: #fff;
        /* Color del texto en los botones */
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #e68a0d;
        /* Color de fondo de los botones al pasar el cursor */
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
            /* Ancho del contenedor en dispositivos móviles */
        }
    }
</style>

</html>

<?php
include 'connection.php';

if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    $estado = $_POST['estado'];
    $imagenPrincipal = $_POST['imagenPrincipal'];

    $consulta = "INSERT INTO ventas (nombre, descripcion, precio, categoria, estado, imagen_principal) VALUES ('$nombre', '$descripcion', $precio, '$categoria', '$estado', '$imagenPrincipal')";

    if (mysqli_query($conexion, $consulta)) {
        echo '<script>alert("venta creado exitosamente"); window.location.href = "ventas.php";</script>';
    } else {
        echo '<script>alert("Error al crear el venta");</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear venta</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <main>
        <div class="container">
            <h2>Formulario de creación de venta</h2>
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

                <button type="submit" name="enviar">Crear venta</button>
            </form>
        </div>
    </main>
</body>

</html>