<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styleBUSQ.css">
    <title>Vista Usuario</title>
</head>
<body>
    <section>
        <!-- Selección de búsqueda -->
        <div class="busq_pro">
            <span>Buscar por: </span>
            <select id="searchType">
                <option value="nombre">Nombre</option>
                <option value="categoria">Categoría</option>
            </select>
            <input type="text" id="searchInput">
            <button type="button" class="btn-busq" onclick="search()">Buscar</button>
            <button type="button" class="btn-back"><a href="../index.php?mod=5">Volver</a></button>
        </div>
        <!-- Visualizar según: -->
        <div class="busq_btn">
            <button type="button" onclick="filterOffers()">Ver ofertas</button>
            <button type="button" onclick="filterBestSellers()">Productos más vendidos</button>
            <button id="faqBtn">FAQ's</button>
        </div>
    </section>

    <section id="resultsSection" class="result_sec">
        <!-- AQUI VAN LOS RESULTADOS DE LA BUSQUEDA -->
    </section>

    <!-- El modal -->
    <div id="faqModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Preguntas Frecuentes</h2>
            <br>
            <ol>
                <li>
                    <strong>¿Qué tipos de muebles ofrecen?</strong>
                    <p>Ofrecemos una amplia gama de muebles para el hogar, incluyendo mesas, sillas, camas, sofás, estanterías y mucho más.</p>
                </li>
                <li>
                    <strong>¿Realizan entregas a domicilio?</strong>
                    <p>Sí, realizamos entregas a domicilio en todo el país. Los costos y tiempos de entrega pueden variar según la ubicación.</p>
                </li>
                <li>
                    <strong>¿Cuánto tiempo tarda en llegar mi pedido?</strong>
                    <p>El tiempo de entrega depende de la ubicación y la disponibilidad del producto. En general, las entregas locales se realizan en un plazo de 3 a 5 días hábiles, mientras que las entregas nacionales pueden tardar de 7 a 10 días hábiles.</p>
                </li>
                <li>
                    <strong>¿Puedo rastrear mi pedido?</strong>
                    <p>Sí, una vez que tu pedido haya sido despachado, te enviaremos un número de seguimiento para que puedas rastrear el estado de tu envío en línea.</p>
                </li>
                <li>
                    <strong>¿Ofrecen servicios de ensamblaje de muebles?</strong>
                    <p>Sí, ofrecemos servicios de ensamblaje de muebles por un costo adicional. Puedes seleccionar esta opción durante el proceso de compra.</p>
                </li>
                <li>
                    <strong>¿Qué métodos de pago aceptan?</strong>
                    <p>Aceptamos varios métodos de pago, incluyendo tarjetas de crédito y débito (Visa, MasterCard), transferencias bancarias y pagos en efectivo en puntos autorizados.</p>
                </li>
                <li>
                    <strong>¿Tienen políticas de devolución?</strong>
                    <p>Sí, ofrecemos una política de devolución de 30 días. Si no estás satisfecho con tu compra, puedes devolver el producto en su estado original dentro de los 30 días posteriores a la entrega para un reembolso completo o cambio.</p>
                </li>
                <li>
                    <strong>¿Qué hago si mi pedido llega dañado?</strong>
                    <p>Si tu pedido llega dañado, por favor contáctanos inmediatamente con fotos del daño. Te ayudaremos a organizar un reemplazo o reembolso según sea necesario.</p>
                </li>
            </ol>
        </div>
    </div>

    <script>
        // Modal FAQ's
        var modal = document.getElementById("faqModal");
        var btn = document.getElementById("faqBtn");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        function search() {
            var searchType = document.getElementById("searchType").value;
            var searchInput = document.getElementById("searchInput").value;
            fetchResults(`searchType=${searchType}&searchInput=${searchInput}`);
        }
        function filterOffers() {
            fetchResults(`filter=offers`);
        }
        function filterBestSellers() {
            fetchResults(`filter=bestSellers`);
        }
        function fetchResults(params = '') {
            fetch(`fun_userBUSQ.php?${params}`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById("resultsSection").innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        }
        document.addEventListener("DOMContentLoaded", function() {
            fetchResults();
        });
    </script>
</body>
</html>
