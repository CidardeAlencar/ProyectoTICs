<?php
$_A = "localhost";
$_B = "root";
$_C = "";
$_D = "prov";
$_E = new mysqli($_A, $_B, $_C, $_D);

if ($_E->connect_error) {
    die("Conexión fallida: " . $_E->connect_error);
}

$_F = $_POST['NITProveedor'];
$_G = $_POST['NombreProveedor'];
$_H = $_POST['Direccion'];
$_I = $_POST['Telefono'];
$_J = $_POST['PaginaWeb'];

$_K = "uploads/";
if (!file_exists($_K)) {
    mkdir($_K, 0777, true);
}

$_L = $_K . basename($_FILES["Imagen"]["name"]);
$_M = strtolower(pathinfo($_L, PATHINFO_EXTENSION));
$_N = 1;

if(isset($_POST["submit"])) {
    $_O = getimagesize($_FILES["Imagen"]["tmp_name"]);
    if($_O !== false) {
        echo "El archivo es una imagen - " . $_O["mime"] . ".";
        $_N = 1;
    } else {
        echo "El archivo no es una imagen.";
        $_N = 0;
    }
}

if (file_exists($_L)) {
    echo "Lo siento, el archivo ya existe.";
    $_N = 0;
}

if ($_FILES["Imagen"]["size"] > 500000) {
    echo "Lo siento, tu archivo es demasiado grande.";
    $_N = 0;
}

if($_M != "jpg" && $_M != "png" && $_M != "jpeg" && $_M != "gif" ) {
    echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
    $_N = 0;
}

if ($_N == 0) {
    echo "Lo siento, tu archivo no fue subido.";
} else {
    if (move_uploaded_file($_FILES["Imagen"]["tmp_name"], $_L)) {
        echo "El archivo ". htmlspecialchars( basename( $_FILES["Imagen"]["name"])). " ha sido subido.";
    } else {
        echo "Lo siento, hubo un error al subir tu archivo.";
    }
}

$_P = "INSERT INTO proveedor (NITProveedor, NombreProveedor, Direccion, Telefono, PaginaWeb, Imagen) VALUES (?, ?, ?, ?, ?, ?)";
$_Q = $_E->prepare($_P);
$_Q->bind_param("ssssss", $_F, $_G, $_H, $_I, $_J, $_L);

if ($_Q->execute()) {
    header("Location: indexPROV.php");
    exit();
} else {
    echo "Error: " . $_P . "<br>" . $_E->error;
}

$_Q->close();
$_E->close();
?>
