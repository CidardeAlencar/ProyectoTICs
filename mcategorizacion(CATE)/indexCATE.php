<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "users_crud_php");

// Verificar la conexión
if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Variables con los datos del formulario
$nombreTrabajador = $_POST['nombre'];
$cargoDesempeno = $_POST['desempeno'];
$fechaContratacion = $_POST['contratacion'];
$antiguedad = $_POST['antiguedad'];
$correo = $_POST['correo'];
$funcionesA1 = $_POST['A1'];
$funcionesA2 = $_POST['A2'];
$funcionesA3 = $_POST['A3'];
$funcionesA4 = $_POST['A4'];
$conocimientosB1 = $_POST['B1'];
$conocimientosB2 = $_POST['B2'];
$conocimientosB3 = $_POST['B3'];
$conocimientosB4 = $_POST['B4'];
$supervisionC1 = $_POST['C1'];
$supervisionC2 = $_POST['C2'];
$supervisionC3 = $_POST['C3'];
$supervisionC4 = $_POST['C4'];
$desempenaD1 = $_POST['D1'];
$desempenaD2 = $_POST['D2'];
$desempenaD3 = $_POST['D3'];
$desempenaD4 = $_POST['D4'];
$reaccionaE1 = $_POST['E1'];
$reaccionaE2 = $_POST['E2'];
$reaccionaE3 = $_POST['E3'];
$reaccionaE4 = $_POST['E4'];
$consigueF1 = $_POST['F1'];
$consigueF2 = $_POST['F2'];
$consigueF3 = $_POST['F3'];
$consigueF4 = $_POST['F4'];
$manejarG1 = $_POST['G1'];
$manejarG2 = $_POST['G2'];
$manejarG3 = $_POST['G3'];
$manejarG4 = $_POST['G4'];
$estandaresH1 = $_POST['H1'];
$estandaresH2 = $_POST['H2'];
$estandaresH3 = $_POST['H3'];
$estandaresH4 = $_POST['H4'];
$equipoI1 = $_POST['I1'];
$equipoI2 = $_POST['I2'];
$equipoI3 = $_POST['I3'];
$equipoI4 = $_POST['I4'];
$ayudaJ1 = $_POST['J1'];
$ayudaJ2 = $_POST['J2'];
$ayudaJ3 = $_POST['J3'];
$ayudaJ4 = $_POST['J4'];
$personalK1 = $_POST['K1'];
$personalK2 = $_POST['K2'];
$personalK3 = $_POST['K3'];
$personalK4 = $_POST['K4'];
$reunionL1 = $_POST['L1'];
$reunionL2 = $_POST['L2'];
$reunionL3 = $_POST['L3'];
$reunionL4 = $_POST['L4'];
$ocasional = $_POST['total-suma'];
$mitad = $_POST['total-suma-id-2'];
$frecuente = $_POST['total-suma-id-3'];
$siempre = $_POST['total-suma-id-4'];

