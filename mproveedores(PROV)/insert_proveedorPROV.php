<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambia esto según tu configuración
$password = ""; // Cambia esto según tu configuración
$dbname = "prov";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$NITProveedor = $_POST['NITProveedor'];
$NombreProveedor = $_POST['NombreProveedor'];
$Direccion = $_POST['Direccion'];
$Telefono = $_POST['Telefono'];
$PaginaWeb = $_POST['PaginaWeb'];

// Procesar la imagen
$target_dir = "uploads/"; // Directorio donde se almacenarán las imágenes
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true); // Crear la carpeta si no existe
}

$target_file = $target_dir . basename($_FILES["Imagen"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$uploadOk = 1;

// Verificar si el archivo es una imagen real o una imagen falsa
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["Imagen"]["tmp_name"]);
    if($check !== false) {
        echo "El archivo es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }
}

// Verificar si el archivo ya existe
if (file_exists($target_file)) {
    echo "Lo siento, el archivo ya existe.";
    $uploadOk = 0;
}

// Verificar el tamaño del archivo
if ($_FILES["Imagen"]["size"] > 500000) {
    echo "Lo siento, tu archivo es demasiado grande.";
    $uploadOk = 0;
}

// Permitir ciertos formatos de archivo
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
    $uploadOk = 0;
}

// Verificar si $uploadOk está configurado en 0 por un error
if ($uploadOk == 0) {
    echo "Lo siento, tu archivo no fue subido.";
// Si todo está bien, intenta subir el archivo
} else {
    if (move_uploaded_file($_FILES["Imagen"]["tmp_name"], $target_file)) {
        echo "El archivo ". htmlspecialchars( basename( $_FILES["Imagen"]["name"])). " ha sido subido.";
    } else {
        echo "Lo siento, hubo un error al subir tu archivo.";
    }
}

// Preparar y ejecutar la inserción
$sql = "INSERT INTO proveedor (NITProveedor, NombreProveedor, Direccion, Telefono, PaginaWeb, Imagen) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $NITProveedor, $NombreProveedor, $Direccion, $Telefono, $PaginaWeb, $target_file);

if ($stmt->execute()) {
    // Redirigir a la página de inicio después de agregar exitosamente
    header("Location: indexPROV.php");
    exit(); // Asegura que no se ejecuten más líneas de código
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
