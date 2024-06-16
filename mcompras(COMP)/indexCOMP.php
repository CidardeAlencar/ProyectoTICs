<?php
include('connection.php');
$con = connection();

//!DESCOMENTAR CUANDO SE HAYAN CREADO LAS COLECCIONES EN FIREBASE
//?Funcionamiento con Firebase
include('firebase.php');
$database = getFirebaseDatabase();


// Procesar la información del cliente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cliente-form'])) {
    $nombreCliente = $_POST['name'];
    $emailCliente = $_POST['email'];

    $sqlCliente = "INSERT INTO clientes (nombre, email) VALUES ('$nombreCliente', '$emailCliente')";
    $queryCliente = mysqli_query($con, $sqlCliente);

    //!DESCOMENTAR CUANDO SE HAYAN CREADO LAS COLECCIONES EN FIREBASE
    //?Funcionamiento con Firebase
    $newClient = $database->getReference('clientes')->push([
        'name' => $nombreCliente,
        'email' => $emailCliente
    ]);

    if ($queryCliente) {
        echo '<script>document.addEventListener("DOMContentLoaded", function() { showModal("Cliente guardado correctamente ✅"); });</script>';
    } else {
        echo '<script>document.addEventListener("DOMContentLoaded", function() { showModal("Error al guardar el cliente ❌ : ' . mysqli_error($con) . '"); });</script>';
    }
}

// Procesar la información de pago
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pago-form'])) {
    $numeroTarjeta = $_POST['cardNumber'];
    $nombreTitular = $_POST['cardHolderName'];
    $fechaVencimiento = $_POST['expiryMonth'];
    $metodoPago = "Tarjeta";
    //CIFRADO PARA EL NUMERO DE TARJETA
    $numeroTarjetaCifrado = hash('sha256', $numeroTarjeta);

    $sqlPago = "INSERT INTO compra (numero_tarjeta, nombre_titular, fecha_vencimiento, pago, metodo_pago) 
                VALUES ('$numeroTarjetaCifrado', '$nombreTitular', '$fechaVencimiento', true, '$metodoPago')";
    $queryPago = mysqli_query($con, $sqlPago);

    //!DESCOMENTAR CUANDO SE HAYAN CREADO LAS COLECCIONES EN FIREBASE
    //?Funcionamiento con Firebase
    $newUser = $database->getReference('compra')->push([
        'cardNumber' => $numeroTarjeta,
        'cardHolderName' => $nombreTitular,
        'expiryMonth' => $fechaVencimiento,
        'pago' => true,
        'metodo_pago' => $metodoPago
    ]);

    if ($queryPago) {
        echo '<script>document.addEventListener("DOMContentLoaded", function() { showModal("Pago realizado correctamente ✅"); });</script>';
    } else {
        echo '<script>document.addEventListener("DOMContentLoaded", function() { showModal("Error al procesar el pago ❌ : ' . mysqli_error($con) . '"); });</script>';
    }
}

// Seleccionar el proveedor de los productos
$sql = "SELECT nombre, contacto, telefono FROM proveedores ORDER BY RAND() LIMIT 1";
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
    <style>
        /* Estilos para el modal */
        .modal {
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

        .modal-content {
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

        .modal-content p {
            font-size: 18px;
            color: #333;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .modal-content .success-message {
            color: #4CAF50;
            font-weight: bold;
        }

        .modal-content .error-message {
            color: #f44336;
            font-weight: bold;
        }

        .close-button {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close-button:hover,
        .close-button:focus {
            color: #333;
            text-decoration: none;
        }

        /* Estilos para los elementos dentro de cart-items */
        #cart-items {
            list-style-type: none;
            padding: 0;
            margin-top: 10px;
        }

        #cart-items li {
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 5px;
            border-radius: 5px;
        }

        #cart-items li:first-child {
            margin-top: 0;
        }
    </style>
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
                    <li>Producto 3 - $200</li>
                    <li>Producto 4 - $100</li>
                </ul>
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
                        <input type="text" name="name" id="customer-name" required>
                    </div>
                    <div>
                        <label>Email del Cliente</label>
                        <input type="email" name="email" id="customer-email" required>
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
                                    <input type="text" name="cardNumber" id="card-number" required>
                                </div>
                                <div class="form-group">
                                    <label>Nombre del Titular</label>
                                    <input type="text" name="cardHolderName" id="card-holder-name" required>
                                </div>
                            </div>
                            <div class="expiry-date">
                                <div class="form-group">
                                    <label>Fecha de Vencimiento</label>
                                    <input type="date" name="expiryMonth" id="expiry-month" required>
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

    <!-- Modal -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <span class="close-button" onclick="closeModal()">&times;</span>
            <p id="modal-message"></p>
        </div>
    </div>

    <script src="./comprasCOMP.js"></script>
    <script>
        function showModal(message) {
            document.getElementById('modal-message').innerText = message;
            document.getElementById('successModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('successModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('successModal')) {
                closeModal();
            }
        }
    </script>
</body>

</html>