// Consulta de inserción
$sql = "INSERT INTO evaluacionDesempeno (
            nombreTrabajador, cargoDesempeno, fechaContratacion, antiguedad, correo,
            funcionesA1, funcionesA2, funcionesA3, funcionesA4,
            conocimientosB1, conocimientosB2, conocimientosB3, conocimientosB4,
            supervisionC1, supervisionC2, supervisionC3, supervisionC4,
            desempenaD1, desempenaD2, desempenaD3, desempenaD4,
            reaccionaE1, reaccionaE2, reaccionaE3, reaccionaE4,
            consigueF1, consigueF2, consigueF3, consigueF4,
            manejarG1, manejarG2, manejarG3, manejarG4,
            estandaresH1, estandaresH2, estandaresH3, estandaresH4,
            equipoI1, equipoI2, equipoI3, equipoI4,
            ayudaJ1, ayudaJ2, ayudaJ3, ayudaJ4,
            personalK1, personalK2, personalK3, personalK4,
            reunionL1, reunionL2, reunionL3, reunionL4,
            ocasional, mitad, frecuente, siempre
        ) 
        VALUES (
            '$nombreTrabajador', '$cargoDesempeno', '$fechaContratacion', '$antiguedad', '$correo',
            '$funcionesA1', '$funcionesA2', '$funcionesA3', '$funcionesA4',
            '$conocimientosB1', '$conocimientosB2', '$conocimientosB3', '$conocimientosB4',
            '$supervisionC1', '$supervisionC2', '$supervisionC3', '$supervisionC4',
            '$desempenaD1', '$desempenaD2', '$desempenaD3', '$desempenaD4',
            '$reaccionaE1', '$reaccionaE2', '$reaccionaE3', '$reaccionaE4',
            '$consigueF1', '$consigueF2', '$consigueF3', '$consigueF4',
            '$manejarG1', '$manejarG2', '$manejarG3', '$manejarG4',
            '$estandaresH1', '$estandaresH2', '$estandaresH3', '$estandaresH4',
            '$equipoI1', '$equipoI2', '$equipoI3', '$equipoI4',
            '$ayudaJ1', '$ayudaJ2', '$ayudaJ3', '$ayudaJ4',
            '$personalK1', '$personalK2', '$personalK3', '$personalK4',
            '$reunionL1', '$reunionL2', '$reunionL3', '$reunionL4',
            '$ocasional', '$mitad', '$frecuente', '$siempre'
        )";

