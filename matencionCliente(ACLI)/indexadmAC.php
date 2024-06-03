<?php
include('connection.php');

$con = connection();

$sql = "SELECT * FROM users_preguntas";
$query = mysqli_query($con, $sql);
?>

<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        
        <!-- title of site -->
        <title>Atencion al Cliente Administrador</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="assets/css/linearicons.css">

		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/styleadmAC.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">

    </head>

<body>
    <div class = "users-table">
        <h2>Preguntas pendientes</h2>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Pregunta</th>
                <th>Respuesta</th>
                <th>Acción</th>
            </tr>
            </thead>

            <tbody>
            <?php while($row = mysqli_fetch_array($query)): ?>
                <tr>
                <th class="id-columna"> <?= $row['id_preg']?> </th>
                <th> <?= $row['pregunta']?> </th>
                <th> <?= $row['respuesta']?> </th>
                <th class="accion-columna"><a href="updateadmAC.php?id_preg=<?= $row['id_preg'] ?>" class="users-table--edit">Responder</a></th>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>