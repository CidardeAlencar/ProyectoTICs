<?php
include('connection.php');

$con = connection();

// Consultar todos los datos de la tabla users_preferences
$sql_preferences = "SELECT * FROM user_preferences";
$query_preferences = mysqli_query($con, $sql_preferences);

// Variable para almacenar el mensaje de error o la información del usuario
$info_message = '';

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
        // Consultar la base de datos para obtener la información de los comentarios y califi>
        $sql_comments = "SELECT * FROM comments_ratings WHERE user_id='$user_id'";
        $query_comments = mysqli_query($con, $sql_comments);
        // Verificar si se encontraron comentarios y calificaciones del usuario
        if ($query_comments && mysqli_num_rows($query_comments) > 0) {
            $info_message .= "<h2>Comentarios y Calificaciones del Usuario</h2>";
            while ($comment = mysqli_fetch_assoc($query_comments)) {
                $info_message .= "Producto ID: {$comment['product_id']}<br>";
                $info_message .= "Comentario: {$comment['comment']}<br>";
                $info_message .= "Calificación: {$comment['rating']}<br>";
                $info_message .= "<hr>";
            }
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
    <link rel="stylesheet" href="ejemploModulo(EM)/assets/styleEM.css">
    <title>Usuarios CRUD</title>
</head>
<body>

<div class="users-table">
    <h2>Usuarios Preferencia</h2>
	    <div class="users-form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h1>Buscar Usuario por ID</h1>
            <input type="text" name="user_id" placeholder="ID del Usuario">
            <input type="submit" name="search_user" value="Buscar">
        </form>
    </div>


    <div class="Crear Nueva Preferencia">
        <form action="insertRANK.php" method="POST">
            <h1>Registrar Preferencias del Usuario</h1>
            <label for="user_id">ID del Usuario:</label>
            <input type="number" name="user_id" placeholder="user_id" required>
            <label for="name">Nombre:</label>
            <input type="text" name="name" placeholder="name" required>
            <label for="lastname">Apellido:</label>
            <input type="text" name="lastname" placeholder="lastname" required>
            <label for="favorites">Favoritos:</label>
            <input type="text" name="favorites" placeholder="Favorites">

            <input type="submit" value="Guardar Preferencias">
        </form>
    </div>

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
</div>
<h2>Datos de los comentarios del usuario </h2>
    <?php if (!empty($info_message)) : ?>
        <div class="user-info">
            <?= $info_message ?>
        </div>
    <?php endif; ?>

</body>
</html>
