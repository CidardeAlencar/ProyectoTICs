<?php
include 'connection.php';

$consulta = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $consulta);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fc;
        }

        .navbarr {
            background-color: transparent;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbarr .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbarr-brand {
            color: #fff;
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
        }

        .navbarr-nav {
            display: flex;
            gap: 10px;
        }

        .navbarr-nav .nav-item {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            background-color: #e99c2e;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbarr-nav .nav-item:hover {
            background-color: #e68a0d;
            color: #fff;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .product-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: calc(25% - 20px);
            box-sizing: border-box;
            text-align: center;
        }

        .product-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .product-card h3 {
            color: #333;
            font-size: 18px;
            margin: 10px 0;
        }

        .product-card p {
            color: #666;
            font-size: 14px;
            margin: 5px 0;
        }

        .product-card .price {
            color: #e99c2e;
            font-size: 16px;
            margin: 10px 0;
        }

        @media (max-width: 768px) {
            .product-card {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 480px) {
            .product-card {
                width: calc(100% - 20px);
            }
        }

        .promo-image {
            width: 100%;
            max-width: 1200px;
            height: 200px;
            object-fit: cover;
            margin: 20px auto;
            display: block;
        }

        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 90%;
            max-width: 800px;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #666;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea,
        input[type="file"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        button {
            padding: 10px 20px;
            background-color: #e99c2e;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #e68a0d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #e99c2e;
            color: #fff;
        }

        td img {
            width: 100px;
            height: auto;
            border-radius: 5px;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <nav class="navbarr">
        <div class="container">
            <div class="navbarr-nav">
                <a href="indexPROD.php" class="nav-item">Ver Productos</a>
                <a href="#" class="nav-item" id="listarProductoBtn">Listar Productos</a>
                <a href="#" class="nav-item" id="crearProductoBtn">Crear Nuevo Producto</a>
                <a href="#" class="nav-item" id="editarProductoBtn">Editar Producto</a>
            </div>
        </div>
    </nav>

    <main>
        <img src="mproductos(PROD)/assets/images/producto2.gif" alt="Promoción!" class="promo-image">

        <div class="container">
            <h2>Nuestros Productos</h2>
            <div class="products">
                <?php
                if ($resultado) {
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $idProducto = $row['id_producto'];
                        $nombre = $row['nombre'];
                        $descripcion = $row['descripcion'];
                        $precio = $row['precio'];
                        $imagen = $row['imagen_principal'];

                        echo "<div class='product-card'>
                                <img src='mproductos(PROD)/assets/images/$imagen' alt='$nombre'>
                                <h3>$nombre</h3>
                                <p>$descripcion</p>
                                <p class='price'>$$precio</p>
                                <button class='edit-btn' data-id='$idProducto' data-nombre='$nombre' data-descripcion='$descripcion' data-precio='$precio' data-categoria='{$row['categoria']}' data-estado='{$row['estado']}' data-imagen='$imagen'>Editar</button>
                            </div>";
                    }
                } else {
                    echo "<p>No hay productos registrados</p>";
                }
                ?>
            </div>
        </div>
    </main>

    <div id="crearProductoModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Crear Nuevo Producto</h2>
            <form action="mproductos(PROD)/crear_producto.php" method="post" enctype="multipart/form-data">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" required></textarea>

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" step="0.01" required>

                <label for="categoria">Categoría:</label>
                <input type="text" id="categoria" name="categoria" required>

                <label for="estado">Estado:</label>
                <select id="estado" name="estado" required>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>

                <label for="imagen">Imagen del Producto:</label>
                <input type="file" id="imagen" name="imagen" required>

                <button type="submit">Crear Producto</button>
            </form>
        </div>
    </div>

    <div id="listarProductoModal" class="modal">
        <div class="modal-content">
            <span class="close-listar">&times;</span>
            <h2>Lista de Productos</h2>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Categoría</th>
                        <th>Estado</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $consulta = "SELECT * FROM productos";
                    $resultado = mysqli_query($conexion, $consulta);
                    if ($resultado) {
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            $idProducto = $row['id_producto'];
                            $nombre = $row['nombre'];
                            $descripcion = $row['descripcion'];
                            $precio = $row['precio'];
                            $categoria = $row['categoria'];
                            $estado = $row['estado'];
                            $imagen = $row['imagen_principal'];

                            echo "<tr>
                                    <td>$idProducto</td>
                                    <td>$nombre</td>
                                    <td>$descripcion</td>
                                    <td>$precio</td>
                                    <td>$categoria</td>
                                    <td>$estado</td>
                                    <td><img src='mproductos(PROD)/assets/images/$imagen' alt='$nombre'></td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No hay productos registrados</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="editarProductoModal" class="modal">
        <div class="modal-content">
            <span class="close-editar">&times;</span>
            <h2>Editar Producto</h2>
            <form action="mproductos(PROD)/editar_producto.php" method="post" enctype="multipart/form-data">
                <label for="producto_id">Seleccionar Producto:</label>
                <select id="producto_id" name="producto_id" required>
                    <option value="">Seleccione un producto</option>
                    <?php
                    $productos = mysqli_query($conexion, "SELECT id_producto, nombre FROM productos");
                    while ($producto = mysqli_fetch_assoc($productos)) {
                        echo "<option value='{$producto['id_producto']}'>{$producto['nombre']}</option>";
                    }
                    ?>
                </select>

                <label for="edit_nombre">Nombre del Producto:</label>
                <input type="text" id="edit_nombre" name="nombre" required>

                <label for="edit_descripcion">Descripción:</label>
                <textarea id="edit_descripcion" name="descripcion" rows="4" required></textarea>

                <label for="edit_precio">Precio:</label>
                <input type="number" id="edit_precio" name="precio" step="0.01" required>

                <label for="edit_categoria">Categoría:</label>
                <input type="text" id="edit_categoria" name="categoria" required>

                <label for="edit_estado">Estado:</label>
                <select id="edit_estado" name="estado" required>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>

                <label for="edit_imagen">Imagen del Producto (dejar en blanco para no cambiar):</label>
                <input type="file" id="edit_imagen" name="imagen">

                <button type="submit">Actualizar Producto</button>
            </form>
        </div>
    </div>

    <script>
        var crearModal = document.getElementById("crearProductoModal");
        var listarModal = document.getElementById("listarProductoModal");
        var editarModal = document.getElementById("editarProductoModal");
        var btnCrear = document.getElementById("crearProductoBtn");
        var btnListar = document.getElementById("listarProductoBtn");
        var btnEditar = document.getElementById("editarProductoBtn");
        var spanCerrarCrear = document.getElementsByClassName("close")[0];
        var spanCerrarListar = document.getElementsByClassName("close-listar")[0];
        var spanCerrarEditar = document.getElementsByClassName("close-editar")[0];

        btnCrear.onclick = function() {
            crearModal.style.display = "block";
        }

        btnListar.onclick = function() {
            listarModal.style.display = "block";
        }

        btnEditar.onclick = function() {
            editarModal.style.display = "block";
        }

        spanCerrarCrear.onclick = function() {
            crearModal.style.display = "none";
        }

        spanCerrarListar.onclick = function() {
            listarModal.style.display = "none";
        }

        spanCerrarEditar.onclick = function() {
            editarModal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == crearModal) {
                crearModal.style.display = "none";
            } else if (event.target == listarModal) {
                listarModal.style.display = "none";
            } else if (event.target == editarModal) {
                editarModal.style.display = "none";
            }
        }

        document.getElementById('producto_id').addEventListener('change', function() {
            var productoId = this.value;
            if (productoId) {
                fetch(`mproductos(PROD)/get_producto.php?id=${productoId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('edit_nombre').value = data.nombre;
                        document.getElementById('edit_descripcion').value = data.descripcion;
                        document.getElementById('edit_precio').value = data.precio;
                        document.getElementById('edit_categoria').value = data.categoria;
                        document.getElementById('edit_estado').value = data.estado;
                    });
            } else {
                document.getElementById('edit_nombre').value = '';
                document.getElementById('edit_descripcion').value = '';
                document.getElementById('edit_precio').value = '';
                document.getElementById('edit_categoria').value = '';
                document.getElementById('edit_estado').value = '';
            }
        });
    </script>
</body>
</html>
