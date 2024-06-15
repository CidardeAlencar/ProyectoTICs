<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styleBUSQ.css">
    <title>Vista Admin</title>
</head>
<body>
    <section>
        <!-- Selección de búsqueda -->
        <div class="busq_pro">
            <span>Buscar por: </span>
            <select id="searchType">
                <option value="ci">CI</option>
                <option value="rol">Rol</option>
                <option value="status">Estado</option>
            </select>
            <input type="text" id="searchInput">
            <button type="button" class="btn-busq" onclick="search()">Buscar</button>
            <button type="button" class="btn-back"><a href="../index.php?mod=6">Volver</a></button>
        </div>
    </section>

    <section id="resultsSection" class="result_sec">
        <!-- AQUI VAN LOS RESULTADOS DE LA BUSQUEDA -->
    </section>

    <script>
        // JavaScript para realizar la búsqueda
        var obf_faqBtn = document.getElementById("faqBtn");
        var obf_faqModal = document.getElementById("faqModal");
        var obf_closeBtn = document.getElementsByClassName("close")[0];

        obf_faqBtn.onclick = function() {
            obf_faqModal.style.display = "block";
        }

        obf_closeBtn.onclick = function() {
            obf_faqModal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == obf_faqModal) {
                obf_faqModal.style.display = "none";
            }
        }

        function obf_search() {
            // Aquí iría el código para realizar la búsqueda
        }
    </script>
</body>
</html>
