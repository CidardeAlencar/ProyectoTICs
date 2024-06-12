
<?php
include('../connection.php');
include('../firebase.php');

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
    header("Location: indexRANK.php");
    exit; 
}
?>


