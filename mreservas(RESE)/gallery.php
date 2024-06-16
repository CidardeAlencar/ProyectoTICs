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

<link rel="stylesheet" href="css/lightbox.min.css" />

<script src="js/jquery.min.js" ></script>

<script src="js/myscript.js"></script>
	
</head>

<body>
	
<?php require "includes/header.php"; ?>

<div class="parallax" onclick="remove_class()">
	
	<div class="parallax_head">
		
		<h2>Nuestra</h2>
		<h3>Galería</h3>
		
	</div>
	
</div>

<div class="content" onclick="remove_class()">
	
	<div class="inner_content on_parallax">
		
		<h2><span class="fresh">Variedad de Productos</span></h2>
		
		<div class="parallax_content">
			
			<div class="multicol">
				
				<div class="image_display">
				
					<a href="image/FoodPics/1.jpg" data-lightbox="image-1"><img src="image/FoodPics/1.jpg" alt="1.jpg" width="100%" /></a>
					
				</div>
				
				<div class="image_display">
					
					<a href="image/FoodPics/2.jpg" data-lightbox="image-2"><img src="image/FoodPics/2.jpg" alt="2.jpg" width="100%" /></a>
					
				</div>
				
				<div class="image_display">
					
					<a href="image/FoodPics/3.jpg" data-lightbox="image-3"><img src="image/FoodPics/3.jpg" alt="3.jpg" width="100%" />
					
				</div>
				
				<div class="image_display">
					
					<a href="image/FoodPics/4.jpg" data-lightbox="image-4"><img src="image/FoodPics/4.jpg" alt="4.jpg" width="100%" /></a>
					
				</div>
				
				<div class="image_display">
					
					<a href="image/FoodPics/5.jpg" data-lightbox="image-5"><img src="image/FoodPics/5.jpg" alt="5.jpg" width="100%" /></a>
					
				</div>
                    
                <div class="image_display">
					
					<a href="image/FoodPics/6.jpg" data-lightbox="image-6"><img src="image/FoodPics/6.jpg" alt="6.jpg" width="100%" /></a>
					
				</div>
                    
                <div class="image_display">
					
					<a href="image/FoodPics/7.jpg" data-lightbox="image-7"><img src="image/FoodPics/7.jpg" alt="7.jpg" width="100%" /></a>
					
				</div>

				<div class="image_display">
					
					<a href="image/FoodPics/8.jpg" data-lightbox="image-8"><img src="image/FoodPics/8.jpg" alt="8.jpg" width="100%" /></a>
					
				</div>
				
			</div>
			
			<p class="clear"></p>
			
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

<script src="js/lightbox.min.js" ></script>