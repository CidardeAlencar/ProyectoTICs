<?php
include('../connection.php');
include('../firebase.php');

$con = connection();
$database = getFirebaseDatabase();

$id = null;
$user_id = $_POST['user_id'];
$product_id = $_POST['product_id'];
$comment = $_POST['comment'];
$rating = $_POST['rating'];

// Guardar en MySQL
$sql = "INSERT INTO comments_ratings (user_id, product_id, comment, rating) VALUES ('$user_id', '$product_id', '$comment', '$rating')";
$query = mysqli_query($con, $sql);

// Guardar en Firebase
$newComment = $database->getReference('comments_ratings')->push([
    'user_id' => $user_id,
    'product_id' => $product_id,
    'comment' => $comment,
    'rating' => $rating,
    'created_at' => date('Y-m-d H:i:s')
]);

if ($query) {
    Header("Location: ../index.php");
}
?>
