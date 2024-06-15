<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font-family -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- font-awesome.min.css -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- bootstrap.min.css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- style.css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Estilos nativos -->
    <link rel="stylesheet" href="mbusqueda(BUSQ)/assets/styleBUSQ.css">
</head>
<body>
    <section class="menu_busq">
        <div>
            <button type="button" class="btn btn-primary btn-user">
                <a href="mbusqueda(BUSQ)/usuarioBUSQ.php">Vista Usuario 👨🏽</a>
            </button>
            <ul class="ul_user">
                <li>Funciones:</li>
                <li>- Búsqueda de productos</li>
                <li>- Búsqueda por categorías</li>
                <li>- Búsqueda por Ofertas</li>
                <li>- Búsqueda por lo más vendido</li>
                <li>- FAQ's</li>
            </ul>
        </div>
        <div>
            <button type="button" class="btn btn-info btn-admin">
                <a href="mbusqueda(BUSQ)/adminBUSQ.php">Vista Admin 🧑🏽‍💼</a>
            </button>
            <ul class="ul_admin">
                <li>Funciones:</li>
                <li>- Búsqueda de administradores</li>
                <li>- Búsqueda por CI</li>
                <li>- Búsqueda por roles</li>
                <li>- Búsqueda de usuarios activos/inactivos</li>
            </ul>
        </div>
    </section>

    <script>
        document.querySelector('.btn-user').addEventListener('mouseenter', function() {
            document.querySelector('.ul_user').style.display = 'block';
        });
        document.querySelector('.btn-user').addEventListener('mouseleave', function() {
            document.querySelector('.ul_user').style.display = 'none';
        });
        document.querySelector('.btn-admin').addEventListener('mouseenter', function() {
            document.querySelector('.ul_admin').style.display = 'block';
        });
        document.querySelector('.btn-admin').addEventListener('mouseleave', function() {
            document.querySelector('.ul_admin').style.display = 'none';
        });
    </script>
</body>
</html>
