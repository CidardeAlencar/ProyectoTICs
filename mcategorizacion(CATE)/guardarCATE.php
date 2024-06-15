<?php
// Conexión a la base de datos
$obf_con = mysqli_connect("localhost", "root", "", "users_crud_php");

// Verificar la conexión
if (!$obf_con) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Variables inicializadas vacías para evitar errores
$obf_nombreTrabajador = '';
$obf_fechaContratacion = '';
$obf_correo = '';

// Variable para almacenar el nombre seleccionado
$obf_nombreSeleccionado = '';

// Procesar solicitud POST para obtener fecha de contratación y correo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre'])) {
    $obf_nombreSeleccionado = $_POST['nombre'];

    // Consulta preparada para obtener datos del trabajador seleccionado
    $obf_query = mysqli_prepare($obf_con, "SELECT fecha, correo FROM user WHERE id = ?");
    mysqli_stmt_bind_param($obf_query, "s", $obf_nombreSeleccionado);
    mysqli_stmt_execute($obf_query);
    mysqli_stmt_store_result($obf_query);

    // Verificar si se encontró un resultado
    if (mysqli_stmt_num_rows($obf_query) > 0) {
        mysqli_stmt_bind_result($obf_query, $obf_fecha, $obf_correo);
        mysqli_stmt_fetch($obf_query);
        $obf_fechaContratacion = $obf_fecha;
    }

    // Cerrar la consulta preparada
    mysqli_stmt_close($obf_query);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviar']) && $_POST['enviar'] == "evaluacion") {
    // Recopilar datos del formulario
    $obf_nombreTrabajador = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $obf_fechaContratacion = isset($_POST['contratacion']) ? $_POST['contratacion'] : '';
    $obf_correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $obf_cargoDesempeno = isset($_POST['desempeno']) ? $_POST['desempeno'] : '';
    $obf_antiguedad = isset($_POST['antiguedad']) ? $_POST['antiguedad'] : '';
    $obf_funcionesA1 = isset($_POST['A1']) ? $_POST['A1'] : '';
    $obf_funcionesA2 = isset($_POST['A2']) ? $_POST['A2'] : '';
    $obf_funcionesA3 = isset($_POST['A3']) ? $_POST['A3'] : '';
    $obf_funcionesA4 = isset($_POST['A4']) ? $_POST['A4'] : '';
    $obf_conocimientosB1 = isset($_POST['B1']) ? $_POST['B1'] : '';
    $obf_conocimientosB2 = isset($_POST['B2']) ? $_POST['B2'] : '';
    $obf_conocimientosB3 = isset($_POST['B3']) ? $_POST['B3'] : '';
    $obf_conocimientosB4 = isset($_POST['B4']) ? $_POST['B4'] : '';
    $obf_supervisionC1 = isset($_POST['C1']) ? $_POST['C1'] : '';
    $obf_supervisionC2 = isset($_POST['C2']) ? $_POST['C2'] : '';
    $obf_supervisionC3 = isset($_POST['C3']) ? $_POST['C3'] : '';
    $obf_supervisionC4 = isset($_POST['C4']) ? $_POST['C4'] : '';
    $obf_desempenaD1 = isset($_POST['D1']) ? $_POST['D1'] : '';
    $obf_desempenaD2 = isset($_POST['D2']) ? $_POST['D2'] : '';
    $obf_desempenaD3 = isset($_POST['D3']) ? $_POST['D3'] : '';
    $obf_desempenaD4 = isset($_POST['D4']) ? $_POST['D4'] : '';
    $obf_reaccionaE1 = isset($_POST['E1']) ? $_POST['E1'] : '';
    $obf_reaccionaE2 = isset($_POST['E2']) ? $_POST['E2'] : '';
    $obf_reaccionaE3 = isset($_POST['E3']) ? $_POST['E3'] : '';
    $obf_reaccionaE4 = isset($_POST['E4']) ? $_POST['E4'] : '';
    $obf_consigueF1 = isset($_POST['F1']) ? $_POST['F1'] : '';
    $obf_consigueF2 = isset($_POST['F2']) ? $_POST['F2'] : '';
    $obf_consigueF3 = isset($_POST['F3']) ? $_POST['F3'] : '';
    $obf_consigueF4 = isset($_POST['F4']) ? $_POST['F4'] : '';
    $obf_manejarG1 = isset($_POST['G1']) ? $_POST['G1'] : '';
    $obf_manejarG2 = isset($_POST['G2']) ? $_POST['G2'] : '';
    $obf_manejarG3 = isset($_POST['G3']) ? $_POST['G3'] : '';
    $obf_manejarG4 = isset($_POST['G4']) ? $_POST['G4'] : '';
    $obf_estandaresH1 = isset($_POST['H1']) ? $_POST['H1'] : '';
    $obf_estandaresH2 = isset($_POST['H2']) ? $_POST['H2'] : '';
    $obf_estandaresH3 = isset($_POST['H3']) ? $_POST['H3'] : '';
    $obf_estandaresH4 = isset($_POST['H4']) ? $_POST['H4'] : '';
    $obf_equipoI1 = isset($_POST['I1']) ? $_POST['I1'] : '';
    $obf_equipoI2 = isset($_POST['I2']) ? $_POST['I2'] : '';
    $obf_equipoI3 = isset($_POST['I3']) ? $_POST['I3'] : '';
    $obf_equipoI4 = isset($_POST['I4']) ? $_POST['I4'] : '';
    $obf_ayudaJ1 = isset($_POST['J1']) ? $_POST['J1'] : '';
    $obf_ayudaJ2 = isset($_POST['J2']) ? $_POST['J2'] : '';
    $obf_ayudaJ3 = isset($_POST['J3']) ? $_POST['J3'] : '';
    $obf_ayudaJ4 = isset($_POST['J4']) ? $_POST['J4'] : '';
    $obf_personalK1 = isset($_POST['K1']) ? $_POST['K1'] : '';
    $obf_personalK2 = isset($_POST['K2']) ? $_POST['K2'] : '';
    $obf_personalK3 = isset($_POST['K3']) ? $_POST['K3'] : '';
    $obf_personalK4 = isset($_POST['K4']) ? $_POST['K4'] : '';
    $obf_reunionL1 = isset($_POST['L1']) ? $_POST['L1'] : '';
    $obf_reunionL2 = isset($_POST['L2']) ? $_POST['L2'] : '';
    $obf_reunionL3 = isset($_POST['L3']) ? $_POST['L3'] : '';
    $obf_reunionL4 = isset($_POST['L4']) ? $_POST['L4'] : '';
    $obf_ocasional = isset($_POST['total-suma']) ? $_POST['total-suma'] : '';
    $obf_mitad = isset($_POST['total-suma-id-2']) ? $_POST['total-suma-id-2'] : '';
    $obf_frecuente = isset($_POST['total-suma-id-3']) ? $_POST['total-suma-id-3'] : '';
    $obf_siempre = isset($_POST['total-suma-id-4']) ? $_POST['total-suma-id-4'] : '';


    // Construir la consulta SQL para insertar los datos en la tabla correspondiente
    
    $obf_sql = "INSERT INTO evaluaciondesempeno (
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
        siempre
    ) VALUES (
        '$obf_nombreTrabajador', 
        '$obf_fechaContratacion', 
        '$obf_correo',
        '$obf_cargoDesempeno',
        '$obf_antiguedad',
        '$obf_funcionesA1',
        '$obf_funcionesA2',
        '$obf_funcionesA3',
        '$obf_funcionesA4',
        '$obf_conocimientosB1',
        '$obf_conocimientosB2',
        '$obf_conocimientosB3',
        '$obf_conocimientosB4',
        '$obf_supervisionC1',
        '$obf_supervisionC2',
        '$obf_supervisionC3',
        '$obf_supervisionC4',
        '$obf_desempenaD1',
        '$obf_desempenaD2',
        '$obf_desempenaD3',
        '$obf_desempenaD4',
        '$obf_reaccionaE1',
        '$obf_reaccionaE2',
        '$obf_reaccionaE3',
        '$obf_reaccionaE4',
        '$obf_consigueF1',
        '$obf_consigueF2',
        '$obf_consigueF3',
        '$obf_consigueF4',
        '$obf_manejarG1',
        '$obf_manejarG2',
        '$obf_manejarG3',
        '$obf_manejarG4',
        '$obf_estandaresH1',
        '$obf_estandaresH2',
        '$obf_estandaresH3',
        '$obf_estandaresH4',
        '$obf_equipoI1',
        '$obf_equipoI2',
        '$obf_equipoI3',
        '$obf_equipoI4',
        '$obf_ayudaJ1',
        '$obf_ayudaJ2',
        '$obf_ayudaJ3',
        '$obf_ayudaJ4',
        '$obf_personalK1',
        '$obf_personalK2',
        '$obf_personalK3',
        '$obf_personalK4',
        '$obf_reunionL1',
        '$obf_reunionL2',
        '$obf_reunionL3',
        '$obf_reunionL4',
        '$obf_ocasional',
        '$obf_mitad',
        '$obf_frecuente',
        '$obf_siempre'
    )";

    // Ejecutar la consulta SQL
    if (mysqli_query($obf_con, $obf_sql)) {
        header("Location: guardarCATE.php");
        exit();
    } else {
        echo "Error al insertar datos: " . mysqli_error($obf_con);
    }
}

