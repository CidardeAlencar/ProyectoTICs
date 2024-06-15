<?php
include('connection.php');

$obf_con = connection();

// Procesar la información del cliente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cliente-form'])) {
    $obf_nombreCliente = $_POST['name'];
    $obf_emailCliente = $_POST['email'];

    $obf_sqlCliente = "INSERT INTO clientes (nombre, email) VALUES ('$obf_nombreCliente', '$obf_emailCliente')";
    $obf_queryCliente = mysqli_query($obf_con, $obf_sqlCliente);

    if ($obf_queryCliente) {
        echo '<script>document.addEventListener("DOMContentLoaded", function() { obf_showModal("Cliente guardado correctamente ✅"); });</script>';
    } else {
        echo '<script>document.addEventListener("DOMContentLoaded", function() { obf_showModal("Error al guardar el cliente ❌ : ' . mysqli_error($obf_con) . '"); });</script>';
    }
}

// Procesar la información de pago
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pago-form'])) {
    $obf_numeroTarjeta = $_POST['cardNumber'];
    $obf_nombreTitular = $_POST['cardHolderName'];
    $obf_fechaVencimiento = $_POST['expiryMonth'];
    $obf_metodoPago = "Tarjeta";
    //CIFRADO PARA EL NUMERO DE TARJETA
    $obf_numeroTarjetaCifrado = hash('sha256', $obf_numeroTarjeta);

    $obf_sqlPago = "INSERT INTO compra (numero_tarjeta, nombre_titular, fecha_vencimiento, pago, metodo_pago) 
                VALUES ('$obf_numeroTarjetaCifrado', '$obf_nombreTitular', '$obf_fechaVencimiento', true, '$obf_metodoPago')";
    $obf_queryPago = mysqli_query($obf_con, $obf_sqlPago);

    if ($obf_queryPago) {
        echo '<script>document.addEventListener("DOMContentLoaded", function() { obf_showModal("Pago realizado correctamente ✅"); });</script>';
    } else {
        echo '<script>document.addEventListener("DOMContentLoaded", function() { obf_showModal("Error al procesar el pago ❌ : ' . mysqli_error($obf_con) . '"); });</script>';
    }
}

// Seleccionar el proveedor de los productos
$obf_sql = "SELECT nombre, contacto, telefono FROM proveedores ORDER BY RAND() LIMIT 1";
$obf_query = mysqli_query($obf_con, $obf_sql);
$obf_supplier = mysqli_fetch_assoc($obf_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras</title>
    <link rel="stylesheet" href="mcompras(COMP)/assets/styles/styleCOMP.css">
    <style>
        /* Estilos para el modal */
        .obf_modal {
            display: none;
            position: fixed;
            z-index: 5;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .obf_modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .obf_modal-content p {
            font-size: 18px;
            color: #333;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .obf_modal-content .obf_success-message {
            color: #4CAF50;
            font-weight: bold;
        }

        .obf_modal-content .obf_error-message {
            color: #f44336;
            font-weight: bold;
        }

        .obf_close-button {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .obf_close-button:hover,
        .obf_close-button:focus {
            color: #333;
            text-decoration: none;
        }

        /* Estilos para los elementos dentro de cart-items */
        #obf_cart-items {
            list-style-type: none;
            padding: 0;
            margin-top: 10px;
        }

        #obf_cart-items li {
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 5px;
            border-radius: 5px;
        }

        #obf_cart-items li:first-child {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="obf_App">
        <h1 class="obf_title-compras">COMPRAS</h1>
        <div class="obf_container">
            <div class="obf_taskcompra">
                <img src="mcompras(COMP)/assets/images/carrito.png" alt="Carrito de compras">
                <h2>Orden de Compra</h2>
                <ul id="obf_cart-items">
                    <li>Producto 1 - $100</li>
                    <li>Producto 2 - $150</li>
                    <li>Producto 3 - $200</li>
                    <li>Producto 4 - $100</li>
                </ul>
            </div>

            <div class="obf_task">
                <h2>Información del Proveedor</h2>
                <form id="obf_supplier-form">
                    <div>
                        <label>Nombre del Proveedor</label>
                        <input type="text" name="name" id="obf_supplier-name" value="<?php echo htmlspecialchars($obf_supplier['nombre']); ?>" disabled>
                    </div>
                    <div>
                        <label>Contacto del Proveedor</label>
                        <input type="text" name="contact" id="obf_supplier-contact" value="<?php echo htmlspecialchars($obf_supplier['contacto']); ?>" disabled>
                    </div>
                    <div>
                        <label>Teléfono</label>
                        <input type="text" name="telefono" id="obf_supplier-telefono" value="<?php echo htmlspecialchars($obf_supplier['telefono']); ?>" disabled>
                    </div>
                </form>
                <h2>Información del Cliente</h2>
                <form id="obf_customer-form" method="post">
                    <div>
                        <label>Nombre del Cliente</label>
                        <input type="text" name="name" id="obf_customer-name" required>
                    </div>
                    <div>
                        <label>Email del Cliente</label>
                        <input type="email" name="email" id="obf_customer-email" required>
                    </div>
                    <button class="obf_confirm-button" type="submit" name="cliente-form">Guardar Cliente</button>
                </form>
            </div>

            <div class="obf_payment-container">
                <h2>Detalles de Pago</h2>
                <form id="obf_payment-form" class="obf_payment-form" method="post">
                    <div class="obf_form-container">
                        <div class="obf_card-payment">
                            <h3>Información de la Tarjeta</h3>
                            <div class="obf_expiry-date">
                                <div class="obf_form-group">
                                    <label>Número de Tarjeta</label>
                                    <input type="text" name="cardNumber" id="obf_card-number" required>
                                </div>
                                <div class="obf_form-group">
                                    <label>Nombre del Titular</label>
                                    <input type="text" name="cardHolderName" id="obf_card-holder-name" required>
                                </div>
                            </div>
                            <div class="obf_expiry-date">
                                <div class="obf_form-group">
                                    <label>Fecha de Vencimiento</label>
                                    <input type="date" name="expiryMonth" id="obf_expiry-month" required>
                                </div>
                            </div>
                        </div>
                        <div class="obf_qr-code">
                            <img src="mcompras(COMP)/assets/images/pagos.png" alt="Métodos de pago">
                            <img src="mcompras(COMP)/assets/images/qe.png" alt="Código QR">
                        </div>
                    </div>
                    <button class="obf_confirm-button" type="submit" name="pago-form">Confirmar y Pagar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="obf_successModal" class="obf_modal">
        <div class="obf_modal-content">
            <span class="obf_close-button" onclick="obf_closeModal()">&times;</span>
            <p id="obf_modal-message"></p>
        </div>
    </div>

    <script src="./comprasCOMP.js"></script>
    <script>
        function obf_showModal(obf_message) {
            document.getElementById('obf_modal-message').innerText = obf_message;
            document.getElementById('obf_successModal').style.display = 'block';
        }

        function obf_closeModal() {
            document.getElementById('obf_successModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('obf_successModal')) {
                obf_closeModal();
            }
        }
    </script>
</body>
</html>
