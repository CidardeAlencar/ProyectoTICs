<?php
include 'connection.php';

// Consulta para obtener todos los contratos
$consulta = "SELECT 
                c.contratoId, 
                cli.nombre AS cliente, 
                p.nombre AS proveedor, 
                e.nombre AS empleado, 
                ps.nombre AS productoServicio, 
                c.fechaInicio, 
                c.fechaFin, 
                c.monto, 
                c.estado 
            FROM Contratos c
            JOIN Clientes cli ON c.clienteId = cli.clienteId
            JOIN Proveedores p ON c.proveedorId = p.proveedorId
            JOIN Empleados e ON c.empleadoId = e.empleadoId
            JOIN ProductosServicios ps ON c.productoServicioId = ps.productoServicioId";
$resultado = mysqli_query($conexion, $consulta);
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
	<!-- meta data -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<!--font-family-->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

	<!-- title of site -->
	<title>Furniture</title>

	<!-- For favicon png -->
	<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png" />

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
	<link rel="stylesheet" href="assets/css/bootsnav.css">

	<!--style.css-->
	<link rel="stylesheet" href="assets/css/style.css">

	<!--responsive.css-->
	<link rel="stylesheet" href="assets/css/responsive.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

	<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
	<style>
        .no-capitalization {
            text-transform: none;
        }
    </style>
</head>

<style>
	/* Estilos para la tabla de contratos */

	#new-arrivals table {
		width: 100%;
		border-collapse: collapse;
		margin: 20px 0;
	}

	#new-arrivals th,
	#new-arrivals td {
		padding: 8px;
		text-align: left;
		border-bottom: 1px solid #ddd;
	}

	#new-arrivals th {
		background-color: #e99c2e;
		color: #fff;
	}

	#new-arrivals a {
		color: #e99c2e;
		text-decoration: none;
	}

	#new-arrivals a:hover {
		color: #e68a0d;
	}

	#new-arrivals button {
		background-color: #e99c2e;
		color: #fff;
		padding: 10px 20px;
		border: none;
		border-radius: 5px;
		cursor: pointer;
	}

	#new-arrivals button:hover {
		background-color: #e68a0d;
	}

	#new-arrivals .button-container {
		display: flex;
		justify-content: center;
		align-items: center;
		margin-top: 20px;
	}

	#new-arrivals .button-container button {
		margin: 0 10px;
	}

	#new-arrivals tbody {
		color: black;
	}

	/* Ajustes para dispositivos móviles */

	@media (max-width: 768px) {
		#new-arrivals button {
			font-size: 14px;
		}
	}
</style>

