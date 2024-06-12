
<?php
include('../connection.php');
include('../firebase.php');

$con = connection();
$database = getFirebaseDatabase();

$id = $_POST['id'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$username = isset($row['username']) ? $row['username'] : '';
$password = isset($row['password']) ? $row['password'] : '';
$email = isset($row['email']) ? $row['email'] : '';


// Actualizar en MySQL
$sql = "UPDATE users SET name='$name', lastname='$lastname' WHERE id='$id'";

$query = mysqli_query($con, $sql);

// Actualizar en Firebase
$usersRef = $database->getReference('users');
$query = $usersRef->orderByChild('email')->equalTo($email)->getSnapshot();

if ($query->exists()) {
    foreach ($query->getValue() as $firebaseKey => $firebaseUser) {
        // Verifica si el ID coincide para evitar actualizar usuarios incorrectos
        if ($firebaseUser['id'] == $id) {
            $usersRef->getChild($firebaseKey)->update([
                'name' => $name,
                'lastname' => $lastname,
                'username' => $username,
                'password' => $password,
                'email' => $email
            ]);
        }
    }
}

if($query){
    Header("Location: indexRANK.php");
}
?>