// Cerrar la conexión
mysqli_close($obf_con);
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
    <div class="obf_App">
        <h1 class="obf_title-compras">EVALUACIÓN</h1>
        <h1 class="obf_title-compras">DE DESEMPEÑO</h1>


        <form id="obf_payment-form" class="obf_payment-form" method="POST">
            <div class="obf_container">
                <div class="obf_task">
                    <h2>Datos del Trabajador a Evaluar</h2>
                    <div>
                        <label style="font-size: 100%;" for="obf_nombre">Nombre Completo </label>
                    </div>
                    <div>
                        <select name="obf_nombre" id="obf_nombre" onchange="this.form.submit()">
                            <option value="">Seleccione un nombre</option>
                            <?php
                            // Imprimir la lista de nombres obtenidos previamente
                            $obf_con = mysqli_connect("localhost", "root", "", "users_crud_php");
                            $obf_result = mysqli_query($obf_con, "SELECT id, nombre FROM user");
                            while ($obf_row = mysqli_fetch_assoc($obf_result)) {
                                $obf_selected = ($obf_nombreSeleccionado == $obf_row['id']) ? "selected" : "";
                                echo "<option value='" . $obf_row['id'] . "' $obf_selected>" . $obf_row['nombre'] . "</option>";
                            }
                            mysqli_close($obf_con);
                            ?>
                        </select>
                    </div>
                    <div>
                        <label style="font-size: 100%;" for="obf_desempeno">Cargo de desempeño </label>
                        <div>
                            <input style="width: 95%; height:25px; font-size: 90%" type="text" name="obf_desempeno" placeholder="Cargo de desempeño">
                        </div>
                    </div>
                    <div>
                        <label style="font-size: 100%;" for="obf_contratacion">Fecha de contratación </label>
                        <div>
                            <input type="text" name="obf_contratacion" id="obf_contratacion" value="<?php echo $obf_fechaContratacion; ?>" readonly>
                        </div>
                    </div>
                    <div>
                        <div>
                            <label style="font-size: 100%;" for="obf_antiguedad">Antiguedad </label>
                        </div>
                        <div>
                            <input style="width: 95%; height:25px; font-size: 100%" type="number" name="obf_antiguedad" id="obf_antiguedad" placeholder="Antiguedad">
                        </div>
                    </div>
                    <div>
                        <label style="font-size: 100%;" for="obf_correo">Correo </label>
                        <div>
                            <input type="text" name="obf_correo" id="obf_correo" value="<?php echo $obf_correo; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="obf_payment-container">
                    <h2>Evaluación de Desempeño del Trabajador</h2>
                    <div class="obf_form-container">
                        <div class="obf_card-payment">
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
                                        <td><input id="1" name="obf_A1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="obf_A2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="obf_A3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="obf_A4" type="number" min="1" max="100" placeholder="0"></td>
                                    </tr>
                                    <tr>
                                        <td>El trabjador posee los conocimientos y habilidades necesarias</td>
                                        <td><input id="1" name="obf_B1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="obf_B2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="obf_B3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="obf_B4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                </table>
                            </div>

                            <div>
                                <table border="1">
                                    <tr>
                                        <td style="text-align: center;" class="center-content; " colspan="5">Planificacion y Organización</td>

                                    </tr>
                                    <tr>
                                        <td>El trabajador requiere una supervisión mínima</td>
                                        <td><input id="1" name="obf_C1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="obf_C2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="obf_C3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="obf_C4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                    <tr>
                                        <td>El trabajador se desempeña de forma organizada</td>
                                        <td><input id="1" name="obf_D1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="obf_D2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="obf_D3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="obf_D4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                    <tr>
                                        <td>El trabjador reacciona rápidamente ante las dificultades</td>
                                        <td><input id="1" name="obf_E1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="obf_E2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="obf_E3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="obf_E4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="obf_payment-container">
                    <h2>Evaluación de Desempeño del Trabajador</h2>
                    <div class="obf_form-container">
                        <div class="obf_card-payment">
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
                                        <td><input id="1" name="obf_F1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="obf_F2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="obf_F3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="obf_F4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                    <tr>
                                        <td>El trabajador puede manejar varias actividades a la vez</td>
                                        <td><input id="1" name="obf_G1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="obf_G2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="obf_G3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="obf_G4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                    <tr>
                                        <td>El trabajador consigue los estándares de productividad</td>
                                        <td><input id="1" name="obf_H1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="obf_H2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="obf_H3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="obf_H4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                </table>
                            </div>

                            <div>
                                <table border="1">
                                    <tr>
                                        <td style="text-align: center;" class="center-content; " colspan="5">Trabajo en Equipo</td>

                                    </tr>
                                    <tr>
                                        <td>El trabajador sabe trabajar en equipo</td>
                                        <td><input id="1" name="obf_I1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="obf_I2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="obf_I3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="obf_I4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                    <tr>
                                        <td>El trabajador ayuda a su equipo</td>
                                        <td><input id="1" name="obf_J1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="obf_J2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="obf_J3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="obf_J4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                    <tr>
                                        <td>El trabajador se desempeña bien con diferentes tipos de persona</td>
                                        <td><input id="1" name="obf_K1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="obf_K2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="obf_K3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="obf_K4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                    <tr>
                                        <td>El trabajador participa activamente en las reuniones de trabajo</td>
                                        <td><input id="1" name="obf_L1" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="2" name="obf_L2" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="3" name="obf_L3" type="number" min="1" max="100" placeholder="0"></td>
                                        <td><input id="4" name="obf_L4" type="number" min="1" max="100" placeholder="0"></td </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="obf_task">
                    <h2>Evaluación General y Comentarios</h2>
                    <div>
                        <label for="obf_ocasional">Total Ocasional 25% </label>
                        <div>
                            <input style="width: 95%; height:25px; font-size: 90%" type="text" name="obf_total-suma" id="obf_total-suma" placeholder="Porcentaje" readonly>
                        </div>
                    </div>
                    <div>
                        <label for="obf_mitad">Total de la mitad del tiempo 50% </label>
                        <div>
                            <input style="width: 95%; height:25px; font-size: 90%" type="text" name="obf_total-suma-id-2" id="obf_total-suma-id-2" placeholder="Porcentaje" readonly>
                        </div>
                    </div>
                    <div>
                        <label style="font-size: 100%;" for="obf_frecuente">Total Frecuente 75% </label>
                        <div>
                            <input style="width: 95%; height:25px; font-size: 90%" type="text" name="obf_total-suma-id-3" id="obf_total-suma-id-3" placeholder="Porcentaje" readonly>
                        </div>
                    </div>
                    <div>
                        <label style="font-size: 100%;" for="obf_siempre">Total Siempre 100% </label>
                        <div>
                            <input style="width: 95%; height:25px; font-size: 90%" type="text" name="obf_total-suma-id-4" id="obf_total-suma-id-4" placeholder="Porcentaje" readonly>
                        </div>
                    </div>
                    <div class="obf_signature-section">
                        <div class="obf_signature-block">
                            <div class="obf_signature-line"></div>
                            <p class="obf_signature-label">Firma del Evaluado</p>
                        </div>
                        <div class="obf_signature-block">
                            <div class="obf_signature-line"></div>
                            <p class="obf_signature-label">Firma del Evaluador</p>
                        </div>
                    </div>
                </div>
                <button type="submit" name="enviar" value="evaluacion">Enviar</button>
        </form>

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
    function obf_sumarInputs() {
        const obf_inputs = document.querySelectorAll('input[id="1"]');
        let obf_total = 0;

        obf_inputs.forEach(obf_input => {
            const obf_value = parseInt(obf_input.value) || 0;
            obf_total += obf_value;
        });

        // Dividir el total entre 13
        const obf_resultado1 = obf_total / 12;

        const obf_resultado2 = obf_resultado1 * 0.25;
        // Actualizar el input de total con el resultado
        document.getElementById('obf_total-suma').value = obf_resultado2.toFixed(2); // Redondeo a 2 decimales
    }

    // Añadir evento de cambio a los inputs para recalcular la suma
    const obf_inputs = document.querySelectorAll('input[id="1"]');
    obf_inputs.forEach(obf_input => {
        obf_input.addEventListener('input', obf_sumarInputs);
    });

    // Llama a la función una vez para asegurarte de que el valor inicial se muestra correctamente
    obf_sumarInputs();