// Ejecutar la consulta
if (mysqli_query($conexion, $sql)) {
    echo "Datos insertados correctamente.";
} else {
    echo "Error al insertar datos: " . mysqli_error($conexion);
}
?>
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
        <div>
            <nav>
                <ul>
                    <li><a href="buscar.php">Buscar</a></li>
                    <li><a href="editar.php">Editar</a></li>
                    <li><a href="eliminar.php">Eliminar</a></li>
                </ul>
            </nav>
        </div>

        <form id="payment-form" class="payment-form" method="POST">
            <div class="container">
                <div class="task">
                    <h2>Datos del Trabajador a Evaluar</h2>
                    <div>
                        <label style="font-size: 100%;" for="nombre">Nombre Completo </label>
                    </div>
                    <div>
                        <?php
                        $conection = mysqli_connect("localhost", "root", "", "users_crud_php");
                        $query_nombreCompleto = mysqli_query($conection, "SELECT * FROM user");
                        mysqli_close($conection);
                        $result_nombreCompleto = mysqli_num_rows($query_nombreCompleto);
                        ?>
                        <select name="nombre" id="nombre" style="width: 100%; height: 40px; font-size: 90%;" onchange="this.form.submit()">
                            <?php
                            if ($result_nombreCompleto > 0) {
                                while ($nombreCompleto = mysqli_fetch_array($query_nombreCompleto)) {
                            ?>
                                    <option value="<?php echo $nombreCompleto["id"]; ?>" <?php if ($_POST['nombre'] == $nombreCompleto["id"]) echo 'selected="selected"'; ?>><?php echo $nombreCompleto["nombre"] ?> <?php echo $nombreCompleto["apPAt"] ?> <?php echo $nombreCompleto["apMAt"] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label style="font-size: 100%;" for="desempeno">Cargo de desempeño </label>
                        <div>
                            <input style="width: 95%; height:25px; font-size: 90%" type="text" name="desempeno" placeholder="Cargo de desempeño">
                        </div>
                    </div>
                    <div>
                        <label style="font-size: 100%;" for="contratacion">Fecha de contratación </label>
                        <div>
                            <?php
                            // Verificar si se ha enviado el formulario y se ha seleccionado un nombre
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre'])) {
                                // Obtener el nombre seleccionado
                                $nombreSeleccionado = $_POST['nombre'];

                                // Realizar la consulta SQL para obtener la fecha de contratación del usuario seleccionado
                                $con = mysqli_connect("localhost", "root", "", "users_crud_php");
                                $query = mysqli_query($con, "SELECT fecha FROM user WHERE id = '$nombreSeleccionado'");

                                // Verificar si se encontró un resultado
                                if (mysqli_num_rows($query) > 0) {
                                    // Obtener la fecha de contratación
                                    $fechaContratacion = mysqli_fetch_assoc($query)['fecha'];
                                    // Mostrar la fecha de contratación en un campo de texto
                                    echo '<input style="width: 95%; height:25px; font-size: 90%" type="text" name="contratacion" id="contratacion" value="' . $fechaContratacion . '" placeholder="Fecha de contratación" readonly>';
                                } else {
                                    echo "Fecha de contratación no encontrada para el usuario seleccionado.";
                                }
                                // Cerrar la conexión a la base de datos
                                mysqli_close($con);
                            } else {
                                // Si no se ha seleccionado un nombre, mostrar un mensaje
                                echo "Seleccione un nombre para ver la fecha de contratación.";
                            }
                            ?>
                        </div>
                    </div>
                    <button type="submit" style="display:none;"></button><!-- Botón oculto para enviar el formulario automáticamente -->
                    <div>
                        <div>
                            <label style="font-size: 100%;" for="antiguedad">Antiguedad </label>
                        </div>
                        <div>
                            <input style="width: 95%; height:25px; font-size: 100%" type="number" name="antiguedad" id="antiguedad" placeholder="Antiguedad">
                        </div>
                    </div>
                    <div>
                        <label style="font-size: 100%;" for="correo">Correo </label>
                        <div>
                            <?php
                            // Verificar si se ha enviado el formulario y se ha seleccionado un nombre
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre'])) {
                                // Obtener el nombre seleccionado
                                $nombreSeleccionado = $_POST['nombre'];

                                // Realizar la consulta SQL para obtener la fecha de contratación del usuario seleccionado
                                $con = mysqli_connect("localhost", "root", "", "users_crud_php");
                                $query = mysqli_query($con, "SELECT correo FROM user WHERE id = '$nombreSeleccionado'");

                                // Verificar si se encontró un resultado
                                if (mysqli_num_rows($query) > 0) {
                                    // Obtener la fecha de contratación
                                    $correo = mysqli_fetch_assoc($query)['correo'];
                                    // Mostrar la fecha de contratación en un campo de texto
                                    echo '<input style="width: 95%; height:25px; font-size: 90%" type="text" name="correo" id="correo" value="' . $correo . '" placeholder="Correo" readonly>';
                                } else {
                                    echo "Fecha de contratación no encontrada para el usuario seleccionado.";
                                }
                                // Cerrar la conexión a la base de datos
                                mysqli_close($con);
                            } else {
                                // Si no se ha seleccionado un nombre, mostrar un mensaje
                                echo "Seleccione un nombre para ver la fecha de contratación.";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="payment-container">
                    <h2>Evaluación de Desempeño del Trabajador</h2>
                    <div class="form-container">
                        <div class="card-payment">
                            <div>
                                <table border="1">
                                    <tr>
                                        <th>Porcentajes %</th>
                                        <th>Ocasional 25%</th>
                                        <th>La mitad de tiempo 50%</th>
                                        <th>Frecuente 75%</th>
                                        <th>Siempre 100%</th>
                                    </tr>
                                </table>
                            </div>
                            <div>
                                <table border="1">

                                    <tr>
                                        <td style="text-align: center;" class="center-content; " colspan="5">Conocimiento Asociado al Cargo: habilidades y destrezas</td>

                                    </tr>
                                    <tr>
                                        <td>El trabajador entiende las funciones y responsabilidades</td>
                                        <td><input id="1" name="A1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="A2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="A3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="A4" type="number" min="1" max="100" placeholder="0"></td>
                                    </tr>
                                    <tr>
                                        <td>El trabjador posee los conocimientos y habilidades necesarias</td>
                                        <td><input id="1" name="B1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="B2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="B3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="B4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                </table>
                            </div>

                            <div>
                                <table border="1">
                                    <tr>
                                        <td style="text-align: center;" class="center-content; " colspan="5">Planificacion y Organización</td>

                                    </tr>
                                    <tr>
                                        <td>El trabajador requiere una supervisión mínima</td>
                                        <td><input id="1" name="C1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="C2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="C3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="C4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                    <tr>
                                        <td>El trabajador se desempeña de forma organizada</td>
                                        <td><input id="1" name="D1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="D2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="D3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="D4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                    <tr>
                                        <td>El trabjador reacciona rápidamente ante las dificultades</td>
                                        <td><input id="1" name="E1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="E2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="E3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="E4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="payment-container">
                    <h2>Evaluación de Desempeño del Trabajador</h2>
                    <div class="form-container">
                        <div class="card-payment">
                            <div>
                                <table border="1">
                                    <tr>
                                        <th>Porcentajes %</th>
                                        <th>Ocasional 25%</th>
                                        <th>La mitad de tiempo 50%</th>
                                        <th>Frecuente 75%</th>
                                        <th>Siempre 100%</th>
                                    </tr>
                                </table>
                            </div>
                            <div>
                                <table border="1">

                                    <tr>
                                        <td style="text-align: center;" class="center-content; " colspan="5">Productividad</td>

                                    </tr>
                                    <tr>
                                        <td>El trabajador consigue los objetivos</td>
                                        <td><input id="1" name="F1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="F2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="F3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="F4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                    <tr>
                                        <td>El trabajador puede manejar varias actividades a la vez</td>
                                        <td><input id="1" name="G1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="G2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="G3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="G4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                    <tr>
                                        <td>El trabajador consigue los estándares de productividad</td>
                                        <td><input id="1" name="H1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="H2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="H3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="H4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                </table>
                            </div>

                            <div>
                                <table border="1">
                                    <tr>
                                        <td style="text-align: center;" class="center-content; " colspan="5">Trabajo en Equipo</td>

                                    </tr>
                                    <tr>
                                        <td>El trabajador sabe trabajar en equipo</td>
                                        <td><input id="1" name="I1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="I2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="I3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="I4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                    <tr>
                                        <td>El trabajador ayuda a su equipo</td>
                                        <td><input id="1" name="J1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="J2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="J3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="J4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                    <tr>
                                        <td>El trabajador se desempeña bien con diferentes tipos de persona</td>
                                        <td><input id="1" name="K1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="K2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="K3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="K4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                    <tr>
                                        <td>El trabajador participa activamente en las reuniones de trabajo</td>
                                        <td><input id="1" name="L1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="L2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="L3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="L4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="task">
                    <h2>Evaluación General y Comentarios</h2>
                    <div>
                        <label for="ocasional">Total Ocasional 25% </label>
                        <div>
                            <input style="width: 95%; height:25px; font-size: 90%" type="text" name="total-suma" id="total-suma" placeholder="Porcentaje" readonly>
                        </div>
                    </div>
                    <div>
                        <label for="mitad">Total de la mitad del tiempo 50% </label>
                        <div>
                            <input style="width: 95%; height:25px; font-size: 90%" type="text" name="total-suma-id-2" id="total-suma-id-2" placeholder="Porcentaje" readonly>
                        </div>
                    </div>
                    <div>
                        <label style="font-size: 100%;" for="frecuente">Total Frecuente 75% </label>
                        <div>
                            <input style="width: 95%; height:25px; font-size: 90%" type="text" name="total-suma-id-3" id="total-suma-id-3" placeholder="Porcentaje" readonly>
                        </div>
                    </div>
                    <div>
                        <label style="font-size: 100%;" for="siempre">Total Siempre 100% </label>
                        <div>
                            <input style="width: 95%; height:25px; font-size: 90%" type="text" name="total-suma-id-4" id="total-suma-id-4" placeholder="Porcentaje" readonly>
                        </div>
                    </div>
                    <div class="signature-section">
                        <div class="signature-block">
                            <div class="signature-line"></div>
                            <p class="signature-label">Firma del Evaluado</p>
                        </div>
                        <div class="signature-block">
                            <div class="signature-line"></div>
                            <p class="signature-label">Firma del Evaluador</p>
                        </div>
                    </div>
                </div>
                <button class="confirm-button" type="submit" name="pago-form">Guardar</button>
        </form>

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
        color: #fff;
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