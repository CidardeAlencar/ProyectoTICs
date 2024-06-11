<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación</title>
    <link rel="stylesheet" href="../mcategorizacion(CATE)/assets/styles/styleCATE.css">
</head>

<body>
    <div class="App">
        <h1 class="title-compras">EVALUACIÓN</h1>
        <h1 class="title-compras">DE DESEMPEÑO</h1>
            <div class="container">
                <div class="task">
                    <div>
                        <nav>
                            <ul>
                                <li><a href="guardarCATE.php">Añadir</a></li>
                                <li><a href="buscarCATE.php">Buscar</a></li>
                                <li><a href="editar.php">Editar</a></li>
                                <li><a href="eliminar.php">Estado</a></li>
                            </ul>
                        </nav>
                    </div>

                </div>

            </div>

</body>

</html>
<style>
    .signature-section {
        display: flex;
        justify-content: space-around;
        width: 80%;
        margin: 20px auto;
        background: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .signature-block {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 45%;
        padding: 20px;
    }

    .signature-line {
        width: 100%;
        height: 2px;
        background-color: #000;
        margin-bottom: 10px;
    }

    .signature-label {
        margin-top: 10px;
        font-size: 1em;
        text-align: center;
    }

    @media (max-width: 600px) {
        .signature-section {
            flex-direction: column;
            width: 90%;
        }

        .signature-block {
            width: 87%;
            margin-bottom: 20px;
        }
    }

    input[type="number"] {
        width: 100%;
        /* Asegura que el input tome todo el espacio de la celda */
        box-sizing: border-box;
        /* Incluye el padding en el tamaño total */
        padding: 5px;
        font-size: 1em;
        border: 1px solid #ccc;
        border-radius: 4px;
        text-align: center;
        /* Centra el texto en el input */
        /* Estilo adicional para apariencia */
        background-color: #f9f9f9;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    input[type="number"]:focus {
        border-color: #66afe9;
        /* Color del borde cuando está enfocado */
        background-color: #fff;
        /* Fondo blanco al enfocarse */
    }

    @media (max-width: 768px) {

        th,
        td {
            font-size: 0.9em;
            /* Reduce el tamaño de la fuente en dispositivos más pequeños */
        }

        input[type="number"] {
            font-size: 0.9em;
            /* Ajusta el tamaño del input */
        }
    }

    /* Si necesitas reducir aún más el tamaño de la fuente en pantallas más pequeñas */
    @media (max-width: 480px) {

        th,
        td {
            font-size: 0.8em;
            /* Aún más pequeño para pantallas muy pequeñas */
        }

        input[type="number"] {
            font-size: 0.8em;
            /* Ajusta el tamaño del input */
        }
    }

    .title-compras {
        text-align: center;
        margin-top: 30px;
    }

    nav {
        background-color: #e99c2e;
        color: #fff;
        padding: 10px 0;
        text-align: center;
        width: 75%;
        margin: auto;
    }

    nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    nav ul li {
        display: inline-block;
        margin-right: 20px;
    }

    nav ul li a {
        color: #1b1a1a;
        text-decoration: none;
        padding: 10px 15px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    nav ul li a:hover {
        background-color: #555;
    }

    @media screen and (max-width: 600px) {
        nav ul li {
            display: block;
            margin: 10px 0;
        }
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    @media screen and (max-width: 600px) {

        table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block;
        }

        th {
            display: none;
        }

        td {
            border: none;
            border-bottom: 1px solid #ddd;
            position: relative;
            padding-left: 50%;
        }

        td:before {
            position: absolute;
            top: 6px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
        }

        td:nth-of-type(1):before {
            content: "Porcentajes %";
        }

        td:nth-of-type(2):before {
            content: "Ocasional 25%";
        }

        td:nth-of-type(3):before {
            content: "La mitad de tiempo 50%";
        }

        td:nth-of-type(4):before {
            content: "Frecuente 75%";
        }

        td:nth-of-type(5):before {
            content: "Siempre 100%";
        }
    }
</style>
<script>
    // Función para sumar los valores de los inputs con el mismo ID
    function sumarInputs() {
        const inputs = document.querySelectorAll('input[id="1"]');
        let total = 0;

        inputs.forEach(input => {
            const value = parseInt(input.value) || 0;
            total += value;
        });

        // Dividir el total entre 13
        const resultado1 = total / 12;

        const resultado2 = resultado1 * 0.25;
        // Actualizar el input de total con el resultado
        document.getElementById('total-suma').value = resultado2.toFixed(2); // Redondeo a 2 decimales
    }

    // Añadir evento de cambio a los inputs para recalcular la suma
    const inputs = document.querySelectorAll('input[id="1"]');
    inputs.forEach(input => {
        input.addEventListener('input', sumarInputs);
    });

    // Llama a la función una vez para asegurarte de que el valor inicial se muestra correctamente
    sumarInputs();
</script>
<script>
    // Función para sumar los valores de los inputs con el mismo ID
    function sumarInputsId2() {
        const inputs = document.querySelectorAll('input[id="2"]');
        let total = 0;

        inputs.forEach(input => {
            const value = parseInt(input.value) || 0;
            total += value;
        });

        // Dividir el total entre 13
        const resultado1 = total / 12;

        const resultado2 = resultado1 * 0.5;
        // Actualizar el input de total con el resultado
        document.getElementById('total-suma-id-2').value = resultado2.toFixed(2); // Redondeo a 2 decimales
    }

    // Añadir evento de cambio a los inputs para recalcular la suma
    const inputsId2 = document.querySelectorAll('input[id="2"]');
    inputsId2.forEach(input => {
        input.addEventListener('input', sumarInputsId2);
    });

    // Llama a la función una vez para asegurarte de que el valor inicial se muestra correctamente
    sumarInputsId2();
</script>
<script>
    function sumarInputsId3() {
        const inputs = document.querySelectorAll('input[id="3"]');
        let total = 0;

        inputs.forEach(input => {
            const value = parseInt(input.value) || 0;
            total += value;
        });

        // Dividir el total entre 13
        const resultado1 = total / 12;

        const resultado2 = resultado1 * 0.75;
        // Actualizar el input de total con el resultado
        document.getElementById('total-suma-id-3').value = resultado2.toFixed(2); // Redondeo a 2 decimales
    }

    // Añadir evento de cambio a los inputs para recalcular la suma
    const inputsId3 = document.querySelectorAll('input[id="3"]');
    inputsId3.forEach(input => {
        input.addEventListener('input', sumarInputsId3);
    });

    // Llama a la función una vez para asegurarte de que el valor inicial se muestra correctamente
    sumarInputsId3();
</script>
<script>
    function sumarInputsId4() {
        const inputs = document.querySelectorAll('input[id="4"]');
        let total = 0;

        inputs.forEach(input => {
            const value = parseInt(input.value) || 0;
            total += value;
        });

        // Dividir el total entre 13
        const resultado1 = total / 12;

        const resultado2 = resultado1 * 1;
        // Actualizar el input de total con el resultado
        document.getElementById('total-suma-id-4').value = resultado2.toFixed(2); // Redondeo a 2 decimales
    }

    // Añadir evento de cambio a los inputs para recalcular la suma
    const inputsId4 = document.querySelectorAll('input[id="4"]');
    inputsId4.forEach(input => {
        input.addEventListener('input', sumarInputsId4);
    });

    // Llama a la función una vez para asegurarte de que el valor inicial se muestra correctamente
    sumarInputsId4();
</script>