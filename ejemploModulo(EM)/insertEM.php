<?php
@include '../connection.php';
@include '../firebase.php';
$_A = connection();
$_B = getFirebaseDatabase();
$_C = null;
$_D = $_POST['name'];
$_E = $_POST['lastname'];
$_F = $_POST['username'];
$_G = $_POST['password'];
$_H = $_POST['email'];
$_I = "INSERT INTO users VALUES('$_C', '$_D', '$_E', '$_F', '$_G', '$_H')";
$_J = mysqli_query($_A, $_I);
$_B->getReference('users')->push([
    'name' => $_D,
    'lastname' => $_E,
    'username' => $_F,
    'password' => $_G,
    'email' => $_H
]);
if ($_J) {
    Header("Location: ../index.php");
}
?>
