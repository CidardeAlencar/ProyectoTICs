<?php

require_once '../connection.php';

$connect = connection();

$search = $_GET[ 'search' ] ?? '';

$discountProductsStmt = $connect->prepare( "
  SELECT 
    descuentos.*,
    productos.nombre AS producto,
    createdByUser.name AS createdBy,
    updatedByUser.name AS updatedBy
  FROM descuentos
    JOIN productos ON productos.id_producto = descuentos.productId
    JOIN users AS createdByUser ON createdByUser.id = descuentos.createdBy
    JOIN users AS updatedByUser ON updatedByUser.id = descuentos.updatedBy
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
  <title> Editar Descuento 😿 </title>
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
                href="mdescuentos(DESC)/viewDESC.php"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
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
                href="mdescuentos(DESC)/insertDESC.php"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
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
                href="mdescuentos(DESC)/updateDESC.php"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
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
                href="mdescuentos(DESC)/deleteDESC.php"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
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
        class="w-full g-gray-100"
        style="height: calc(100vh - 50px)"
      >
        <div class="w-full bg-gray-800 text-white flex items-center justify-between px-4 py-2">
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
        <h1 class="text-4xl font-bold text-center mt-8"> Escoge un descuento para editar 😿 </h1>
        <div class="mt-8">
          <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">
            <div class="mx-auto px-4 lg:px-12">
              <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                  <div class="w-full md:w-1/2">
                    <form class="flex items-center" method="GET" action="deleteDESC.php">
                      <label for="simple-search" class="sr-only"> Buscar </label>
                      <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                          <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                          </svg>
                        </div>
                        <input
                          type="text"
                          id="simple-search"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Buscar"
                          name="search"
                          value="<?= $search ?>"
                        />
                        <button type="submit" class="sr-only"> Buscar </button>
                      </div>
                    </form>
                  </div>
                  
                </div>
                <div class="overflow-x-auto">
                  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                        <th scope="col" class="px-4 py-4"> N° </th>
                        <th scope="col" class="px-4 py-3"> Descuento </th>
                        <th scope="col" class="px-4 py-3"> Descripción </th>
                        <th scope="col" class="px-4 py-3"> Producto </th>
                        <th scope="col" class="px-4 py-3"> Porcentaje </th>
                        <th scope="col" class="px-4 py-3"> Fecha Inicio </th>
                        <th scope="col" class="px-4 py-3"> Fecha Fin </th>
                        <th scope="col" class="px-4 py-3"> Creado En </th>
                        <th scope="col" class="px-4 py-3"> Creado Por </th>
                        <th scope="col" class="px-4 py-3"> Actualizado En </th>
                        <th scope="col" class="px-4 py-3"> Actualizado Por </th>
                        <th scope="col" class="px-4 py-3"> Estado </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach ( $discountProducts as $discountProduct ): ?>
                      <tr class="border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 relative">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $i++ ?></th>
                        <td class="px-4 py-3">
                          <?= $discountProduct[ 'name' ] ?>
                          <!-- TODO: Cambiar direccion segun su proyecto -->
                          <a
                            href="mdescuentos(DESC)/editDESC.php?id=<?= $discountProduct[ 'id' ] ?>"
                            class="absolute inset-0 hover:bg-gray-100 hover:bg-opacity-50 dark:hover:bg-gray-800 dark:hover:bg-opacity-50" aria-hidden="true"
                          ></a>
                        </td>
                        <td class="px-4 py-3"><?= $discountProduct[ 'description' ] ?></td>
                        <td class="px-4 py-3"><?= $discountProduct[ 'producto' ] ?></td>
                        <td class="px-4 py-3"><?= $discountProduct[ 'percentage' ] ?>%</td>
                        <td class="px-4 py-3"><?= $discountProduct[ 'fechaInicio' ] ?></td>
                        <td class="px-4 py-3"><?= $discountProduct[ 'fechaFin' ] ?></td>
                        <td class="px-4 py-3"><?= $discountProduct[ 'createdAt' ] ?></td>
                        <td class="px-4 py-3"><?= $discountProduct[ 'createdBy' ] ?></td>
                        <td class="px-4 py-3"><?= $discountProduct[ 'updatedAt' ] ?></td>
                        <td class="px-4 py-3"><?= $discountProduct[ 'updatedBy' ] ?></td>
                        <td class="px-4 py-3">
                          <span class="px-2 py-1 font-semibold leading-tight <?= $discountProduct[ 'status' ] === 1 ? 'text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100' : 'text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100' ?> rounded-full dark:text-green-100">
                            <?= $discountProduct[ 'status' ] === 1 ? 'Activo' : 'Inactivo' ?>
                          </span>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                      <?php if ( empty( $discountProducts ) ): ?>
                      <tr>
                        <td colspan="11" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400"> No hay descuentos </td>
                      </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </section>
        </div>
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


const dropdowns = document.querySelectorAll('[data-dropdown-toggle]');
dropdowns.forEach(dropdown => {
  const dropdownMenu = document.getElementById(dropdown.dataset.dropdownToggle);
  dropdown.addEventListener('click', () => {
    dropdownMenu.classList.toggle('hidden');
  });
});
</script>
</body>
</html>
