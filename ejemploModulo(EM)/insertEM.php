<?php
include('../connection.php');//ojo
include('../firebase.php');//ojo

$con = connection();
$database = getFirebaseDatabase();

$id = null;
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Guardar en MySQL
$sql = "INSERT INTO users VALUES('$id','$name','$lastname','$username','$password','$email')";
$query = mysqli_query($con, $sql);

// Guardar en Firebase
$newUser = $database->getReference('users')->push([
    'name' => $name,
    'lastname' => $lastname,
    'username' => $username,
    'password' => $password,
    'email' => $email
]);

if($query){
    Header("Location: ../index.php");//ojo
}
?>
