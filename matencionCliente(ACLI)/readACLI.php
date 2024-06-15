<?php
include('connection.php');

$con = connection();

$sql = "SELECT * FROM mensajes_cliente ORDER BY fecha DESC";
$query = mysqli_query($con, $sql);

$messages = array();
while ($row = mysqli_fetch_assoc($query)) {
    $messages[] = $row;
}

echo json_encode($messages);
?>

