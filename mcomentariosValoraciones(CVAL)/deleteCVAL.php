<?php
include('../connection.php');
include('../firebase.php');

$con = connection();
$database = getFirebaseDatabase();

$id = $_GET['id'];

// Eliminar de MySQL
$sql = "DELETE FROM comments_ratings WHERE id='$id'";
$query = mysqli_query($con, $sql);

// Eliminar de Firebase
$commentsRatingsRef = $database->getReference('comments_ratings');
$firebaseCommentsRatings = $commentsRatingsRef->getValue();

foreach ($firebaseCommentsRatings as $key => $cr) {
    if ($cr['id'] == $id) {
        $commentsRatingsRef->getChild($key)->remove();
        break;
    }
}

if($query){
    header("Location: ../index.php");
}
?>
