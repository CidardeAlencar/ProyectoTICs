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
        <title>Ventas</title>

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
        <link rel="stylesheet" href="assets/css/styleAC.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">

    </head>

<body>
    <!--populer-products start -->
		<section id="populer-products" class="populer-products">
			<div class="container">
				<div class="populer-products-content">
					<div class="row">
						
						<div class="col-md-6">
							<div class="single-populer-products">
								<div class="single-inner-populer-products">
									<div class="row">
										<div class="col-md-4 col-sm-12">
											<div class="single-inner-populer-product-img">
												<img src="assets/images/images.jpg" alt="populer-products images">
											</div>
										</div>
										<div class="col-md-8 col-sm-12">
											<div class="single-inner-populer-product-txt">
												<h2>
													Atención al Cliente
												</h2>
												<p>
                                                    No dude en hacer cualquier pregunta que tenga.
                                                    Estamos aquí para ayudarlo a comprender nuestros productos.
												</p>
                                                <form action="insertAC.php" method = "POST">
                                                    <div class="populer-products-price">
                                                        <input type="text" id="mensaje-usuario" name = "pregunta" placeholder="Escribe tu mensaje...">
                                                    </div>
                                                    </div>
                                                            <div id="ventana-emergente" style="display: none;">
                                                            <div id="ventana-emergente-contenido">¡Su mensaje ha sido enviado!</div>
                                                        </div>
                                                    <button type="submit" class="btn-cart welcome-add-cart populer-products-btn" onclick="mostrarVentanaEmergente();">
                                                        Enviar
                                                    </button>
                                                </form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div><!--/.container-->

		</section><!--/.populer-products-->
		<!--populer-products end-->

        <script>
    function mostrarVentanaEmergente() {
      // Mostrar la ventana emergente y evitar que se cierre automáticamente
      document.getElementById('ventana-emergente').style.display = 'block';
    }
  </script>

</body>

</html>