<?php
include('connection.php');
include('firebase.php');

$con = connection();
$database = getFirebaseDatabase();

$id = null;
$user = null;
$pregunta = $_POST['pregunta'];
$respuesta = null;


// Guardar en MySQL
$sql = "INSERT INTO users_preguntas VALUES('$id_preg','$user','$pregunta','$respuesta')";
$query = mysqli_query($con, $sql);

// Guardar en Firebase
$newUser = $database->getReference('users_preguntas')->push([
    'user' => $user,
    'pregunta' => $pregunta,
    'respuesta' => $respuesta
]);

if($query){
    Header("Location: ../index.php");
}
?>