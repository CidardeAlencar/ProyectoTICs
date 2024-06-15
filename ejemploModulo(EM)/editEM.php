<?php
@include '../connection.php';
@include '../firebase.php';
$_A = connection();
$_B = getFirebaseDatabase();
$_C = $_POST['id'];
$_D = $_POST['name'];
$_E = $_POST['lastname'];
$_F = $_POST['username'];
$_G = $_POST['password'];
$_H = $_POST['email'];
$_I = "UPDATE users SET name='$_D', lastname='$_E', username='$_F', password='$_G', email='$_H' WHERE id='$_C'";
$_J = mysqli_query($_A, $_I);
$_K = $_B->getReference('users')->getValue();
foreach ($_K as $_L => $_M) {
    if ($_M['id'] == $_C) {
        $_B->getReference('users')->getChild($_L)->update([
            'name' => $_D,
            'lastname' => $_E,
            'username' => $_F,
            'password' => $_G,
            'email' => $_H
        ]);
        break;
    }
}
if ($_J) {
    Header("Location: ../index.php");
}
?>
