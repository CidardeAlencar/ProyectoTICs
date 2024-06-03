<?php
include('connection.php');

$con = connection();

$sql = "SELECT * FROM comments_ratings";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mcomentariosValoraciones(CVAL)/assets/styleCVAL.css">
    <title>Comentarios y Valoraciones</title>
</head>
<body>
    <div class="comments-ratings-form">
    <form action="mcomentariosValoraciones(CVAL)/insertCVAL.php" method="POST">
    <h1>Agregar Comentario/Valoración</h1>
    <input type="text" name="user_id" placeholder="ID de Usuario">
    <input type="text" name="product_id" placeholder="ID de Producto">
    <textarea name="comment" placeholder="Comentario"></textarea>
    
    <!-- Selector de Valoración con Estrellas -->
    <fieldset class="rating">
        <legend>Valoración (1-5)</legend>
        <input type="radio" id="star5" name="rating" value="5">
        <label for="star5"></label>
        <input type="radio" id="star4" name="rating" value="4">
        <label for="star4"></label>
        <input type="radio" id="star3" name="rating" value="3">
        <label for="star3"></label>
        <input type="radio" id="star2" name="rating" value="2">
        <label for="star2"></label>
        <input type="radio" id="star1" name="rating" value="1">
        <label for="star1"></label>
    </fieldset>
    
    <input type="submit" value="Agregar Comentario/Valoración">
</form>
    </div>

    <div class="comments-ratings-table">
        <h2>Comentarios y Valoraciones Registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Usuario</th>
                    <th>ID Producto</th>
                    <th>Comentario</th>
                    <th>Valoración</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Actualización</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['user_id'] ?></td>
                        <td><?= $row['product_id'] ?></td>
                        <td><?= $row['comment'] ?></td>
                        <td><?= $row['rating'] ?></td>
                        <td><?= $row['created_at'] ?></td>
                        <td><?= $row['updated_at'] ?></td>
                        <td><a href="mcomentariosValoraciones(CVAL)/updateCVAL.php?id=<?= $row['id'] ?>" class="comments-ratings-table--edit">Editar</a></td>
                        <td><a href="mcomentariosValoraciones(CVAL)/deleteCVAL.php?id=<?= $row['id'] ?>" class="comments-ratings-table--delete">Eliminar</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
