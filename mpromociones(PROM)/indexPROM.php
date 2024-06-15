<?php
include('connection.php');

$j9kd_3kj = connection();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save-offer'])) {
    $t3a2_kj = $_POST['offer-select-1'];
    $p4lp_kj = $_POST['offer-select-2'];
    $d9ds_kj = $_POST['offer-input-1'];
    $f1j3_kj = $_POST['offer-date-1'];
    $f2j3_kj = $_POST['offer-date-2'];

    $s4d1_kj = "INSERT INTO descuentos (tipo, producto, descripcion, fecha_inicio, fecha_fin) 
                VALUES ('$t3a2_kj', '$p4lp_kj', '$d9ds_kj', '$f1j3_kj', '$f2j3_kj')";
    $q1r2_kj = mysqli_query($j9kd_3kj, $s4d1_kj);

    if ($q1r2_kj) {
        echo '<script>alert("Oferta guardada correctamente.");</script>';
    } else {
        echo '<script>alert("Error al guardar la oferta: ' . mysqli_error($j9kd_3kj) . '");</script>';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save-promo'])) {
    $t4b3_kj = $_POST['promo-select-1'];
    $d4cc_kj = $_POST['promo-input-1'];
    $f5f1_kj = $_POST['promo-date-1'];
    $f5f2_kj = $_POST['promo-date-2'];

    $s5f4_kj = "INSERT INTO descuentos (tipo, descripcion, fecha_inicio, fecha_fin) 
                    VALUES ('$t4b3_kj', '$d4cc_kj', '$f5f1_kj', '$f5f2_kj')";
    $q5r3_kj = mysqli_query($j9kd_3kj, $s5f4_kj);

    if ($q5r3_kj) {
        echo '<script>alert("Promoción guardada correctamente.");</script>';
    } else {
        echo '<script>alert("Error al guardar la promoción: ' . mysqli_error($j9kd_3kj) . '");</script>';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save-discount'])) {
    $t7a4_kj = $_POST['discount-select-1'];
    $p7lp_kj = $_POST['discount-select-2'];
    $d7ds_kj = $_POST['discount-input-1'];
    $f7j3_kj = $_POST['discount-date-1'];
    $f8j3_kj = $_POST['discount-date-2'];

    $s7d1_kj = "INSERT INTO descuentos (tipo, producto, descripcion, fecha_inicio, fecha_fin) 
                    VALUES ('$t7a4_kj', '$p7lp_kj', '$d7ds_kj', '$f7j3_kj', '$f8j3_kj')";
    $q7r2_kj = mysqli_query($j9kd_3kj, $s7d1_kj);

    if ($q7r2_kj) {
        echo '<script>alert("Descuento guardado correctamente.");</script>';
    } else {
        echo '<script>alert("Error al guardar el descuento: ' . mysqli_error($j9kd_3kj) . '");</script>';
    }
}

$s1l8_kj = "SELECT * FROM descuentos";
$r3k2_kj = mysqli_query($j9kd_3kj, $s1l8_kj);
$d8cu_kj = [];
while ($rw8k_kj = mysqli_fetch_assoc($r3k2_kj)) {
    $d8cu_kj[] = $rw8k_kj;
}
?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras</title>
    <link rel="stylesheet" href="mpromociones(PROM)\assets\styles\stylePROM.css">
</head>

<body>
    <div class="App">
        <h1 class="title-compras">OFERTAS/PROMOCION/DESCUENTOS</h1>

        <div class="container">
            <div class="taskcompra section" id="offer-section">
                <h2>Crear Oferta</h2>
                <div class="image-container">
                    <img src="mpromociones(PROM)\assets\images\oferta-image.png" alt="offer-picture">
                </div>
                <div class="input-group">
                    <label for="offer-select-1">Seleccionar Tipo Oferta</label>
                    <select id="offer-select-1">
                        <option value="oferta1">2x1</option>
                        <option value="oferta2">3x1</option>
                        <option value="oferta3">3x2</option>
                        <option value="oferta4">6x5</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="offer-select-2">Aplicable a Producto</label>
                    <select id="offer-select-2">
                        <option value="producto">Resfresco</option>
                        <option value="producto">Tomate</option>
                        <option value="producto">Chocolate</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="offer-input-1">Descripcion</label>
                    <input type="text" id="offer-input-1">
                </div>
                <div class="input-group">
                    <label for="offer-date-1">Desde</label>
                    <input type="date" id="offer-date-1">
                </div>
                <div class="input-group">Hasta</label>
                    <input type="date" id="offer-date-2">
                </div>
                <div class="button-container">
                    <button type="submit" class="save-button" name="save-offer">Guardar</button>
                </div>
            </div>


            <div class="taskcompra section" id="promo-section">
                <h2>Crear Promoción</h2>
                <div class="image-container">
                    <img src="mpromociones(PROM)\assets\images\promo-image.png" alt="promo-picture">
                </div>
                <div class="input-group">
                    <label for="promo-select-1">Seleccionar Promo</label>
                    <select id="promo-select-1">
                        <option value="promo1">Promo Fin de Año</option>
                        <option value="promo2">Promo Navideña</option>
                        <option value="promo3">Promo Fin de Año</option>
                        <option value="promo4">Promo Vuelta a Clases</option>
                        <option value="promo5">Promo Cumpleañera</option>
                        <option value="promo6">Promo Dia de Enamorados</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="promo-input-1">Descripción</label>
                    <input type="text" id="promo-input-1">
                </div>
                <div class="input-group">
                    <label for="promo-date-1">Fecha</label>
                    <input type="date" id="promo-date-1">
                </div>
                <div class="input-group">
                    <label for="promo-date-2">Fecha</label>
                    <input type="date" id="promo-date-2">
                </div>
                <div class="button-container">
                    <button type="submit" class="save-button" name="save-promo">Guardar</button>
                </div>
            </div>


            <div class="taskcompra section" id="discount-section">
                <h2>Crear Descuento</h2>
                <div class="image-container">
                    <img src="mpromociones(PROM)\assets\images\descuento-image.png" alt="desct-picture">
                </div>
                <div class="input-group">
                    <label for="discount-select-1">Seleccionar Descuento</label>
                    <select id="discount-select-1">
                        <option value="desct1">10% Descuento</option>
                        <option value="desct2">15% Descuento</option>
                        <option value="desct3">20% Descuento</option>
                        <option value="desct4">30% Descuento</option>
                        <option value="desct5">40% Descuento</option>
                        <option value="desct6">50% Descuento</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="discount-select-2">Aplicable a Producto</label>
                    <select id="discount-select-2">
                        <option value="producto">Descuento 1</option>
                        <option value="producto">Descuento 2</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="discount-input-1">Descripción</label>
                    <input type="text" id="discount-input-1">
                </div>
                <div class="input-group">
                    <label for="discount-date-1">Fecha</label>
                    <input type="date" id="discount-date-1">
                </div>
                <div class="input-group">
                    <label for="discount-date-2">Fecha</label>
                    <input type="date" id="discount-date-2">
                </div>
                <div class="button-container">
                    <button type="submit" class="save-button" name="save-desct">Guardar</button>
                </div>
            </div>
        </div>


        <div class="table-container">
        <h1 class="title-compras">TABLA DE VISUALIZACION</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Tipo</th>
                        <th>Producto</th>
                        <th>Descripción</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de fin</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($d8cu_kj as $p5ro_kj): ?>
                        <tr>
                            <td><?php echo $p5ro_kj['id']; ?></td>
                            <td><?php echo $p5ro_kj['tipo']; ?></td>
                            <td><?php echo $p5ro_kj['producto']; ?></td>
                            <td><?php echo $p5ro_kj['descripcion']; ?></td>
                            <td><?php echo $p5ro_kj['fecha_inicio']; ?></td>
                            <td><?php echo $p5ro_kj['fecha_fin']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    
        <script src="comprasPROM.js"></script>
    </div>
</body>

</html>
