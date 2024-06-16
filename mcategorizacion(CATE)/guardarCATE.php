<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "users_crud_php");



// Verificar la conexión
if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Variables inicializadas vacías para evitar errores
$nombreTrabajador = '';
$fechaContratacion = '';
$correo = '';

// Variable para almacenar el nombre seleccionado
$nombreSeleccionado = '';

// Procesar solicitud POST para obtener fecha de contratación y correo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre'])) {
    $nombreSeleccionado = $_POST['nombre'];

    // Consulta preparada para obtener datos del trabajador seleccionado
    $query = mysqli_prepare($conexion, "SELECT fecha, correo FROM user WHERE nombre = ?");
    mysqli_stmt_bind_param($query, "s", $nombreSeleccionado);
    mysqli_stmt_execute($query);
    mysqli_stmt_store_result($query);

    // Verificar si se encontró un resultado
    if (mysqli_stmt_num_rows($query) > 0) {
        mysqli_stmt_bind_result($query, $fecha, $correo);
        mysqli_stmt_fetch($query);
        $fechaContratacion = $fecha;
    }

    // Cerrar la consulta preparada
    mysqli_stmt_close($query);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviar']) && $_POST['enviar'] == "evaluacion") {
    // Recopilar datos del formulario
    $nombreTrabajador = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $fechaContratacion = isset($_POST['contratacion']) ? $_POST['contratacion'] : '';
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $cargoDesempeno = isset($_POST['desempeno']) ? $_POST['desempeno'] : '';
    $antiguedad = isset($_POST['antiguedad']) ? $_POST['antiguedad'] : '';
    $funcionesA1 = isset($_POST['A1']) ? $_POST['A1'] : '';
    $funcionesA2 = isset($_POST['A2']) ? $_POST['A2'] : '';
    $funcionesA3 = isset($_POST['A3']) ? $_POST['A3'] : '';
    $funcionesA4 = isset($_POST['A4']) ? $_POST['A4'] : '';
    $conocimientosB1 = isset($_POST['B1']) ? $_POST['B1'] : '';
    $conocimientosB2 = isset($_POST['B2']) ? $_POST['B2'] : '';
    $conocimientosB3 = isset($_POST['B3']) ? $_POST['B3'] : '';
    $conocimientosB4 = isset($_POST['B4']) ? $_POST['B4'] : '';
    $supervisionC1 = isset($_POST['C1']) ? $_POST['C1'] : '';
    $supervisionC2 = isset($_POST['C2']) ? $_POST['C2'] : '';
    $supervisionC3 = isset($_POST['C3']) ? $_POST['C3'] : '';
    $supervisionC4 = isset($_POST['C4']) ? $_POST['C4'] : '';
    $desempenaD1 = isset($_POST['D1']) ? $_POST['D1'] : '';
    $desempenaD2 = isset($_POST['D2']) ? $_POST['D2'] : '';
    $desempenaD3 = isset($_POST['D3']) ? $_POST['D3'] : '';
    $desempenaD4 = isset($_POST['D4']) ? $_POST['D4'] : '';
    $reaccionaE1 = isset($_POST['E1']) ? $_POST['E1'] : '';
    $reaccionaE2 = isset($_POST['E2']) ? $_POST['E2'] : '';
    $reaccionaE3 = isset($_POST['E3']) ? $_POST['E3'] : '';
    $reaccionaE4 = isset($_POST['E4']) ? $_POST['E4'] : '';
    $consigueF1 = isset($_POST['F1']) ? $_POST['F1'] : '';
    $consigueF2 = isset($_POST['F2']) ? $_POST['F2'] : '';
    $consigueF3 = isset($_POST['F3']) ? $_POST['F3'] : '';
    $consigueF4 = isset($_POST['F4']) ? $_POST['F4'] : '';
    $manejarG1 = isset($_POST['G1']) ? $_POST['G1'] : '';
    $manejarG2 = isset($_POST['G2']) ? $_POST['G2'] : '';
    $manejarG3 = isset($_POST['G3']) ? $_POST['G3'] : '';
    $manejarG4 = isset($_POST['G4']) ? $_POST['G4'] : '';
    $estandaresH1 = isset($_POST['H1']) ? $_POST['H1'] : '';
    $estandaresH2 = isset($_POST['H2']) ? $_POST['H2'] : '';
    $estandaresH3 = isset($_POST['H3']) ? $_POST['H3'] : '';
    $estandaresH4 = isset($_POST['H4']) ? $_POST['H4'] : '';
    $equipoI1 = isset($_POST['I1']) ? $_POST['I1'] : '';
    $equipoI2 = isset($_POST['I2']) ? $_POST['I2'] : '';
    $equipoI3 = isset($_POST['I3']) ? $_POST['I3'] : '';
    $equipoI4 = isset($_POST['I4']) ? $_POST['I4'] : '';
    $ayudaJ1 = isset($_POST['J1']) ? $_POST['J1'] : '';
    $ayudaJ2 = isset($_POST['J2']) ? $_POST['J2'] : '';
    $ayudaJ3 = isset($_POST['J3']) ? $_POST['J3'] : '';
    $ayudaJ4 = isset($_POST['J4']) ? $_POST['J4'] : '';
    $personalK1 = isset($_POST['K1']) ? $_POST['K1'] : '';
    $personalK2 = isset($_POST['K2']) ? $_POST['K2'] : '';
    $personalK3 = isset($_POST['K3']) ? $_POST['K3'] : '';
    $personalK4 = isset($_POST['K4']) ? $_POST['K4'] : '';
    $reunionL1 = isset($_POST['L1']) ? $_POST['L1'] : '';
    $reunionL2 = isset($_POST['L2']) ? $_POST['L2'] : '';
    $reunionL3 = isset($_POST['L3']) ? $_POST['L3'] : '';
    $reunionL4 = isset($_POST['L4']) ? $_POST['L4'] : '';
    $ocasional = isset($_POST['total-suma']) ? $_POST['total-suma'] : '';
    $mitad = isset($_POST['total-suma-id-2']) ? $_POST['total-suma-id-2'] : '';
    $frecuente = isset($_POST['total-suma-id-3']) ? $_POST['total-suma-id-3'] : '';
    $siempre = isset($_POST['total-suma-id-4']) ? $_POST['total-suma-id-4'] : '';
    $estado = 1;


    // Construir la consulta SQL para insertar los datos en la tabla correspondiente

    $sql = "INSERT INTO evaluaciondesempeno (
        nombreTrabajador, 
        fechaContratacion, 
        correo,
        cargoDesempeno,
        antiguedad,
        funcionesA1,
        funcionesA2,
        funcionesA3,
        funcionesA4,
        conocimientosB1,
        conocimientosB2,
        conocimientosB3,
        conocimientosB4,
        supervisionC1,
        supervisionC2,
        supervisionC3,
        supervisionC4,
        desempenaD1,
        desempenaD2,
        desempenaD3,
        desempenaD4,
        reaccionaE1,
        reaccionaE2,
        reaccionaE3,
        reaccionaE4,
        consigueF1,
        consigueF2,
        consigueF3,
        consigueF4,
        manejarG1,
        manejarG2,
        manejarG3,
        manejarG4,
        estandaresH1,
        estandaresH2,
        estandaresH3,
        estandaresH4,
        equipoI1,
        equipoI2,
        equipoI3,
        equipoI4,
        ayudaJ1,
        ayudaJ2,
        ayudaJ3,
        ayudaJ4,
        personalK1,
        personalK2,
        personalK3,
        personalK4,
        reunionL1,
        reunionL2,
        reunionL3,
        reunionL4,
        ocasional,
        mitad,
        frecuente,
        siempre, 
        estado
    ) VALUES (
        '$nombreTrabajador', 
        '$fechaContratacion', 
        '$correo',
        '$cargoDesempeno',
        '$antiguedad',
        '$funcionesA1',
        '$funcionesA2',
        '$funcionesA3',
        '$funcionesA4',
        '$conocimientosB1',
        '$conocimientosB2',
        '$conocimientosB3',
        '$conocimientosB4',
        '$supervisionC1',
        '$supervisionC2',
        '$supervisionC3',
        '$supervisionC4',
        '$desempenaD1',
        '$desempenaD2',
        '$desempenaD3',
        '$desempenaD4',
        '$reaccionaE1',
        '$reaccionaE2',
        '$reaccionaE3',
        '$reaccionaE4',
        '$consigueF1',
        '$consigueF2',
        '$consigueF3',
        '$consigueF4',
        '$manejarG1',
        '$manejarG2',
        '$manejarG3',
        '$manejarG4',
        '$estandaresH1',
        '$estandaresH2',
        '$estandaresH3',
        '$estandaresH4',
        '$equipoI1',
        '$equipoI2',
        '$equipoI3',
        '$equipoI4',
        '$ayudaJ1',
        '$ayudaJ2',
        '$ayudaJ3',
        '$ayudaJ4',
        '$personalK1',
        '$personalK2',
        '$personalK3',
        '$personalK4',
        '$reunionL1',
        '$reunionL2',
        '$reunionL3',
        '$reunionL4',
        '$ocasional',
        '$mitad',
        '$frecuente',
        '$siempre',
        '$estado'
    )";

    // Ejecutar la consulta SQL
    if (mysqli_query($conexion, $sql)) {
        header("Location: guardarCATE.php");
        exit();
    } else {
        echo "Error al insertar datos: " . mysqli_error($conexion);
    }
}

