<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/obf_styleBUSQ.css">
    <title>obf_Vista Usuario</title>
</head>
<body>
    <section>
        <!-- obf_Selección de búsqueda -->
        <div class="obf_busq_pro">
            <span>obf_Buscar por: </span>
            <select id="obf_searchType">
                <option value="obf_nombre">obf_Nombre</option>
                <option value="obf_categoria">obf_Categoría</option>
            </select>
            <input type="text" id="obf_searchInput">
            <button type="button" class="obf_btn-busq" onclick="obf_search()">obf_Buscar</button>
            <button type="button" class="obf_btn-back"><a href="../index.php?mod=5">obf_Volver</a></button>
        </div>
        <!-- obf_Visualizar según: -->
        <div class="obf_busq_btn">
            <button type="button" onclick="obf_filterOffers()">obf_Ver ofertas</button>
            <button type="button" onclick="obf_filterBestSellers()">obf_Productos más vendidos</button>
            <button id="obf_faqBtn">obf_FAQ's</button>
        </div>
    </section>

    <section id="obf_resultsSection" class="obf_result_sec">
        <!-- obf_AQUI VAN LOS RESULTADOS DE LA BUSQUEDA -->
    </section>

    <!-- obf_El modal -->
    <div id="obf_faqModal" class="obf_modal">
        <div class="obf_modal-content">
            <span class="obf_close">&times;</span>
            <h2>obf_Preguntas Frecuentes</h2>
            <br>
            <ol>
                <li>
                    <strong>obf_¿Qué tipos de muebles ofrecen?</strong>
                    <p>obf_Ofrecemos una amplia gama de muebles para el hogar, incluyendo mesas, sillas, camas, sofás, estanterías y mucho más.</p>
                </li>
                <li>
                    <strong>obf_¿Realizan entregas a domicilio?</strong>
                    <p>obf_Sí, realizamos entregas a domicilio en todo el país. Los costos y tiempos de entrega pueden variar según la ubicación.</p>
                </li>
                <li>
                    <strong>obf_¿Cuánto tiempo tarda en llegar mi pedido?</strong>
                    <p>obf_El tiempo de entrega depende de la ubicación y la disponibilidad del producto. En general, las entregas locales se realizan en un plazo de 3 a 5 días hábiles, mientras que las entregas nacionales pueden tardar de 7 a 10 días hábiles.</p>
                </li>
                <li>
                    <strong>obf_¿Puedo rastrear mi pedido?</strong>
                    <p>obf_Sí, una vez que tu pedido haya sido despachado, te enviaremos un número de seguimiento para que puedas rastrear el estado de tu envío en línea.</p>
                </li>
                <li>
                    <strong>obf_¿Ofrecen servicios de ensamblaje de muebles?</strong>
                    <p>obf_Sí, ofrecemos servicios de ensamblaje de muebles por un costo adicional. Puedes seleccionar esta opción durante el proceso de compra.</p>
                </li>
                <li>
                    <strong>obf_¿Qué métodos de pago aceptan?</strong>
                    <p>obf_Aceptamos varios métodos de pago, incluyendo tarjetas de crédito y débito (Visa, MasterCard), transferencias bancarias y pagos en efectivo en puntos autorizados.</p>
                </li>
                <li>
                    <strong>obf_¿Tienen políticas de devolución?</strong>
                    <p>obf_Sí, ofrecemos una política de devolución de 30 días. Si no estás satisfecho con tu compra, puedes devolver el producto en su estado original dentro de los 30 días posteriores a la entrega para un reembolso completo o cambio.</p>
                </li>
                <li>
                    <strong>obf_¿Qué hago si mi pedido llega dañado?</strong>
                    <p>obf_Si tu pedido llega dañado, por favor contáctanos inmediatamente con fotos del daño. Te ayudaremos a organizar un reemplazo o reembolso según sea necesario.</p>
                </li>
            </ol>
        </div>
    </div>

    <script>
        // obf_Modal FAQ's
        var obf_modal = document.getElementById("obf_faqModal");
        var obf_btn = document.getElementById("obf_faqBtn");
        var obf_span = document.getElementsByClassName("obf_close")[0];
        obf_btn.onclick = function() {
            obf_modal.style.display = "block";
        }
        obf_span.onclick = function() {
            obf_modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == obf_modal) {
                obf_modal.style.display = "none";
            }
        }
        function obf_search() {
            var obf_searchType = document.getElementById("obf_searchType").value;
            var obf_searchInput = document.getElementById("obf_searchInput").value;
            obf_fetchResults(`searchType=${obf_searchType}&searchInput=${obf_searchInput}`);
        }
        function obf_filterOffers() {
            obf_fetchResults(`filter=offers`);
        }
        function obf_filterBestSellers() {
            obf_fetchResults(`filter=bestSellers`);
        }
        function obf_fetchResults(obf_params = '') {
            fetch(`fun_userBUSQ.php?${obf_params}`)
                .then(obf_response => obf_response.text())
                .then(obf_data => {
                    document.getElementById("obf_resultsSection").innerHTML = obf_data;
                })
                .catch(obf_error => console.error('Error:', obf_error));
        }
        document.addEventListener("DOMContentLoaded", function() {
            obf_fetchResults();
        });
    </script>
</body>
</html>
