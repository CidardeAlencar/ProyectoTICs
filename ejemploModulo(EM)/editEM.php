<?php
include('../connection.php');
include('../firebase.php');

$con = connection();
$database = getFirebaseDatabase();

$id = $_POST['id'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Actualizar en MySQL
$sql = "UPDATE users SET name='$name', lastname='$lastname', username='$username', password='$password', email='$email' WHERE id='$id'";
$query = mysqli_query($con, $sql);

// Actualizar en Firebase
$usersRef = $database->getReference('users');
$firebaseUsers = $usersRef->getValue();

foreach ($firebaseUsers as $key => $user) {
    if ($user['id'] == $id) {
        $usersRef->getChild($key)->update([
            'name' => $name,
            'lastname' => $lastname,
            'username' => $username,
            'password' => $password,
            'email' => $email
        ]);
        break;
    }
}

if($query){
    Header("Location: ../index.php");
}
?>
