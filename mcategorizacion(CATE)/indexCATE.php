<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación</title>
    <link rel="stylesheet" href="../mcategorizacion(CATE)/assets/styles/styleCATE.css">
</head>
<body>
    <div class="obf_App">
        <h1 class="obf_title-compras">EVALUACIÓN</h1>
        <h1 class="obf_title-compras">DE DESEMPEÑO</h1>
        <div class="obf_container">
            <div class="obf_task">
                <div>
                    <nav>
                        <ul>
                            <li><a href="mcategorizacion(CATE)/guardarCATE.php">Añadir</a></li>
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
    .obf_signature-section {
        display: flex;
        justify-content: space-around;
        width: 80%;
        margin: 20px auto;
        background: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .obf_signature-block {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 45%;
        padding: 20px;
    }

    .obf_signature-line {
        width: 100%;
        height: 2px;
        background-color: #000;
        margin-bottom: 10px;
    }

    .obf_signature-label {
        margin-top: 10px;
        font-size: 1em;
        text-align: center;
    }

    @media (max-width: 600px) {
        .obf_signature-section {
            flex-direction: column;
            width: 90%;
        }

        .obf_signature-block {
            width: 87%;
            margin-bottom: 20px;
        }
    }

    input[type="number"] {
        width: 100%;
        box-sizing: border-box;
        padding: 5px;
        font-size: 1em;
        border: 1px solid #ccc;
        border-radius: 4px;
        text-align: center;
        background-color: #f9f9f9;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    input[type="number"]:focus {
        border-color: #66afe9;
        background-color: #fff;
    }

    @media (max-width: 768px) {
        th, td {
            font-size: 0.9em;
        }

        input[type="number"] {
            font-size: 0.9em;
        }
    }

    @media (max-width: 480px) {
        th, td {
            font-size: 0.8em;
        }

        input[type="number"] {
            font-size: 0.8em;
        }
    }

    .obf_title-compras {
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

    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    @media screen and (max-width: 600px) {
        table, thead, tbody, th, td, tr {
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
    function obf_sumarInputs() {
        const obf_inputs = document.querySelectorAll('input[id="1"]');
        let obf_total = 0;

        obf_inputs.forEach(obf_input => {
            const obf_value = parseInt(obf_input.value) || 0;
            obf_total += obf_value;
        });

        const obf_resultado1 = obf_total / 12;
        const obf_resultado2 = obf_resultado1 * 0.25;
        document.getElementById('obf_total-suma').value = obf_resultado2.toFixed(2);
    }

    const obf_inputs = document.querySelectorAll('input[id="1"]');
    obf_inputs.forEach(obf_input => {
        obf_input.addEventListener('input', obf_sumarInputs);
    });

    obf_sumarInputs();
</script>
<script>
    function obf_sumarInputsId2() {
        const obf_inputs = document.querySelectorAll('input[id="2"]');
        let obf_total = 0;

        obf_inputs.forEach(obf_input => {
            const obf_value = parseInt(obf_input.value) || 0;
            obf_total += obf_value;
        });

        const obf_resultado1 = obf_total / 12;
        const obf_resultado2 = obf_resultado1 * 0.5;
        document.getElementById('obf_total-suma-id-2').value = obf_resultado2.toFixed(2);
    }

    const obf_inputsId2 = document.querySelectorAll('input[id="2"]');
    obf_inputsId2.forEach(obf_input => {
        obf_input.addEventListener('input', obf_sumarInputsId2);
    });

    obf_sumarInputsId2();
</script>
<script>
    function obf_sumarInputsId3() {
        const obf_inputs = document.querySelectorAll('input[id="3"]');
        let obf_total = 0;

        obf_inputs.forEach(obf_input => {
            const obf_value = parseInt(obf_input.value) || 0;
            obf_total += obf_value;
        });

        const obf_resultado1 = obf_total / 12;
        const obf_resultado2 = obf_resultado1 * 0.75;
        document.getElementById('obf_total-suma-id-3').value = obf_resultado2.toFixed(2);
    }

    const obf_inputsId3 = document.querySelectorAll('input[id="3"]');
    obf_inputsId3.forEach(obf_input => {
        obf_input.addEventListener('input', obf_sumarInputsId3);
    });

    obf_sumarInputsId3();
</script>
<script>
    function obf_sumarInputsId4() {
        const obf_inputs = document.querySelectorAll('input[id="4"]');
        let obf_total = 0;

        obf_inputs.forEach(obf_input => {
            const obf_value = parseInt(obf_input.value) || 0;
            obf_total += obf_value;
        });

        const obf_resultado1 = obf_total / 12;
        const obf_resultado2 = obf_resultado1 * 1;
        document.getElementById('obf_total-suma-id-4').value = obf_resultado2.toFixed(2);
    }

    const obf_inputsId4 = document.querySelectorAll('input[id="4"]');
    obf_inputsId4.forEach(obf_input => {
        obf_input.addEventListener('input', obf_sumarInputsId4);
    });

    obf_sumarInputsId4();
</script>