// Cerrar la conexión
mysqli_close($conexion);
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


        <form id="payment-form" class="payment-form" method="POST">
            <div class="container">
                <div class="task">
                    <h2>Datos del Trabajador a Evaluar</h2>
                    <div>
                        <label style="font-size: 100%; " for="nombre">Nombre Completo </label>
                    </div>
                    <div>
                        <select style="width: 100%;height: 40px;" name="nombre" id="nombre" onchange="this.form.submit()">
                            <option value="">Seleccione un nombre</option>
                            <?php
                            // Imprimir la lista de nombres obtenidos previamente
                            $con = mysqli_connect("localhost", "root", "", "users_crud_php");
                            $result = mysqli_query($con, "SELECT nombre FROM user");
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Verificar si el nombre está seleccionado
                                $selected = (isset($nombreSeleccionado) && $nombreSeleccionado == $row['nombre']) ? "selected" : "";
                                // Crear la opción con el nombre como valor
                                echo "<option value='" . htmlspecialchars($row['nombre'], ENT_QUOTES, 'UTF-8') . "' $selected>" . htmlspecialchars($row['nombre'], ENT_QUOTES, 'UTF-8') . "</option>";
                            }
                            mysqli_close($con);
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
                            <input type="text" name="contratacion" id="contratacion" value="<?php echo $fechaContratacion; ?>" readonly>
                        </div>
                    </div>
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
                            <input type="text" name="correo" id="correo" value="<?php echo $correo; ?>" readonly>
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
                                        <td style="text-align: center;padding-left: 0%; background-color: #e99c2e; color: white;" class="center-content; " colspan="5">Conocimiento Asociado al Cargo: habilidades y destrezas</td>

                                    </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador entiende las funciones y responsabilidades</td>
                                        <td><input id="1" name="A1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="2" name="A2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="3" name="A3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="4" name="A4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabjador posee los conocimientos y habilidades necesarias</td>
                                        <td><input id="1" name="B1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="2" name="B2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="3" name="B3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="4" name="B4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td </tr>
                                </table>
                            </div>

                            <div>
                                <table border="1">
                                    <tr>
                                        <td style="text-align: center; padding-left: 0%; background-color: #e99c2e; color: white;" class="center-content; " colspan="5">Planificacion y Organización</td>

                                    </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador requiere una supervisión mínima</td>
                                        <td><input id="1" name="C1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="2" name="C2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="3" name="C3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="4" name="C4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador se desempeña de forma organizada</td>
                                        <td><input id="1" name="D1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="2" name="D2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="3" name="D3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="4" name="D4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador reacciona rápidamente ante las dificultades</td>
                                        <td><input id="1" name="E1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="2" name="E2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="3" name="E3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="4" name="E4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td </tr>
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
                                        <td style="text-align: center; padding-left: 0%; background-color: #e99c2e; color: white;" class="center-content; " colspan="5">Productividad</td>

                                    </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador consigue los objetivos</td>
                                        <td><input id="1" name="F1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="2" name="F2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="3" name="F3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="4" name="F4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador puede manejar varias actividades a la vez</td>
                                        <td><input id="1" name="G1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="2" name="G2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="3" name="G3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="4" name="G4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador consigue los estándares de productividad</td>
                                        <td><input id="1" name="H1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="2" name="H2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="3" name="H3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="4" name="H4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td </tr>
                                </table>
                            </div>

                            <div>
                                <table border="1">
                                    <tr>
                                        <td style="text-align: center; padding-left: 0%; background-color: #e99c2e; color: white;" class="center-content; " colspan="5">Trabajo en Equipo</td>

                                    </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador sabe trabajar en equipo</td>
                                        <td><input id="1" name="I1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="2" name="I2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="3" name="I3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="4" name="I4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador ayuda a su equipo</td>
                                        <td><input id="1" name="J1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="2" name="J2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="3" name="J3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="4" name="J4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador se desempeña bien con diferentes tipos de persona</td>
                                        <td><input id="1" name="K1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="2" name="K2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="3" name="K3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="4" name="K4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador participa activamente en las reuniones de trabajo</td>
                                        <td><input id="1" name="L1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="2" name="L2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="3" name="L3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td>
                                        <td><input id="4" name="L4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)"></td </tr>
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
                    <div class="action-buttons">
                        <button type="submit" name="enviar" value="evaluacion" class="btn">Guardar</button>
                        <button type="button" class="btn back-btn" onclick="window.location.href='indexCATE.php'">Atrás</button>
                        <button style="background-color: #e99c2e; height: 30px;" id="scrollToTopBtn" class="scroll-to-top-btn" title="Ir arriba">↑</button>
                    </div>
                </div>

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
            border-bottom: 1px solid #e99c2e;
            position: relative;
            padding-left: 60%;

        }

        td uno {
            padding-left: 98%;
        }

        td:before {
            position: absolute;
            top: 30%;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
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


    /* Action buttons styling */
    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 20px;
        /* Espacio entre los botones */
        margin-top: 20px;
    }

    button.btn {
        background-color: #e99c2e;
        color: #fff;
        font-size: 1.2em;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    button.btn:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(233, 156, 46, 0.5);
    }

    button.btn:hover {
        background-color: #d68b28;
        transform: translateY(-2px);
    }

    button.btn:active {
        background-color: #b37324;
        transform: translateY(1px);
    }

    /* Arrow animation on click */
    button.btn::after {
        content: "↑";
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        opacity: 0;
        transition: opacity 0.2s ease, top 0.2s ease;
    }

    button.btn:active::after {
        top: -10px;
        opacity: 1;
    }

    /* Back button specific styles */
    button.back-btn {
        background-color: #666666;
    }

    button.back-btn:hover {
        background-color: #2a2f35;
    }

    button.btn::after {
        content: "↑";
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        opacity: 0;
        transition: opacity 0.2s ease, top 0.2s ease;
        background-color: #e99c2e;
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
<script>
    // Mostrar/Ocultar el botón al hacer scroll
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        var scrollToTopBtn = document.getElementById("scrollToTopBtn");
        if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
            scrollToTopBtn.style.display = "block";
        } else {
            scrollToTopBtn.style.display = "none";
        }
    }

    // Desplazamiento suave hacia la parte superior
    document.getElementById("scrollToTopBtn").onclick = function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Función para deshabilitar otros inputs de la misma fila pero en diferentes columnas
    function disableOthers(currentInput) {
        // Obtener el nombre del input actual (ej. A1, B2, C4)
        var currentName = currentInput.name;

        // Obtener la fila del input actual (ej. A, B, C)
        var currentRow = currentName.substring(0, 1);

        // Iterar sobre todos los inputs de la misma fila
        const inputs = document.querySelectorAll('input[type="number"]');
        inputs.forEach(input => {
            var inputName = input.name;
            if (inputName.substring(0, 1) === currentRow && inputName !== currentName) {
                input.disabled = currentInput.value !== '';
            }
        });

        // Rehabilitar los campos si el actual se vacía
        if (currentInput.value === '') {
            inputs.forEach(input => {
                input.disabled = false;
            });
        }
    }
</script>