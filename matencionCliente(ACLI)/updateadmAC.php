<?php
include('connection.php');

$con = connection();

// Check if id_preg is present in the URL
if (isset($_GET['id_preg'])) {
    $id_preg = $_GET['id_preg'];
    $sql = "SELECT * FROM users_preguntas WHERE id_preg= '$id_preg'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);
} else {
    // Handle the case where id_preg is missing (e.g., display an error message)
    echo "Error: id_preg parameter missing in the URL.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--style.css-->
    <link rel="stylesheet" href="assets/css/styleadmAC.css">
    <title>Añadir respuesta</title>
</head>
<body>
    <div class = "users-form">
        <form action="matencionCliente(ACLI)/edit_user.php" method="POST">
            <h1>Añadir respuesta</h1>
            <p>Pregunta: <?= $row['pregunta'] ?></p> <label for="respuesta">Respuesta:</label>
            <textarea id="respuesta" name="respuesta" rows="5"><?= $row['respuesta'] ?></textarea> 
            <input type="submit" value="Enviar respuesta">
        </form>
    </div>
</body>
</html>
