<?php
include('../connection.php'); //OJO
include('../firebase.php'); //OJO

$con = connection();
$database = getFirebaseDatabase();

$id = $_GET['id'];

// Eliminar de MySQL
$sql = "DELETE FROM users WHERE id='$id'";
$query = mysqli_query($con, $sql);

// Eliminar de Firebase
$usersRef = $database->getReference('users');
$firebaseUsers = $usersRef->getValue();

foreach ($firebaseUsers as $key => $user) {
    if ($user['id'] == $id) {
        $usersRef->getChild($key)->remove();
        break;
    }
}

if($query){
    Header("Location: indexRANK.php");
}
?>

