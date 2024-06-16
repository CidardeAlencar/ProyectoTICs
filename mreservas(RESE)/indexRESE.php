<?php 
	
	session_start();
	require "admin/includes/functions.php";
	require "admin/includes/db.php";
	
	$get_recent = $db->query("SELECT * FROM productos LIMIT 9");
	
	$result = "";
	
	if($get_recent->num_rows) {
		
		while($row = $get_recent->fetch_assoc()) {
			
			$result .= "<div class='parallax_item'>
				
							<a href='mreservas(RESE)/detail.php?fid=".$row['id_producto']."'><img src='mreservas(RESE)/image/FoodPics/".$row['id_producto'].".jpg' width='80px' height='80px' /> 
							<div class='detail'>
								
								<h4>".$row['nombre']."</h4>
								<p class='desc'>".substr($row['descripcion'], 0, 33)."...</p>
								<p class='price'>Bs. ".$row['precio']."</p>
								
							</div>
							<p class='clear'></p>
							</a>
							
						</div>";
			
		}
		
	}else{
	}
	
?>

<!Doctype html>

<html lang="es">

<meta charset = "UTF-8">

<meta http-equiv = "X-UA-Compatible" content = "IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<meta name="description" content="" />

<meta name="keywords" content="" />

<head>
	
<title>MÓDULO_NICK</title>

<link rel="stylesheet" href="mreservas(RESE)/css/main.css" />

<script src="mreservas(RESE)/js/jquery.min.js" ></script>

<script src="mreservas(RESE)/js/myscript.js"></script>

<style>
    img[src*="https://cloud.githubusercontent.com/assets/23024110/20663010/9968df22-b55e-11e6-941d-edbc894c2b78.png"] {
    display: none;}
</style>

</head>

<body>
	
<?php require "includes/header.php"; ?>

<div class="parallax" onclick="remove_class()">
	
	<div class="parallax_head">
		
		<h2>Bienvenido</h2>
		<h3>A nuestra sección de Reservas/Pedidos</h3>
		
	</div>
	
</div>

<div class="content" onclick="remove_class()">
	
	<a href="mreservas(RESE)/reservation.php" class="submit">RESERVAR UN PRODUCTO</a>
		
</div>

<div class="content remove_pad" onclick="remove_class()">
	
	<div class="inner_content on_parallax">
		
		<h2><span class="fresh">Descubre nuestros Prodcutos más Recientes</span></h2>
		
		<div class="parallax_content">
			
			<?php echo $result; ?>
			
			<p class="clear"></p>
			
		</div>
		
	</div>
	
</div>

<div class="content" onclick="remove_class()">
	
	<div class="inner_content">
		
		<div class="contact">
			
			<div class="left">
				
				<h3>UBICACIÓN</h3>
				<p>Escuela Militar de Ingenieria, Irpavi</p>
				<p>La Paz</p>
				
			</div>
			
			<div class="left">
				
				<h3>CONTACTO</h3>
				<p>22432266, 71535093</p>
				<p>emi_nacional@adm.emi.edu.bo</p>
				
			</div>
			
			<p class="left"></p>
			
			<div class="icon_holder">
				
				<a href="https://www.facebook.com/EMIBoliviaPaginaOficial/?locale=es_LA" target="_blank"><img src="mreservas(RESE)/image/icons/Facebook.png" alt="Facebook.png" /></a>
				<a href="https://www.emi.edu.bo/" target="_blank"><img src="mreservas(RESE)/image/icons/Google+.png" alt="Google+.png"  /></a>
				<a href="https://x.com/emi_lapaz?lang=es" target="_blank"><img src="mreservas(RESE)/image/icons/Twitter.png" alt="Twitter.png"  /></a>
				
			</div>
			
		</div>
		
	</div>
	
</div>

<div class="footer_parallax" onclick="remove_class()">
	
	<div class="on_footer_parallax">
		
		<p>&copy; <?php echo strftime("%Y", time()); ?> <span>EMI La Paz</span>. Todos los Derechos Reservados</p>
		
	</div>
	
</div>
	
</body>

</html>