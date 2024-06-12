<?php
include('../connection.php');

$con = connection();

$user_id = $_POST['user_id'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$favorites = $_POST['favorites']; // Puedes obtener los favoritos del formulario
$state = 'activo'; // Puedes establecer el estado predeterminado como 'activo'

// Guardar en MySQL
$sql = "INSERT INTO user_preferences (user_id, nombre, apellido, favoritos, estado) VALUES ('$user_id', '$name', '$lastname', '$favorites', '$state')";
$query = mysqli_query($con, $sql);

if($query){
    header("Location: indexRANK.php");
    exit;
}
?>
