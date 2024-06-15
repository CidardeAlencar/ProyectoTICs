<?php
@include 'connection.php';
@include 'firebase.php';
$_A = connection();
$_B = getFirebaseDatabase();
$_C = $_POST['id'];
$_D = $_POST['user_id'];
$_E = $_POST['product_id'];
$_F = $_POST['comment'];
$_G = $_POST['rating'];
$_H = "UPDATE comments_ratings SET user_id='$_D', product_id='$_E', comment='$_F', rating='$_G' WHERE id='$_C'";
$_I = mysqli_query($_A, $_H);
$_J = $_B->getReference('comments_ratings')->getValue();
foreach ($_J as $_K => $_L) {
    if ($_L['id'] == $_C) {
        $_B->getReference('comments_ratings')->getChild($_K)->update([
            'user_id' => $_D,
            'product_id' => $_E,
            'comment' => $_F,
            'rating' => $_G
        ]);
        break;
    }
}
if ($_I) {
    header("Location: indexCVAL.php");
}
?>
