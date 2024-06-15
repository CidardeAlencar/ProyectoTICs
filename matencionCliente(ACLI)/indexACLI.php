<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Atención al Cliente</title>
</head>
<body>
    <div class="main-container">
        <h1>Atención al Cliente</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Pregunta</th>
                    <th>Fecha</th>
                    <th>Responder</th>
                </tr>
            </thead>
            <tbody>
                <?php
                @include 'connection.php';
                $_A = connection();
                $_B = "SELECT * FROM users_preguntas";
                $_C = mysqli_query($_A, $_B);
                while ($_D = mysqli_fetch_array($_C)): ?>
                <tr>
                    <td><?= $_D['id_preg'] ?></td>
                    <td><?= $_D['cliente'] ?></td>
                    <td><?= $_D['pregunta'] ?></td>
                    <td><?= $_D['fecha'] ?></td>
                    <td><a href="responderACLI.php?id_preg=<?= $_D['id_preg'] ?>" class="btn">Responder</a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
