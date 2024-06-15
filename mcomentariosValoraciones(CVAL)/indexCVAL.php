<?php
@include 'connection.php';
$_A = connection();
$_B = "SELECT * FROM comments_ratings";
$_C = mysqli_query($_A, $_B);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Comentarios y Valoraciones</title>
</head>
<body>
    <div class="main-container">
        <h1>Comentarios y Valoraciones</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID de Usuario</th>
                    <th>ID de Producto</th>
                    <th>Comentario</th>
                    <th>Valoración</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($_D = mysqli_fetch_array($_C)): ?>
                <tr>
                    <td><?= $_D['id'] ?></td>
                    <td><?= $_D['user_id'] ?></td>
                    <td><?= $_D['product_id'] ?></td>
                    <td><?= $_D['comment'] ?></td>
                    <td><?= $_D['rating'] ?></td>
                    <td><a href="editCVAL.php?id=<?= $_D['id'] ?>" class="btn">Editar</a></td>
                    <td><a href="deleteCVAL.php?id=<?= $_D['id'] ?>" class="btn">Eliminar</a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
