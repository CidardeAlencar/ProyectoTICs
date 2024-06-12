<?php
include('connection.php');

$con = connection();

// Consultar todos los datos de la tabla users_preferences
$sql_preferences = "SELECT * FROM user_preferences";
$query_preferences = mysqli_query($con, $sql_preferences);

// Variable para almacenar la información del usuario
$info_message = '';

// Variables para almacenar los datos del producto con la calificación más alta
$highest_product_id = '';
$highest_product_comment = '';
$highest_product_rating = '';

// Verificar si se ha enviado el formulario para buscar un usuario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search_user'])) {
    $user_id = $_POST['user_id'];
    // Consultar la base de datos para obtener la información del usuario
    $sql_user = "SELECT name, lastname FROM users WHERE id='$user_id'";
    $query_user = mysqli_query($con, $sql_user);
    // Verificar si se encontró un usuario con ese id
    if ($query_user && mysqli_num_rows($query_user) > 0) {
        $user = mysqli_fetch_assoc($query_user);
        $info_message .= "Nombre: {$user['name']}<br>Apellido: {$user['lastname']}<br>";
        // Consultar la base de datos para obtener la información de los comentarios y calificaciones
        $sql_comments = "SELECT * FROM comments_ratings WHERE user_id='$user_id' ORDER BY rating DESC LIMIT 1";
        $query_comments = mysqli_query($con, $sql_comments);
        // Verificar si se encontró el comentario con la calificación más alta del usuario
        if ($query_comments && mysqli_num_rows($query_comments) > 0) {
            $info_message .= "<h2>Comentario con Calificación Más Alta del Usuario</h2>";
            $comment = mysqli_fetch_assoc($query_comments);
            $highest_product_id = $comment['product_id'];
            $highest_product_comment = $comment['comment'];
            $highest_product_rating = $comment['rating'];
            $info_message .= "Producto ID: {$highest_product_id}<br>";
            $info_message .= "Comentario: {$highest_product_comment}<br>";
            $info_message .= "Calificación: {$highest_product_rating}<br>";
        } else {
            $info_message .= "El usuario no ha realizado comentarios o calificaciones.";
        }
    } else {
        $info_message = "Usuario no encontrado";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mranking(RANK)/assets/styles/styleRANK.css">
    <title>Preference CRUD</title>
</head>
<body>

<div class="users-table">
    <h2>Usuarios Preferencia</h2>
    <div class="users-form">
        <form action="index.php?mod=21" method="POST">
            <h1>Buscar Usuario por ID</h1>
            <input type="text" name="user_id" placeholder="ID del Usuario">
            <input type="submit" name="search_user" value="Buscar">
        </form>
    </div>

    <h2>Datos de los comentarios del usuario </h2>
    <?php if (!empty($info_message)) : ?>
        <div class="user-info">
            <?= $info_message ?>
        </div>
    <?php endif; ?>

    <div class="preferences-table">
        <h2>Preferencias de Usuarios Registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID del Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Favoritos</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($query_preferences)): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['user_id'] ?></td>
                    <td><?= $row['nombre'] ?></td>
                    <td><?= $row['apellido'] ?></td>
                    <td><?= $row['favoritos'] ?></td>
                    <td><?= $row['estado'] ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class="Crear Nueva Preferencia">
        <form action="mranking(RANK)/insertRANK.php" method="POST">
            <h1>Registrar Preferencias del Usuario</h1>
            <label for="user_id">ID del Usuario:</label>
            <input type="number" name="user_id" placeholder="user_id" required><br>
            <label for="name">Nombre:</label>
            <input type="text" name="name" placeholder="name" value="<?= isset($user['name']) ? $user['name'] : '' ?>" required><br>
            <label for="lastname">Apellido:</label>
            <input type="text" name="lastname" placeholder="lastname" value="<?= isset($user['lastname']) ? $user['lastname'] : '' ?>" required><br>
            <label for="favorites">Favoritos:</label>
            <input type="text" name="favorites" placeholder="Favorites" value="<?= $highest_product_id ?>" required><br>

            <input type="submit" value="Guardar Preferencias">
        </form>
    </div>

</body>
</html>
