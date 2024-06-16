<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $precio = mysqli_real_escape_string($conexion, $_POST['precio']);
    $categoria = mysqli_real_escape_string($conexion, $_POST['categoria']);
    $estado = mysqli_real_escape_string($conexion, $_POST['estado']);
    $imagen = $_FILES['imagen']['name'];
    
    $target_dir = "assets/images/";
    $target_file = $target_dir . basename($imagen);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    $check = getimagesize($_FILES['imagen']['tmp_name']);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('El archivo no es una imagen.'); window.location.href='../index.php?mod=15#';</script>";
        $uploadOk = 0;
    }
    
    if (file_exists($target_file)) {
        echo "<script>alert('Lo siento, el archivo ya existe.'); window.location.href='../index.php?mod=15#';</script>";
        $uploadOk = 0;
    }
    
    if ($_FILES['imagen']['size'] > 500000) {
        echo "<script>alert('Lo siento, tu archivo es demasiado grande.'); window.location.href='../index.php?mod=15#';</script>";
        $uploadOk = 0;
    }
    
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "<script>alert('Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.'); window.location.href='../index.php?mod=15#';</script>";
        $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
        echo "<script>alert('Lo siento, tu archivo no fue subido.'); window.location.href='../index.php?mod=15#';</script>";
    } else {
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
            $consulta = "INSERT INTO productos (nombre, descripcion, precio, categoria, estado, imagen_principal) VALUES ('$nombre', '$descripcion', '$precio', '$categoria', '$estado', '$imagen')";
            if (mysqli_query($conexion, $consulta)) {
                echo "<script>alert('Producto creado exitosamente'); window.location.href='../index.php?mod=15#';</script>";
            } else {
                echo "<script>alert('Error al crear el producto: ".mysqli_error($conexion)."'); window.location.href='../index.php?mod=15#';</script>";
            }
        } else {
            echo "<script>alert('Lo siento, hubo un error al subir tu archivo.'); window.location.href='../index.php?mod=15#';</script>";
        }
    }
}
