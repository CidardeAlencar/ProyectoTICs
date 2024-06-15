<?php
@include 'connection.php';

$_A = $_GET['id'];
$_B = "SELECT * FROM productos WHERE id_producto = $_A";
$_C = mysqli_query($conexion, $_B);

if ($_C && mysqli_num_rows($_C) == 1) {
    $_D = mysqli_fetch_assoc($_C);
    $_E = $_D['nombre'];

    echo '<br><h2>¿Seguro que desea eliminar el producto "' . $_E . '"?</h2><br>';
    echo '<form action="eliminar_producto.php?id=' . $_A . '" method="post">';
    echo '<div class="button-container">';
    echo '<button type="submit" name="eliminar">Eliminar</button>';
    echo '<button type="button" onclick="window.location.href=\'../index.php\'">Cancelar</button>';
    echo '</div>';
    echo '</form>';
} else {
    echo '<p>Producto no encontrado.</p>';
    exit();
}

if (isset($_POST['eliminar'])) {
    $_F = "DELETE FROM productos WHERE id_producto = $_A";

    if (mysqli_query($conexion, $_F)) {
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
    background-color: #e99c2e;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 0 15px;
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
    button {
        font-size: 14px;
    }
}
.eliminar {
    text-align: center;
    margin-top: 20px;
}
.eliminar h2 {
    color: #e99c2e;
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
    flex-direction: column;
    height: 10;
}
.button-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
}
.button-container button {
    margin: 0 15px;
}
</style>
