<?php
include('../connection.php');
include('../firebase.php');

$con = connection();
$database = getFirebaseDatabase();

$id = $_POST['id'];
$user_id = $_POST['user_id'];
$product_id = $_POST['product_id'];
$comment = $_POST['comment'];
$rating = $_POST['rating'];

// Actualizar en MySQL
$sql = "UPDATE comments_ratings SET user_id='$user_id', product_id='$product_id', comment='$comment', rating='$rating' WHERE id='$id'";
$query = mysqli_query($con, $sql);

// Actualizar en Firebase
$commentsRatingsRef = $database->getReference('comments_ratings');
$firebaseCommentsRatings = $commentsRatingsRef->getValue();

foreach ($firebaseCommentsRatings as $key => $cr) {
    if ($cr['id'] == $id) {
        $commentsRatingsRef->getChild($key)->update([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'comment' => $comment,
            'rating' => $rating
        ]);
        break;
    }
}

if($query){
    header("Location: ../index.php");
}
?>
