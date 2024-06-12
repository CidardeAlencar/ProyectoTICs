
<?php
sinclude('../connection.php');
include('../firebase.php');

$con = connection();
$database = getFirebaseDatabase();

$id = $_POST['id'];
$user_id = $_POST['user_id'];
$name = $_POST['nombre'];
$lastname = isset($row['apellido']) ? $row['apellido'] : '';
$favorites = isset($row['favoritos']) ? $row['favoritos'] : '';
$state = isset($row['estado']) ? $row['estado'] : '';


// Actualizar en MySQL
$sql = "UPDATE user_preferences SET user_id='$user_id', favoritos='$favorites' WHERE id='$id'";

$query = mysqli_query($con, $sql);

// Actualizar en Firebase
$usersRef = $database->getReference('user_preferences');
$query = $usersRef->orderByChild('nombre')->equalTo($name)->getSnapshot();

if ($query->exists()) {
    foreach ($query->getValue() as $firebaseKey => $firebaseUser) {
        // Verifica si el ID coincide para evitar actualizar usuarios incorrectos
        if ($firebaseUser['id'] == $id) {
            $usersRef->getChild($firebaseKey)->update([
                
                'nombre' => $name,
                'apellido' => $lastname,
                'favoritos' => $favorites,
                'estado' => $state
            ]);
        }
    }
}

if($query){
    Header("Location: indexRANK.php");
}
?>
