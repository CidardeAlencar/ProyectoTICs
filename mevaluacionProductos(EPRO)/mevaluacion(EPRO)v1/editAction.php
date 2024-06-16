<?php
// Include the database connection file
require_once("dbConnection.php");
if (isset($_POST['update'])) {
    // Escape special characters in a string for use in an SQL statement
    $id_producto = mysqli_real_escape_string($mysqli, $_POST['id_producto']);
    $nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($mysqli, $_POST['descripcion']);
    $precio = mysqli_real_escape_string($mysqli, $_POST['precio']);
    $categoria = mysqli_real_escape_string($mysqli, $_POST['categoria']);
    $estado = mysqli_real_escape_string($mysqli, $_POST['estado']);
    
    $fVencimiento = mysqli_real_escape_string($mysqli, $_POST['fVencimiento']);
    
    // Verificar campos vacíos
    if (empty($nombre) || empty($descripcion) || empty($precio) || empty($categoria) || empty($estado)  || empty($fVencimiento)) {
        if (empty($nombre)) {
            echo "<font color='red'>El campo Nombre está vacío.</font><br/>";
        }
        
        if (empty($descripcion)) {
            echo "<font color='red'>El campo Descripción está vacío.</font><br/>";
        }
        
        if (empty($precio)) {
            echo "<font color='red'>El campo Precio está vacío.</font><br/>";
        }
        
        if (empty($categoria)) {
            echo "<font color='red'>El campo Categoría está vacío.</font><br/>";
        }
        
        if (empty($estado)) {
            echo "<font color='red'>El campo Estado está vacío.</font><br/>";
        }
        
        
        if (empty($fVencimiento)) {
            echo "<font color='red'>El campo Fecha de Vencimiento está vacío.</font><br/>";
        }
    } else {
        // Actualizar la tabla de la base de datos
        $result = mysqli_query($mysqli, "UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', categoria = '$categoria', estado = '$estado', fVencimiento = '$fVencimiento' WHERE id_producto = $id_producto");
        
        // Mostrar mensaje de éxito
        echo "<p><font color='green'>¡Datos actualizados con éxito!</font></p>";
        echo "<a href='indexEPRO.php'>Ver Resultados</a>";
    }
}

