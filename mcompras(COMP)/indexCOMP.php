<!-- ALEJANDRO JAVIER REYES GUILLEN A24516-X -->
<?php
include('connection.php');

$con = connection();

// Procesar la información del cliente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cliente-form'])) {
    $nombreCliente = $_POST['name'];
    $emailCliente = $_POST['email'];

    $sqlCliente = "INSERT INTO clientes (nombre, email) VALUES ('$nombreCliente', '$emailCliente')";
    $queryCliente = mysqli_query($con, $sqlCliente);

    if ($queryCliente) {
        echo '<script>alert("Cliente guardado correctamente.");</script>';
    } else {
        echo '<script>alert("Error al guardar el cliente: ' . mysqli_error($con) . '");</script>';
    }
}

// Procesar la información de pago
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pago-form'])) {
    $numeroTarjeta = $_POST['cardNumber'];
    $nombreTitular = $_POST['cardHolderName'];
    $fechaVencimiento = $_POST['expiryMonth'];
    $metodoPago = "Tarjeta";

    $numeroTarjetaCifrado = hash('sha256', $numeroTarjeta);

    $sqlPago = "INSERT INTO compra (numero_tarjeta, nombre_titular, fecha_vencimiento, pago, metodo_pago) 
                VALUES ('$numeroTarjetaCifrado', '$nombreTitular', '$fechaVencimiento', true, '$metodoPago')";
    $queryPago = mysqli_query($con, $sqlPago);

    if ($queryPago) {
        echo '<script>alert("Pago realizado correctamente.");</script>';
    } else {
        echo '<script>alert("Error al procesar el pago: ' . mysqli_error($con) . '");</script>';
    }
}

$sql = "SELECT nombre, contacto, telefono FROM proveedores LIMIT 1";
$query = mysqli_query($con, $sql);
$supplier = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras</title>
    <link rel="stylesheet" href="mcompras(COMP)/assets/styles/styleCOMP.css">
</head>

<body>
    <div class="App">
        <h1 class="title-compras">COMPRAS</h1>
        <div class="container">
            <div class="taskcompra">
                <img src="mcompras(COMP)/assets/images/carrito.png" alt="Carrito de compras">
                <h2>Orden de Compra</h2>
                <ul id="cart-items">
                    <li>Producto 1 - $100</li>
                    <li>Producto 2 - $150</li>
                </ul>
                <button class="confirm-button" id="confirm-order-btn">Confirmar Orden</button>
            </div>

            <div class="task">
                <h2>Información del Proveedor</h2>
                <form id="supplier-form">
                    <div>
                        <label>Nombre del Proveedor</label>
                        <input type="text" name="name" id="supplier-name" value="<?php echo htmlspecialchars($supplier['nombre']); ?>" disabled>
                    </div>
                    <div>
                        <label>Contacto del Proveedor</label>
                        <input type="text" name="contact" id="supplier-contact" value="<?php echo htmlspecialchars($supplier['contacto']); ?>" disabled>
                    </div>
                    <div>
                        <label>Teléfono</label>
                        <input type="text" name="telefono" id="supplier-telefono" value="<?php echo htmlspecialchars($supplier['telefono']); ?>" disabled>
                    </div>
                </form>
                <h2>Información del Cliente</h2>
                <form id="customer-form" method="post">
                    <div>
                        <label>Nombre del Cliente</label>
                        <input type="text" name="name" id="customer-name">
                    </div>
                    <div>
                        <label>Email del Cliente</label>
                        <input type="email" name="email" id="customer-email">
                    </div>
                    <button class="confirm-button" type="submit" name="cliente-form">Guardar Cliente</button>
                </form>
            </div>

            <div class="payment-container">
                <h2>Detalles de Pago</h2>
                <form id="payment-form" class="payment-form" method="post">
                    <div class="form-container">
                        <div class="card-payment">
                            <h3>Información de la Tarjeta</h3>
                            <div class="expiry-date">
                                <div class="form-group">
                                    <label>Número de Tarjeta</label>
                                    <input type="text" name="cardNumber" id="card-number">
                                </div>
                                <div class="form-group">
                                    <label>Nombre del Titular</label>
                                    <input type="text" name="cardHolderName" id="card-holder-name">
                                </div>
                            </div>
                            <div class="expiry-date">
                                <div class="form-group">
                                    <label>Fecha de Vencimiento</label>
                                    <input type="date" name="expiryMonth" id="expiry-month">
                                </div>
                            </div>
                        </div>
                        <div class="qr-code">
                            <img src="mcompras(COMP)/assets/images/pagos.png" alt="Métodos de pago">
                            <img src="mcompras(COMP)/assets/images/qe.png" alt="Código QR">
                        </div>
                    </div>
                    <button class="confirm-button" type="submit" name="pago-form">Confirmar y Pagar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="./comprasCOMP.js"></script>
</body>

</html>