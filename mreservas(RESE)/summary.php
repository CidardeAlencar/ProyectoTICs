<?php 
	
	session_start();
	
	$order_id = $_SESSION['order_id'];
	$name = $_SESSION['name'];
	
	unset($_SESSION['order_id']);
	
	unset($_SESSION['name']);
	
	unset($_SESSION['cart_array']);
	
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

<link rel="stylesheet" href="css/main.css" />

<script src="js/jquery.min.js" ></script>

<script src="js/myscript.js"></script>
	
</head>

<body>
	
<?php require "includes/header.php"; ?>

<div class="parallax_basket" onclick="remove_class()">
	
	<div class="parallax_head_basket">
		
		<h2>Pedidos</h2>
		<h3>Resumen</h3>
		
	</div>
	
</div>

<div class="content remove_pad" onclick="remove_class()">
	
	<div class="inner_content on_parallax">
		
		<h2><span class="s_summary">Pedido Exitoso</span></h2>
		
		<div class="order_holder">
			
			<p class="summary_p">Gracias por tu patrocinio <?php echo $name; ?>. Tu <span>número de orden</span> es: <?php echo $order_id; ?>. Nos aseguraremos de que su pedido se entregue a tiempo y esperamos que continúe siendo condescendiente con nosotros. Por favor, es importante tener en cuenta que su número de pedido debe mantenerse seguro.</p>
			
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
				
				<a href="https://www.facebook.com/EMIBoliviaPaginaOficial/?locale=es_LA" target="_blank"><img src="image/icons/Facebook.png" alt="Facebook.png" /></a>
				<a href="https://www.emi.edu.bo/" target="_blank"><img src="image/icons/Google+.png" alt="Google+.png"  /></a>
				<a href="https://x.com/emi_lapaz?lang=es" target="_blank"><img src="image/icons/Twitter.png" alt="Twitter.png"  /></a>
				
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