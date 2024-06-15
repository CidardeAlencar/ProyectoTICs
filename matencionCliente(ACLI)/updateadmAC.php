<?php
@include 'connection.php';
$_A = connection();
if (isset($_GET['id_preg'])) {
    $_B = $_GET['id_preg'];
    $_C = "SELECT * FROM users_preguntas WHERE id_preg='$_B'";
    $_D = mysqli_query($_A, $_C);
    $_E = mysqli_fetch_array($_D);
} else {
    echo "Error: id_preg parameter missing in the URL.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styleadmAC.css">
    <title>Añadir respuesta</title>
</head>
<body>
    <div class="users-form">
        <form action="matencionCliente(ACLI)/edit_user.php" method="POST">
            <h1>Añadir respuesta</h1>
            <p>Pregunta: <?= $_E['pregunta'] ?></p>
            <label for="respuesta">Respuesta:</label>
            <textarea id="respuesta" name="respuesta" rows="5"><?= $_E['respuesta'] ?></textarea>
            <input type="submit" value="Enviar respuesta">
        </form>
    </div>
</body>
</html>
