<?php
@include 'connection.php';
$_A = connection();
$_B = $_POST['user_id'];
$_C = $_POST['product_id'];
$_D = $_POST['comment'];
$_E = $_POST['rating'];
$_F = "INSERT INTO comments_ratings (user_id, product_id, comment, rating) VALUES ('$_B', '$_C', '$_D', '$_E')";
$_G = mysqli_query($_A, $_F);
if ($_G) {
    header("Location: indexCVAL.php");
}
?>
