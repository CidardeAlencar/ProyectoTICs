<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            overflow: hidden;
            background-color: #333;
        }

        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .content {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a href="index.php?mod=1">EM</a>
        <a href="index.php?mod=2">ATEN</a>
        <a href="index.php?mod=3">ACLI</a>
        <a href="index.php?mod=4">ACLIADM</a>
        <a href="index.php?mod=5">BUSQ</a>
        <a href="index.php?mod=6">CARR</a>
        <a href="index.php?mod=7">CATE</a>
        <a href="index.php?mod=8">COMP</a>
        <a href="index.php?mod=9">CONT</a>
        <a href="index.php?mod=10">DESC</a>
        <a href="index.php?mod=11">EPRO</a>
        <a href="index.php?mod=12">FIDE</a>
        <a href="index.php?mod=13">GUSU</a>
        <a href="index.php?mod=14">PERS</a>
        <a href="index.php?mod=15">PROD</a>
        <a href="index.php?mod=16">PROM</a>
        <a href="index.php?mod=17">PROV</a>
        <a href="index.php?mod=18">RECL</a>
        <a href="index.php?mod=19">REPO</a>
        <a href="index.php?mod=20">RESE</a>
        <a href="index.php?mod=21">VENT</a>
        <a href="index.php?mod=22">CVAL</a>
    </div>

    <div class="content">
        <?php
        if (isset($_GET['mod'])) {
            $mod = $_GET['mod'];
            switch ($mod) {
                case '1':
                    include 'ejemploModulo(EM)/indexEM.php';
                    break;
                case '3':
                    include 'matencionCliente(ACLI)/indexAC.php';
                    break;
                case '4':
                    include 'matencionCliente(ACLI)/indexadmAC.php';
                    break;
                case '5':
                    include 'mbusqueda(BUSQ)/indexBUSQ.php';
                    break;
                case '8':
                    include 'mcompras(COMP)/indexCOMP.php';
                    break;
                case '10':
                    include 'mdescuentos(DESC)/indexDESC.php';
                    break;
                case '13':
                    include 'mgestionUsuarios(GUSU)/user.php';
                    break;
                case '14':
                    include 'mpersonal(PERS)/list_employeesPERS.php';
                    break;
                case '15':
                    include 'mproductos(PROD)/indexPROD.php';
                    break;
                case '17':
                    include 'mproveedores(PROV)/indexPROV.php';
                    break;
                case '22':
                    include 'mcomentariosValoraciones(CVAL)/indexCVAL.php';
                     break;
                default:
                    echo "<h2>Bienvenido a la página principal</h2>";
                    echo "<p>Selecciona su acronimo del módulo del menú para hacer pruebas.</p>";
            }
        } else {
            echo "<h2>Bienvenido a la página principal</h2>";
            echo "<p>Selecciona su acronimo del módulo del menú para hacer pruebas.</p>";
        }
        ?>
    </div>
</body>

</html>