<?php 
	
	session_start();
	require "admin/includes/functions.php";
	require "admin/includes/db.php";
	
	$msg = "";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		if(isset($_POST['submit'])) {
			
			$guest = preg_replace("#[^0-9]#", "", $_POST['guest']);
			$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
			$phone = preg_replace("#[^0-9]#", "", $_POST['phone']);
			$date_res = htmlentities($_POST['date_res'], ENT_QUOTES, 'UTF-8');
			$suggestions = htmlentities($_POST['suggestions'], ENT_QUOTES, 'UTF-8');
			
			if($guest != "" && $email && $phone != "" && $date_res != "" && $suggestions != "") {
				
				$check = $db->query("SELECT * FROM reservation WHERE no_of_guest='".$guest."' AND email='".$email."' AND phone='".$phone."' AND date_res='".$date_res."' LIMIT 1");
				
				if($check->num_rows) {
					
					$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>You have already placed a reservation with the same information</p>";
					
				}else{
					
					$insert = $db->query("INSERT INTO reservation(no_of_guest, email, phone, date_res, suggestions) VALUES('".$guest."', '".$email."', '".$phone."', '".$date_res."', '".$suggestions."')");
					
					if($insert) {
						
						$ins_id = $db->insert_id;
						
						$reserve_code = "UNIQUE_$ins_id".substr($phone, 3, 8);
						
						$msg = "<p style='padding: 15px; color: green; background: #eeffee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Reservation placed successfully. Your reservation code is $reserve_code. Please Note that reservation expires after one hour</p>";
						
					}else{
						
						$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Could not place reservation. Please try again</p>";
						
					}
					
				}
				
			}else{
				
				$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Incomplete form data or Invalid data type</p>";
				
				print_r($_POST);
				
			}
			
		}
		
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

<link rel="stylesheet" href="css/main.css" />

<script src="js/jquery.min.js" ></script>

<script src="js/myscript.js"></script>
	
</head>

<body>
	
<?php require "includes/header.php"; ?>

<div class="parallax" onclick="remove_class()">
	
	<div class="parallax_head">
		
		<h2>Reservas</h2>
		<h3>Nuestro Espacio</h3>
		
	</div>
	
</div>

<div class="content" onclick="remove_class()">
	
	<div class="inner_content">
		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="hr_book_form">
			
			<h2 class="form_head"><span class="book_icon">RESERVA UN PRODUCTO</span></h2>
			<p class="form_slg">TE OFRECEMOS LOS MEJORES SERVICIOS DE RESERVA</p>
			
			<?php echo "<br/>".$msg; ?>
			
			<div class="left">
				
				<div class="form_group">
					 
					 <label>Cantidad de Productos</label>
					<input type="number" placeholder="Cuántos de nustros productos" min="1" name="guest" id="guest" required>
					
				</div>
				
				<div class="form_group">
					
					<label>Correo Electrónico</label>
					<input type="email" name="email" placeholder="Ingresa tu correo electrónico" required>
					
				</div>
				
				<div class="form_group">
					
					<label>Teléfono</label>
					<input type="text" name="phone" placeholder="Ingresa tu número de teléfono" required>
					
				</div>
				
				<div class="form_group">
					
					<label>Día</label>
					<input type="date" name="date_res" placeholder="Select date for booking" required>
					
				</div>
				
				
			</div>
			
			<div class="left">
				
				<div class="form_group">
					
                    <label>Sugerencias <small><b>(Déjanos saber tu opinión...)</b></small></label>
					<textarea name="suggestions" placeholder="tus sugerencias" required></textarea>
					
				</div>
				
				<div class="form_group">
					
					<input type="submit" class="submit" name="submit" value="REALIZA TU RESERVA" />
					
				</div>
				
			</div>
			
			<p class="clear"></p>
			
		</form>
		
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