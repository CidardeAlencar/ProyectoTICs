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
        <a href="index.php?mod=4">BUSQ</a>
        <a href="index.php?mod=5">CARR</a>
        <a href="index.php?mod=6">CATE</a>
        <a href="index.php?mod=7">COMP</a>
        <a href="index.php?mod=8">CONT</a>
        <a href="index.php?mod=9">DESC</a>
        <a href="index.php?mod=10">EPRO</a>
        <a href="index.php?mod=11">FIDE</a>
        <a href="index.php?mod=12">GUSU</a>
        <a href="index.php?mod=13">PERS</a>
        <a href="index.php?mod=14">PROD</a>
        <a href="index.php?mod=15">PROM</a>
        <a href="index.php?mod=16">PROV</a>
        <a href="index.php?mod=17">RECL</a>
        <a href="index.php?mod=18">REPO</a>
        <a href="index.php?mod=19">RESE</a>
        <a href="index.php?mod=20">VENT</a>
        <a href="index.php?mod=21">CVAL</a>
    </div>

    <div class="content">
        <?php
        if (isset($_GET['mod'])) {
            $mod = $_GET['mod'];
            switch ($mod) {
                case '1':
                    include 'ejemploModulo(EM)/indexEM.php';
                    break;
                case '2':
                    include 'modulo2.php';
                    break;
                case '3':
                    include 'modulo3.php';
                    break;
                case '21':
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