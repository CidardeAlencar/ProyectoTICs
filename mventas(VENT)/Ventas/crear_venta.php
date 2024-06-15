<?php
include 'connection.php';

if (isset($_POST['e_1'])) {
    $n_2 = $_POST['n_2'];
    $d_3 = $_POST['d_3'];
    $p_4 = $_POST['p_4'];
    $c_5 = $_POST['c_5'];
    $f_6 = date('Y-m-d');
    $e_7 = 'activo';

    $sql_8 = "INSERT INTO ventas (Nombre, Descripcion, Precio, Cantidad, FechaAgregado,Estado) VALUES ('$n_2', '$d_3', $p_4, $c_5, '$f_6','$e_7')";

    if (mysqli_query($conn, $sql_8)) {
        echo '<script>alert("venta creada exitosamente"); window.location.href = "indexVENT.php";</script>';
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
    <title>Crear Venta</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <main>
        <div class="container">
            <h2>Formulario de creación de venta</h2>
            <form method="POST">
                <label for="n_2">Nombre:</label>
                <input type="text" id="n_2" name="n_2" required>

                <label for="d_3">Descripción:</label>
                <textarea id="d_3" name="d_3" rows="5" required></textarea>

                <label for="p_4">Precio:</label>
                <input type="number" id="p_4" name="p_4" step="0.01" required>

                <label for="c_5">Cantidad:</label>
                <input type="number" id="c_5" name="c_5" required>

                <button type="submit" name="e_1">Crear Venta</button>
                <button type="button" name="b_6" onclick="window.history.back();">Atrás</button>
            </form>
        </div>
    </main>
</body>
<style>
    /* Estilos generales */
    button[name="e_1"] {
        background-color: orange;
        color: white;
    }

    button[name="e_1"]:hover {
        background-color: darkorange;
    }

    button[name="b_6"] {
        background-color: blue;
        color: white;
    }

    button[name="b_6"]:hover {
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

if (isset($_POST['e_1'])) {
    $n_2 = $_POST['n_2'];
    $d_3 = $_POST['d_3'];
    $p_4 = $_POST['p_4'];
    $cat_5 = $_POST['cat_5'];
    $e_7 = $_POST['e_7'];
    $img_8 = $_POST['img_8'];

    $sql_9 = "INSERT INTO ventas (nombre, descripcion, precio, categoria, estado, imagen_principal) VALUES ('$n_2', '$d_3', $p_4, '$cat_5', '$e_7', '$img_8')";

    if (mysqli_query($conn, $sql_9)) {
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
                <label for="n_2">Nombre:</label>
                <input type="text" id="n_2" name="n_2" required>

                <label for="d_3">Descripción:</label>
                <textarea id="d_3" name="d_3" rows="5" required></textarea>

                <label for="p_4">Precio:</label>
                <input type="number" id="p_4" name="p_4" step="0.01" required>

                <label for="cat_5">Categoría:</label>
                <input type="text" id="cat_5" name="cat_5" required>

                <label for="e_7">Estado:</label>
                <select id="e_7" name="e_7" required>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>

                <label for="img_8">Imagen principal:</label>
                <input type="file" id="img_8" name="img_8">

                <button type="submit" name="e_1">Crear venta</button>
            </form>
        </div>
    </main>
</body>
</html>
