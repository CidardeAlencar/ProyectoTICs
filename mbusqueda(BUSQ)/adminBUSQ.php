<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styleBUSQ.css">
    <title>Vista Administrador</title>
</head>
<body>
    <section>
        <div class="busq_pro">
            <span>Buscar por: </span>
            <select id="searchType">
                <option value="administrador">Administrador</option>
                <option value="ci">CI</option>
                <option value="cargo">Cargo/rol</option>
                <option value="activos">Activos</option>
                <option value="inactivos">Inactivos</option>
            </select>
            <input type="text" id="searchInput">
            <button type="button" class="btn-busq" onclick="search()">Buscar</button>
            <button type="button" class="btn-back"><a href="../index.php?mod=5">Volver</a></button>
        </div>
    </section>

    <section id="resultsSection" class="result_adm">
        <!-- AQUI VA LA TABLA CON LOS DATOS DE LOS ADMINISTRADORES -->
    </section>

    <script>
        function search() {
            var searchType = document.getElementById("searchType").value;
            var searchInput = document.getElementById("searchInput").value;

            if (searchType === "activos" || searchType === "inactivos") {
                fetchResults(`searchType=${searchType}`);
            } else {
                fetchResults(`searchType=${searchType}&searchInput=${searchInput}`);
            }
        }
        function fetchResults(params = '') {
            fetch(`fun_adminBUSQ.php?${params}`)
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
