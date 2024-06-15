<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <style>
        body {font-family: Arial, sans-serif;}
        .navbar {overflow: hidden; background-color: #333;}
        .navbar a {float: left; display: block; color: #f2f2f2; text-align: center; padding: 14px 16px; text-decoration: none;}
        .navbar a:hover {background-color: #ddd; color: black;}
        .content {padding: 20px;}
    </style>
</head>
<body>
    <div class="navbar">
        <?php
        $_M0D5 = [
            1 => "EM", 2 => "ATEN", 3 => "ACLI", 4 => "ACLIADM", 5 => "BUSQ",
            6 => "CARR", 7 => "CATE", 8 => "COMP", 9 => "CONT", 10 => "DESC",
            11 => "EPRO", 12 => "FIDE", 13 => "GUSU", 14 => "PERS", 15 => "PROD",
            16 => "PROM", 17 => "PROV", 18 => "RANK", 19 => "RECL", 20 => "REPO",
            21 => "RESE", 22 => "VENT", 23 => "CVAL", 24 => "LCAR", 25 => "LPAR"
        ];
        foreach ($_M0D5 as $_K3Y => $_V4L) {
            echo "<a href=\"index.php?mod=$_K3Y\">$_V4L</a>";
        }
        ?>
        
    </div>
    <div class="content">
        <?php
        if (isset($_GET['mod'])) {
            $_M0D = $_GET['mod'];
            $_M4P = [
                '1' => 'indexEM.php', '2' => 'indexATEN.php', '3' => 'indexACLI.php',
                '4' => 'indexACLIADM.php', '5' => 'indexBUSQ.php', '6' => 'indexCARR.php',
                '7' => 'indexCATE.php', '8' => 'indexCOMP.php', '9' => 'index.php',
                '10' => 'indexDESC.php', '13' => 'user.php', '14' => 'list_employees.php',
                '15' => 'indexPROD.php', '16' => 'indexPROM.php', '17' => 'indexPROV.php',
                '18' => 'indexRANK.php', '22' => 'indexVENT.php', '23' => 'indexCVAL.php',
                '24' => 'index.php', '25' => 'index.php'
            ];
            $_D1R = [
                '1' => 'mempresas(EM)', '2' => 'matenciones(ATEN)', '3' => 'mclientes(ACLI)',
                '4' => 'mclientesAdmon(ACLIADM)', '5' => 'mbusquedas(BUSQ)', '6' => 'mcarreras(CARR)',
                '7' => 'mcategorias(CATE)', '8' => 'mcompras(COMP)', '9' => 'mcontratos(CONT)',
                '10' => 'mdescuentos(DESC)', '13' => 'mgestionUsuarios(GUSU)', '14' => 'mpersonal(PERS)',
                '15' => 'mproductos(PROD)', '16' => 'mpromociones(PROM)', '17' => 'mproveedores(PROV)',
                '18' => 'mrankingProductos(RANK)', '22' => 'mventas(VENT)/Ventas', '23' => 'mcomentariosValoraciones(CVAL)',
                '24' => 'mlogincardozo(LCAR)', '25' => 'mLoginParedes(LPAR)'
            ];
            if (array_key_exists($_M0D, $_M4P)) {
                include "{$_D1R[$_M0D]}/{$_M4P[$_M0D]}";
            } else {
                echo "<h2>NO SE REALIZO EL MODULO</h2>";
            }
        } else {
            echo "<h2>Bienvenido a la página principal</h2>";
            echo "<p>Selecciona su acronimo del módulo del menú para hacer pruebas.</p>";
        }
        ?>
    </div>
</body>
</html>
