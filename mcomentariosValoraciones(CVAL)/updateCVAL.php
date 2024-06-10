<?php
include('../connection.php');
include('../firebase.php');

$con = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM comments_ratings WHERE id = '$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Comentario/Valoración</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .users-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 60%;
            max-width: 600px;
        }

        .users-form h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .users-form form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .users-form form input,
        .users-form form textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s ease;
            width: 100%;
        }

        .users-form form input:focus,
        .users-form form textarea:focus {
            border-color: dodgerblue;
            box-shadow: 0 0 5px dodgerblue;
        }

        .users-form form textarea {
            min-height: 100px;
            resize: vertical;
        }

        .users-form form input[type="submit"] {
            background-color: dodgerblue;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .users-form form input[type="submit"]:hover {
            background-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="users-form">
        <form action="editCVAL.php" method="POST">
            <h1>Editar Comentario/Valoración</h1>
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="text" name="user_id" value="<?= $row['user_id'] ?>" placeholder="ID de Usuario">
            <input type="text" name="product_id" value="<?= $row['product_id'] ?>" placeholder="ID de Producto">
            <textarea name="comment" placeholder="Comentario"><?= $row['comment'] ?></textarea>
            <input type="text" name="rating" value="<?= $row['rating'] ?>" placeholder="Valoración">

            <input type="submit" value="Actualizar Información">
        </form>
    </div>
</body>
</html>