<body>
	<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->



	<!--welcome-hero start -->
	<header id="home" class="welcome-hero">

		<div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
			<!--/.carousel-indicator -->
			<ol class="carousel-indicators">
				<li data-target="#header-carousel" data-slide-to="0" class="active"><span class="small-circle"></span></li>
				<li data-target="#header-carousel" data-slide-to="1"><span class="small-circle"></span></li>
				<li data-target="#header-carousel" data-slide-to="2"><span class="small-circle"></span></li>
			</ol><!-- /ol-->
			<!--/.carousel-indicator -->

			<!--/.carousel-inner -->
			<div class="carousel-inner" role="listbox">
				<!-- .item -->
				<div class="item active">
					<div class="single-slide-item slide1">
						<div class="container">
							<div class="welcome-hero-content">
								<div class="row">
									<div class="col-sm-7">
										<div class="single-welcome-hero">
											<div class="welcome-hero-txt no-capitalization">
												<h2>CONTRATO DE MESAS Y SILLAS</h2>
												<p>
													Realiza tus contactos con proveedores de diferentes productos para que la empresa tenga un seguimiento adecuado de todos sus proveedores.
												</p>
												<!-- <div class="packages-price">
													<p>
														$ 399.00
														<del>$ 499.00</del>
													</p>
												</div> -->
												<button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
													<span class="lnr lnr-plus-circle"></span>
													CONTRATOS <span></span> 
												</button>
												<!-- <button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
													more info
												</button> -->
											</div><!--/.welcome-hero-txt-->
										</div><!--/.single-welcome-hero-->
									</div><!--/.col-->
									<div class="col-sm-5">
										<div class="single-welcome-hero">
											<div class="welcome-hero-img">
												<img src="assets/images/slider/slide1.png" alt="slider image">
											</div><!--/.welcome-hero-txt-->
										</div><!--/.single-welcome-hero-->
									</div><!--/.col-->
								</div><!--/.row-->
							</div><!--/.welcome-hero-content-->
						</div><!-- /.container-->
					</div><!-- /.single-slide-item-->

				</div><!-- /.item .active-->

				<div class="item">
					<div class="single-slide-item slide2">
						<div class="container">
							<div class="welcome-hero-content">
								<div class="row">
									<div class="col-sm-7">
										<div class="single-welcome-hero">
											<div class="welcome-hero-txt no-capitalization">
												<h2>CONTRATO DE SILLONES</h2>
												<p>
													Realiza tus contactos con proveedores de diferentes productos para que la empresa tenga un seguimiento adecuado de todos sus proveedores.
												</p>
												<button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
													<span class="lnr lnr-plus-circle"></span>
													CONTRATOS <span></span> 
												</button>
												<!-- <button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
													more info
												</button> -->
											</div><!--/.welcome-hero-txt-->
										</div><!--/.single-welcome-hero-->
									</div><!--/.col-->
									<div class="col-sm-5">
										<div class="single-welcome-hero">
											<div class="welcome-hero-img">
												<img src="assets/images/slider/slide2.png" alt="slider image">
											</div><!--/.welcome-hero-txt-->
										</div><!--/.single-welcome-hero-->
									</div><!--/.col-->
								</div><!--/.row-->
							</div><!--/.welcome-hero-content-->
						</div><!-- /.container-->
					</div><!-- /.single-slide-item-->

				</div><!-- /.item .active-->

				<div class="item">
					<div class="single-slide-item slide3">
						<div class="container">
							<div class="welcome-hero-content">
								<div class="row">
									<div class="col-sm-7">
										<div class="single-welcome-hero">
											<div class="welcome-hero-txt no-capitalization">

												<h2>CONTRATO DE OTROS MUEBLES</h2>
												<p>
													Realiza tus contactos con proveedores de diferentes productos para que la empresa tenga un seguimiento adecuado de todos sus proveedores.
												</p>
												<button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
													<span class="lnr lnr-plus-circle"></span>
													CONTRATOS <span></span> 
												</button>
												<!-- <button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
													more info
												</button> -->
											</div><!--/.welcome-hero-txt-->
										</div><!--/.single-welcome-hero-->
									</div><!--/.col-->
									<div class="col-sm-5">
										<div class="single-welcome-hero">
											<div class="welcome-hero-img">
												<img src="assets/images/slider/slide3.png" alt="slider image">
											</div><!--/.welcome-hero-txt-->
										</div><!--/.single-welcome-hero-->
									</div><!--/.col-->
								</div><!--/.row-->
							</div><!--/.welcome-hero-content-->
						</div><!-- /.container-->
					</div><!-- /.single-slide-item-->

				</div><!-- /.item .active-->
			</div><!-- /.carousel-inner-->

		</div><!--/#header-carousel-->

		<!-- top-area Start -->
		<div class="top-area">
			<div class="header-area">
				<!-- Start Navigation -->
				<nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

					<!-- Start Top Search -->
					<div class="top-search">
						<div class="container">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-search"></i></span>
								<input type="text" class="form-control" placeholder="Search">
								<span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
							</div>
						</div>
					</div>
					<!-- End Top Search -->

					<div class="container">
						<!-- Start Atribute Navigation -->
						<div class="attr-nav">
							<ul>
								<li class="search">
									<a href="#"><span class="lnr lnr-magnifier"></span></a>
								</li><!--/.search-->
								<li class="nav-setting">
									<a href="#"><span class="lnr lnr-cog"></span></a>
								</li><!--/.search-->
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<span class="lnr lnr-cart"></span>
										<span class="badge badge-bg-1">2</span>
									</a>
									<ul class="dropdown-menu cart-list s-cate">
										<li class="single-cart-list">
											<a href="#" class="photo"><img src="assets/images/collection/arrivals1.png" class="cart-thumb" alt="image" /></a>
											<div class="cart-list-txt">
												<h6><a href="#">arm <br> chair</a></h6>
												<p>1 x - <span class="price">Bs. 1080.00</span></p>
											</div><!--/.cart-list-txt-->
											<div class="cart-close">
												<span class="lnr lnr-cross"></span>
											</div><!--/.cart-close-->
										</li><!--/.single-cart-list -->
										<li class="single-cart-list">
											<a href="#" class="photo"><img src="assets/images/collection/arrivals2.png" class="cart-thumb" alt="image" /></a>
											<div class="cart-list-txt">
												<h6><a href="#">single <br> armchair</a></h6>
												<p>1 x - <span class="price">Bs. 1000.00</span></p>
											</div><!--/.cart-list-txt-->
											<div class="cart-close">
												<span class="lnr lnr-cross"></span>
											</div><!--/.cart-close-->
										</li><!--/.single-cart-list -->
										<li class="single-cart-list">
											<a href="#" class="photo"><img src="assets/images/collection/arrivals3.png" class="cart-thumb" alt="image" /></a>
											<div class="cart-list-txt">
												<h6><a href="#">wooden arn <br> chair</a></h6>
												<p>1 x - <span class="price">Bs. 1150.00</span></p>
											</div><!--/.cart-list-txt-->
											<div class="cart-close">
												<span class="lnr lnr-cross"></span>
											</div><!--/.cart-close-->
										</li><!--/.single-cart-list -->
										<li class="total">
											<span>Total: $0.00</span>
											<button class="btn-cart pull-right" onclick="window.location.href='#'">view cart</button>
										</li>
									</ul>
								</li><!--/.dropdown-->
							</ul>
						</div><!--/.attr-nav-->
						<!-- End Atribute Navigation -->

						<!-- Start Header Navigation -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
								<i class="fa fa-bars"></i>
							</button>
							<a class="navbar-brand" href="index.html">REALIZAR<span>CONTRATOS</span>.</a>

						</div><!--/.navbar-header-->
						<!-- End Header Navigation -->

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
							<ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
								<!-- <li class=" scroll active"><a href="#home">home</a></li> -->
								<li class="scroll"><a href="#new-arrivals">contratos</a></li>
								<li class="scroll"><a href="#feature"></a></li>
								<li class="scroll"><a href="#blog"></a></li>
								<li class="scroll"><a href="#newsletter">contact</a></li>
							</ul><!--/.nav -->
						</div><!-- /.navbar-collapse -->
					</div><!--/.container-->
				</nav><!--/nav-->
				<!-- End Navigation -->
			</div><!--/.header-area-->
			<div class="clearfix"></div>

		</div><!-- /.top-area-->
		<!-- top-area End -->

	</header><!--/.welcome-hero-->
	<!--welcome-hero end -->


	<!--new-arrivals start -->
	<section id="new-arrivals" class="new-arrivals">
		<div class="container">
			<div class="section-header">
				<h2>Contratos</h2>
			</div><!--/.section-header-->
			<div class="new-arrivals-content">

				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>Cliente</th>
							<th>Proveedor</th>
							<th>Empleado</th>
							<th>Producto/Servicio</th>
							<th>Fecha Inicio</th>
							<th>Fecha Fin</th>
							<th>Monto</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($resultado && mysqli_num_rows($resultado) > 0) {
							while ($row = mysqli_fetch_assoc($resultado)) {
								echo "<tr>";
								echo "<td>" . $row['contratoId'] . "</td>";
								echo "<td>" . $row['cliente'] . "</td>";
								echo "<td>" . $row['proveedor'] . "</td>";
								echo "<td>" . $row['empleado'] . "</td>";
								echo "<td>" . $row['productoServicio'] . "</td>";
								echo "<td>" . $row['fechaInicio'] . "</td>";
								echo "<td>" . $row['fechaFin'] . "</td>";
								echo "<td>" . $row['monto'] . "</td>";
								echo "<td>" . $row['estado'] . "</td>";
								echo '<td>';
								echo '<a href="verCONT.php?id=' . $row['contratoId'] . '">Ver</a> | ';
								echo '<a href="editarCONT.php?id=' . $row['contratoId'] . '">Editar</a> | ';
								echo '<a href="anularCONT.php?id=' . $row['contratoId'] . '">Anular</a>';
								echo '</td>';
								echo "</tr>";
							}
						} else {
							echo "<tr><td colspan='10'>No se encontraron contratos.</td></tr>";
						}
						?>
					</tbody>
				</table>
				<div class="button-container">
					<button onclick="window.location.href='crearCONT.php'">Crear Nuevo Contrato</button>
				</div>

			</div>
		</div><!--/.container-->

	</section><!--/.new-arrivals-->
	<!--new-arrivals end -->

	<!--sofa-collection start -->
	<section id="sofa-collection">
		<div class="owl-carousel owl-theme" id="collection-carousel">
			<div class="sofa-collection collectionbg1">
				<div class="container">
					<div class="sofa-collection-txt no-capitalization">
						<h2>Colección Ilimitada de Sofás</h2></h2>
						<p>
							Observa los contratos de diferentes coleciones de muebles.
						</p>
						<div class="sofa-collection-price">
							<h4>A partir de: <span>Bs. 1099</span></h4>
						</div>
						<button class="btn-cart welcome-add-cart sofa-collection-btn" onclick="window.location.href='#'">
							Ver más
						</button>
					</div>
				</div>
			</div><!--/.sofa-collection-->
			<div class="sofa-collection collectionbg2">
				<div class="container">
					<div class="sofa-collection-txt no-capitalization">
						<h2>Colección ilimitada de mesas de comedor</h2>
						<p>
							Observa los contratos de diferentes coleciones de muebles.
						</p>
						<div class="sofa-collection-price">
							<h4>A partir de: <span>Bs. 1299</span></h4>
						</div>
						<button class="btn-cart welcome-add-cart sofa-collection-btn" onclick="window.location.href='#'">
							Ver más
						</button>
					</div>
				</div>
			</div><!--/.sofa-collection-->
		</div><!--/.collection-carousel-->

	</section><!--/.sofa-collection-->
	<!--sofa-collection end -->

	<!--feature start -->
	<section id="feature" class="feature">
		<div class="container">
			<div class="section-header">
				<h2>Productos Destacados</h2>
			</div><!--/.section-header-->
			<div class="feature-content">
				<div class="row">
					<div class="col-sm-3">
						<div class="single-feature">
							<img src="assets/images/features/f1.jpg" alt="feature image">
							<div class="single-feature-txt text-center no-capitalization">
								<p>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
									<span class="feature-review">(45 review)</span>
								</p>
								<h3><a href="#">Sofa</a></h3>
								<h5>Bs. 900.00</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="single-feature">
							<img src="assets/images/features/f2.jpg" alt="feature image">
							<div class="single-feature-txt text-center no-capitalization">
								<p>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
									<span class="feature-review">(45 review)</span>
								</p>
								<h3><a href="#">Mesa de Comedor </a></h3>
								<h5>Bs. 800.00</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="single-feature">
							<img src="assets/images/features/f3.jpg" alt="feature image">
							<div class="single-feature-txt text-center no-capitalization">
								<p>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
									<span class="feature-review">(45 review)</span>
								</p>
								<h3><a href="#">Silla y Mesa</a></h3>
								<h5>Bs. 1000.00</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="single-feature">
							<img src="assets/images/features/f4.jpg" alt="feature image">
							<div class="single-feature-txt text-center">
								<p>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
									<span class="feature-review">(45 review)</span>
								</p>
								<h3><a href="#">Silla Moderna</a></h3>
								<h5>Bs. 999.00</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.container-->

	</section><!--/.feature-->
	<!--feature end -->

	

	

	<!--newsletter strat -->
	<section id="newsletter" class="newsletter">
		<div class="container">
			<div class="hm-footer-details">
				<div class="row">
					<div class=" col-md-3 col-sm-6 col-xs-12">
						<div class="hm-footer-widget">
							<div class="hm-foot-title">
								<h4>información</h4>
							</div><!--/.hm-foot-title-->
							<div class="hm-foot-menu">
								<ul>
									<li><a href="#">Sobre Nosotros</a></li><!--/li-->
									<li><a href="#">Contáctenos</a></li><!--/li-->
									<li><a href="#">Noticias</a></li><!--/li-->
									<!-- <li><a href="#">Almac</a></li>/li -->
								</ul><!--/ul-->
							</div><!--/.hm-foot-menu-->
						</div><!--/.hm-footer-widget-->
					</div><!--/.col-->
					<div class=" col-md-3 col-sm-6 col-xs-12">
						<div class="hm-footer-widget">
							<div class="hm-foot-title">
								<h4>collections</h4>
							</div><!--/.hm-foot-title-->
							<div class="hm-foot-menu">
								<ul>
									<li><a href="#">Silla de Madera</a></li><!--/li-->
									<li><a href="#">Sofá de Tela</a></li><!--/li-->
									<li><a href="#">Silla Decorativa</a></li><!--/li-->
									<li><a href="#">Cama</a></li><!--/li-->
									<li><a href="#">Lámpara Colgante</a></li><!--/li-->
								</ul><!--/ul-->
							</div><!--/.hm-foot-menu-->
						</div><!--/.hm-footer-widget-->
					</div><!--/.col-->
					<div class=" col-md-3 col-sm-6 col-xs-12">
						<div class="hm-footer-widget">
							<div class="hm-foot-title">
								<h4>my accounts</h4>
							</div><!--/.hm-foot-title-->
							<div class="hm-foot-menu">
								<ul>
									<li><a href="#">Mis Cuentas</a></li><!--/li-->
									<li><a href="#">Comunidad</a></li><!--/li-->
									<li><a href="#">Contratos</a></li><!--/li-->
									<li><a href="#">Pedidos</a></li><!--/li-->
								</ul><!--/ul-->
							</div><!--/.hm-foot-menu-->
						</div><!--/.hm-footer-widget-->
					</div><!--/.col-->
					<div class=" col-md-3 col-sm-6  col-xs-12">
						<div class="hm-footer-widget">
							<div class="hm-foot-title">
								<h4>newsletter</h4>
							</div><!--/.hm-foot-title-->
							<div class="hm-foot-para">
								<p>
									Suscríbite para recibir las últimas noticias.
								</p>
							</div><!--/.hm-foot-para-->
							<div class="hm-foot-email">
								<div class="foot-email-box">
									<input type="text" class="form-control" placeholder="Ingree su Correo Electrónico Aquí....">
								</div><!--/.foot-email-box-->
								<div class="foot-email-subscribe">
									<span><i class="fa fa-location-arrow"></i></span>
								</div><!--/.foot-email-icon-->
							</div><!--/.hm-foot-email-->
						</div><!--/.hm-footer-widget-->
					</div><!--/.col-->
				</div><!--/.row-->
			</div><!--/.hm-footer-details-->

		</div><!--/.container-->

	</section><!--/newsletter-->
	<!--newsletter end -->

	<!--footer start-->
	<footer id="footer" class="footer">
		<div class="container">
			<div class="hm-footer-copyright text-center">
				<div class="footer-social">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-pinterest"></i></a>
					<a href="#"><i class="fa fa-behance"></i></a>
				</div>
				<p>
					<!-- &copy;copyright. designed and developed by <a href="https://www.themesine.com/">themesine</a> -->
				</p><!--/p-->
			</div><!--/.text-center-->
		</div><!--/.container-->

		<div id="scroll-Top">
			<div class="return-to-top">
				<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
			</div>

		</div><!--/.scroll-Top-->

	</footer><!--/.footer-->
	<!--footer end-->

	<!-- Include all js compiled plugins (below), or include individual files as needed -->

	<script src="assets/js/jquery.js"></script>

	<!--modernizr.min.js-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

	<!--bootstrap.min.js-->
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- bootsnav js -->
	<script src="assets/js/bootsnav.js"></script>

	<!--owl.carousel.js-->
	<script src="assets/js/owl.carousel.min.js"></script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>


	<!--Custom JS-->
	<script src="assets/js/custom.js"></script>

</body>

</html>