</script>
<script>
    // Función para sumar los valores de los inputs con el mismo ID
    function obf_sumarInputsId2() {
        const obf_inputs = document.querySelectorAll('input[id="2"]');
        let obf_total = 0;

        obf_inputs.forEach(obf_input => {
            const obf_value = parseInt(obf_input.value) || 0;
            obf_total += obf_value;
        });

        // Dividir el total entre 13
        const obf_resultado1 = obf_total / 12;

        const obf_resultado2 = obf_resultado1 * 0.5;
        // Actualizar el input de total con el resultado
        document.getElementById('obf_total-suma-id-2').value = obf_resultado2.toFixed(2); // Redondeo a 2 decimales
    }

    // Añadir evento de cambio a los inputs para recalcular la suma
    const obf_inputsId2 = document.querySelectorAll('input[id="2"]');
    obf_inputsId2.forEach(obf_input => {
        obf_input.addEventListener('input', obf_sumarInputsId2);
    });

    // Llama a la función una vez para asegurarte de que el valor inicial se muestra correctamente
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

        // Dividir el total entre 13
        const obf_resultado1 = obf_total / 12;

        const obf_resultado2 = obf_resultado1 * 0.75;
        // Actualizar el input de total con el resultado
        document.getElementById('obf_total-suma-id-3').value = obf_resultado2.toFixed(2); // Redondeo a 2 decimales
    }

    // Añadir evento de cambio a los inputs para recalcular la suma
    const obf_inputsId3 = document.querySelectorAll('input[id="3"]');
    obf_inputsId3.forEach(obf_input => {
        obf_input.addEventListener('input', obf_sumarInputsId3);
    });

    // Llama a la función una vez para asegurarte de que el valor inicial se muestra correctamente
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

        // Dividir el total entre 13
        const obf_resultado1 = obf_total / 12;

        const obf_resultado2 = obf_resultado1 * 1;
        // Actualizar el input de total con el resultado
        document.getElementById('obf_total-suma-id-4').value = obf_resultado2.toFixed(2); // Redondeo a 2 decimales
    }

    // Añadir evento de cambio a los inputs para recalcular la suma
    const obf_inputsId4 = document.querySelectorAll('input[id="4"]');
    obf_inputsId4.forEach(obf_input => {
        obf_input.addEventListener('input', obf_sumarInputsId4);
    });

    // Llama a la función una vez para asegurarte de que el valor inicial se muestra correctamente
    obf_sumarInputsId4();
</script>
