<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- obf_font-family -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- obf_font-awesome.min.css -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- obf_bootstrap.min.css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- obf_style.css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- obf_Estilos nativos -->
    <link rel="stylesheet" href="mbusqueda(BUSQ)/assets/styleBUSQ.css">
</head>
<body>
    <section class="obf_menu_busq">
        <div>
            <button type="button" class="obf_btn obf_btn-primary obf_btn-user">
                <a href="mbusqueda(BUSQ)/usuarioBUSQ.php">Vista Usuario 👨🏽</a>
            </button>
            <ul class="obf_ul_user">
                <li>obf_Funciones:</li>
                <li>- obf_Búsqueda de productos</li>
                <li>- obf_Búsqueda por categorías</li>
                <li>- obf_Búsqueda por Ofertas</li>
                <li>- obf_Búsqueda por lo más vendido</li>
                <li>- obf_FAQ's</li>
            </ul>
        </div>
        <div>
            <button type="button" class="obf_btn obf_btn-info obf_btn-admin">
                <a href="mbusqueda(BUSQ)/adminBUSQ.php">Vista Admin 🧑🏽‍💼</a>
            </button>
            <ul class="obf_ul_admin">
                <li>obf_Funciones:</li>
                <li>- obf_Búsqueda de administradores</li>
                <li>- obf_Búsqueda por CI</li>
                <li>- obf_Búsqueda por roles</li>
                <li>- obf_Búsqueda de usuarios activos/inactivos</li>
            </ul>
        </div>
    </section>

    <script>
        document.querySelector('.obf_btn-user').addEventListener('mouseenter', function() {
            document.querySelector('.obf_ul_user').style.display = 'block';
        });
        document.querySelector('.obf_btn-user').addEventListener('mouseleave', function() {
            document.querySelector('.obf_ul_user').style.display = 'none';
        });
        document.querySelector('.obf_btn-admin').addEventListener('mouseenter', function() {
            document.querySelector('.obf_ul_admin').style.display = 'block';
        });
        document.querySelector('.obf_btn-admin').addEventListener('mouseleave', function() {
            document.querySelector('.obf_ul_admin').style.display = 'none';
        });
    </script>
</body>
</html>
