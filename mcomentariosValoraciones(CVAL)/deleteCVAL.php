<?php
@include '../connection.php';
@include '../firebase.php';
$_A = connection();
$_B = getFirebaseDatabase();
$_C = $_GET['id'];
$_D = "DELETE FROM comments_ratings WHERE id='$_C'";
$_E = mysqli_query($_A, $_D);
$_F = $_B->getReference('comments_ratings')->getValue();
foreach ($_F as $_G => $_H) {
    if ($_H['id'] == $_C) {
        $_B->getReference('comments_ratings')->getChild($_G)->remove();
        break;
    }
}
if ($_E) {
    header("Location: ../index.php");
}
?>
