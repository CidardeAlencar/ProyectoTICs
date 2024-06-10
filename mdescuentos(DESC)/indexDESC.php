<?php
// verify if exists file ../connection.php
$path = '../connection.php';
$currentPath = dirname( __FILE__ );
$newPath = $currentPath . DIRECTORY_SEPARATOR . $path;
require_once $newPath;
  
//   SELECT
// 	descuentos.*,
//     productos.nombre AS nombreProducto,
//     productos.descripcion AS descripcionProducto,
//     productos.precio AS precioProducto,
//     productos.categoria AS categoriaProducto,
//     productos.imagen_principal AS imagen
// FROM
// 	descuentos JOIN productos ON productos.id_producto = descuentos.productId;
$connect = connection();

$search = $_GET[ 'search' ] ?? '';

$discountProductsStmt = $connect->prepare( "
  SELECT
    descuentos.*,
    productos.nombre AS nombreProducto,
    productos.descripcion AS descripcionProducto,
    productos.precio AS precioProducto,
    productos.categoria AS categoriaProducto,
    productos.imagen_principal AS imagen
  FROM
    descuentos JOIN productos ON productos.id_producto = descuentos.productId
  WHERE
    descuentos.name LIKE ?
  ORDER BY descuentos.createdAt DESC
  " );

$searchParam = "%$search%";
$discountProductsStmt->bind_param( "s", $searchParam );

$discountProductsStmt->execute();

$result = $discountProductsStmt->get_result();
$discountProducts = $result->fetch_all( MYSQLI_ASSOC );

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Descuentos 🐼 </title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
  <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
  <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/linearicons.css">
  <link rel="stylesheet" href="../assets/css/animate.css">
  <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/bootsnav.css" >	
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/responsive.css">
  <link rel="stylesheet" href="./assets/styles/styleDESC.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex flex-col sm:flex-row w-full">
      <aside
        id="sidebar-multi-level-sidebar"
        class="z-40 w-64 md:w-80 transition-transform -translate-x-full transform fixed top-0 left-0 h-full bg-white dark:bg-gray-900 dark:text-white overflow-y-auto"
        style="height: calc(100vh - 50px)"
        aria-label="Sidebar"
      >
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
          <div class="w-full flex items-center justify-end">
            <button
              data-drawer-target="sidebar-multi-level-sidebar"
              data-drawer-toggle="sidebar-multi-level-sidebar"
              aria-controls="sidebar-multi-level-sidebar"
              type="button"
              class="inline-flex items-center p-2 mt-2 ms-3 text-2xl text-red-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-red-500 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
              id="close-sidebar"
            >
              ❌
            </button>
          </div>
          <ul class="space-y-2 font-medium">
            <li>
              <!-- TODO: Cambiar direccion segun su proyecto -->
              <a
                href="/mdescuentos(DESC)/viewDESC.php"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                style="display: flex;"
              >
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                  <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                </svg>
                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap"> Ver Descuentos </span>
              </a>
            </li>
            <li>
              <!-- TODO: Cambiar direccion segun su proyecto -->
              <a
                href="/mdescuentos(DESC)/insertDESC.php"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                style="display: flex;"
              >
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                  <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap"> Crear Descuento </span>
                <span class="hidden md:inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300"> Admin </span>
              </a>
            </li>
            
            <li>
              <!-- TODO: Cambiar direccion segun su proyecto -->
              <a
                href="/mdescuentos(DESC)/updateDESC.php"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                style="display: flex;"
              >
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                  <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap"> Editar Descuento </span>
                <span class="hidden md:inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300"> Admin </span>
              </a>
            </li>
            <li>
              <!-- TODO: Cambiar direccion segun su proyecto -->
              <a
                href="/mdescuentos(DESC)/deleteDESC.php"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                style="display: flex;"
              >
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap"> Eliminar Descuento </span>
                <span class="hidden md:inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300"> Admin </span>
              </a>
            </li>
          </ul>
        </div>
      </aside>

      <main
        class="w-full flex flex-col items-center bg-gray-100"
        style="height: calc(100vh - 50px)"
      >
        <div class="w-full bg-gray-800 text-white h-14 flex items-center justify-between px-4">
          <button
            data-drawer-target="sidebar-multi-level-sidebar"
            data-drawer-toggle="sidebar-multi-level-sidebar"
            id="open-sidebar"
            aria-controls="sidebar-multi-level-sidebar"
            type="button"
            class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
          >
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
          </button>
        </div>
        <h1 class="text-6xl text-center mt-12 text-gray-800"> Nuestros Descuentos 🐼 </h1>
        <section id="new-arrivals" class="new-arrivals">
          <div class="container">
            <div class="new-arrivals-content">
              <div class="row">
                <?php foreach ( $discountProducts as $discountProduct ): ?>
                <div class="col-md-3 col-sm-4">
                  <div class="single-new-arrival">
                    <div class="single-new-arrival-bg">
                      <img src=" <?= $discountProduct[ 'imagen' ] != '' ? $discountProduct[ 'imagen ' ] : 'assets/images/collection/arrivals1.png' ?>" alt="new-arrivals images">
                      <div class="single-new-arrival-bg-overlay"></div>
                      <div class="sale bg-1" style="width:auto;">
                        <p> <?= $discountProduct[ 'categoriaProducto' ] ?> </p>
                      </div>
                      <div class="sale bg-1">
                        <p> <?= $discountProduct[ 'percentage' ] ?>% </p>
                      </div>
                      <div class="new-arrival-cart">
                        <p>
                          <span class="lnr lnr-cart"></span>
                          <a href="#"> Agregar <span> al </span> carrito </a>
                        </p>
                        <p class="arrival-review pull-right">
                          <span class="lnr lnr-heart"></span>
                          <span class="lnr lnr-frame-expand"></span>
                        </p>
                      </div>
                    </div>
                    <h4><a href="#"> <?= $discountProduct[ 'nombreProducto' ] ?> </a></h4>
                    <p class="arrival-product-price line-through"
                      style="color: #ef4444;"
                    >$<?= $discountProduct[ 'precioProducto' ] ?></p>
                    <p class="arrival-product-price"
                      style="color: #0d9488;"
                    >$<?= $discountProduct[ 'precioProducto' ] - ( $discountProduct[ 'precioProducto' ] * $discountProduct[ 'percentage' ] / 100 ) ?></p>
                  </div>
                </div>
                <?php endforeach; ?>
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
                <div class="sofa-collection-txt">
                  <h2>unlimited sofa collection</h2>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                  </p>
                  <div class="sofa-collection-price">
                    <h4>strting from <span>$ 199</span></h4>
                  </div>
                  <button class="btn-cart welcome-add-cart sofa-collection-btn" onclick="window.location.href='#'">
                    view more
                  </button>
                </div>
              </div>	
            </div><!--/.sofa-collection-->
            <div class="sofa-collection collectionbg2">
              <div class="container">
                <div class="sofa-collection-txt">
                  <h2>unlimited dainning table collection</h2>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                  </p>
                  <div class="sofa-collection-price">
                    <h4>strting from <span>$ 299</span></h4>
                  </div>
                  <button class="btn-cart welcome-add-cart sofa-collection-btn" onclick="window.location.href='#'">
                    view more
                  </button>
                </div>
              </div>
            </div><!--/.sofa-collection-->
          </div><!--/.collection-carousel-->
        </section>
      </main>
    </div>
<script>
const sidebar = document.getElementById('sidebar-multi-level-sidebar');
const open = document.getElementById('open-sidebar');
const close = document.getElementById('close-sidebar');
const backdrop = document.createElement('div');
backdrop.classList.add('fixed', 'inset-0', 'bg-black', 'bg-opacity-50', 'transition-opacity', 'pointer-events-none', 'opacity-0', 'z-30');

open.addEventListener('click', () => {
  sidebar.classList.remove('-translate-x-full');
  sidebar.classList.add('translate-x-0');
  document.body.appendChild(backdrop);
  setTimeout(() => {
    backdrop.classList.add('opacity-100');
  }, 10);
});

close.addEventListener('click', () => {
  sidebar.classList.remove('translate-x-0');
  sidebar.classList.add('-translate-x-full');
  backdrop.classList.remove('opacity-100');
  setTimeout(() => {
    backdrop.remove();
  }, 300);
});

backdrop.addEventListener('click', () => {
  sidebar.classList.remove('translate-x-0');
  sidebar.classList.add('-translate-x-full');
  backdrop.classList.remove('opacity-100');
  setTimeout(() => {
    backdrop.remove();
  }, 300);
});


</script>
</body>
</html>
