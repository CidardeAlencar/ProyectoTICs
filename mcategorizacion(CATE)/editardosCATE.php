<?php
// Verificar si se recibió el formulario y procesar la actualización
if (isset($_POST['enviar']) && $_POST['enviar'] == 'evaluacion') {
    // Obtener el ID del usuario desde la URL
    $userId = $_GET['id'];

    // Conectar a la base de datos
    $con = mysqli_connect("localhost", "root", "", "users_crud_php");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Función para limpiar y preparar los datos para la consulta SQL
    function clean_input($data, $con)
    {
        return mysqli_real_escape_string($con, htmlspecialchars($data));
    }

    // Variables para almacenar los datos actualizados
    $cargoDesempeno = clean_input($_POST['desempeno'], $con);
    $antiguedad = clean_input($_POST['antiguedad'], $con);

    // Arrays para los campos y sus valores
    $campos = array(
        'cargoDesempeno' => $cargoDesempeno,
        'antiguedad' => $antiguedad,
        'funcionesA1' => isset($_POST['A1']) ? clean_input($_POST['A1'], $con) : '',
        'funcionesA2' => isset($_POST['A2']) ? clean_input($_POST['A2'], $con) : '',
        'funcionesA3' => isset($_POST['A3']) ? clean_input($_POST['A3'], $con) : '',
        'funcionesA4' => isset($_POST['A4']) ? clean_input($_POST['A4'], $con) : '',
        'conocimientosB1' => isset($_POST['B1']) ? clean_input($_POST['B1'], $con) : '',
        'conocimientosB2' => isset($_POST['B2']) ? clean_input($_POST['B2'], $con) : '',
        'conocimientosB3' => isset($_POST['B3']) ? clean_input($_POST['B3'], $con) : '',
        'conocimientosB4' => isset($_POST['B4']) ? clean_input($_POST['B4'], $con) : '',
        'supervisionC1' => isset($_POST['C1']) ? clean_input($_POST['C1'], $con) : '',
        'supervisionC2' => isset($_POST['C2']) ? clean_input($_POST['C2'], $con) : '',
        'supervisionC3' => isset($_POST['C3']) ? clean_input($_POST['C3'], $con) : '',
        'supervisionC4' => isset($_POST['C4']) ? clean_input($_POST['C4'], $con) : '',
        'desempenaD1' => isset($_POST['D1']) ? clean_input($_POST['D1'], $con) : '',
        'desempenaD2' => isset($_POST['D2']) ? clean_input($_POST['D2'], $con) : '',
        'desempenaD3' => isset($_POST['D3']) ? clean_input($_POST['D3'], $con) : '',
        'desempenaD4' => isset($_POST['D4']) ? clean_input($_POST['D4'], $con) : '',
        'reaccionaE1' => isset($_POST['E1']) ? clean_input($_POST['E1'], $con) : '',
        'reaccionaE2' => isset($_POST['E2']) ? clean_input($_POST['E2'], $con) : '',
        'reaccionaE3' => isset($_POST['E3']) ? clean_input($_POST['E3'], $con) : '',
        'reaccionaE4' => isset($_POST['E4']) ? clean_input($_POST['E4'], $con) : '',
        'consigueF1' => isset($_POST['F1']) ? clean_input($_POST['F1'], $con) : '',
        'consigueF2' => isset($_POST['F2']) ? clean_input($_POST['F2'], $con) : '',
        'consigueF3' => isset($_POST['F3']) ? clean_input($_POST['F3'], $con) : '',
        'consigueF4' => isset($_POST['F4']) ? clean_input($_POST['F4'], $con) : '',
        'manejarG1' => isset($_POST['G1']) ? clean_input($_POST['G1'], $con) : '',
        'manejarG2' => isset($_POST['G2']) ? clean_input($_POST['G2'], $con) : '',
        'manejarG3' => isset($_POST['G3']) ? clean_input($_POST['G3'], $con) : '',
        'manejarG4' => isset($_POST['G4']) ? clean_input($_POST['G4'], $con) : '',
        'estandaresH1' => isset($_POST['H1']) ? clean_input($_POST['H1'], $con) : '',
        'estandaresH2' => isset($_POST['H2']) ? clean_input($_POST['H2'], $con) : '',
        'estandaresH3' => isset($_POST['H3']) ? clean_input($_POST['H3'], $con) : '',
        'estandaresH4' => isset($_POST['H4']) ? clean_input($_POST['H4'], $con) : '',
        'equipoI1' => isset($_POST['I1']) ? clean_input($_POST['I1'], $con) : '',
        'equipoI2' => isset($_POST['I2']) ? clean_input($_POST['I2'], $con) : '',
        'equipoI3' => isset($_POST['I3']) ? clean_input($_POST['I3'], $con) : '',
        'equipoI4' => isset($_POST['I4']) ? clean_input($_POST['I4'], $con) : '',
        'ayudaJ1' => isset($_POST['J1']) ? clean_input($_POST['J1'], $con) : '',
        'ayudaJ2' => isset($_POST['J2']) ? clean_input($_POST['J2'], $con) : '',
        'ayudaJ3' => isset($_POST['J3']) ? clean_input($_POST['J3'], $con) : '',
        'ayudaJ4' => isset($_POST['J4']) ? clean_input($_POST['J4'], $con) : '',
        'personalK1' => isset($_POST['K1']) ? clean_input($_POST['K1'], $con) : '',
        'personalK2' => isset($_POST['K2']) ? clean_input($_POST['K2'], $con) : '',
        'personalK3' => isset($_POST['K3']) ? clean_input($_POST['K3'], $con) : '',
        'personalK4' => isset($_POST['K4']) ? clean_input($_POST['K4'], $con) : '',
        'reunionL1' => isset($_POST['L1']) ? clean_input($_POST['L1'], $con) : '',
        'reunionL2' => isset($_POST['L2']) ? clean_input($_POST['L2'], $con) : '',
        'reunionL3' => isset($_POST['L3']) ? clean_input($_POST['L3'], $con) : '',
        'reunionL4' => isset($_POST['L4']) ? clean_input($_POST['L4'], $con) : '',
        'ocasional' => isset($_POST['total-suma']) ? clean_input($_POST['total-suma'], $con) : '',
        'mitad' => isset($_POST['total-suma-id-2']) ? clean_input($_POST['total-suma-id-2'], $con) : '',
        'frecuente' => isset($_POST['total-suma-id-3']) ? clean_input($_POST['total-suma-id-3'], $con) : '',
        'siempre' => isset($_POST['total-suma-id-4']) ? clean_input($_POST['total-suma-id-4'], $con) : ''
    );

    // Construir la consulta SQL para actualizar los datos
    $query = "UPDATE evaluaciondesempeno SET ";
    foreach ($campos as $campo => $valor) {
        if (!empty($valor)) { // Verificar que el valor no esté vacío
            $query .= "$campo = '$valor', ";
        }
    }
    $query = rtrim($query, ", "); // Eliminar la última coma y espacio en blanco

    $query .= " WHERE id = $userId";

    // Ejecutar la consulta
    if (mysqli_query($con, $query)) {
        echo "<p>Datos actualizados correctamente para el usuario con ID = $userId</p>";
    } else {
        echo "Error al actualizar datos: " . mysqli_error($con);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($con);
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

        <?php
        // Verificar si se recibió el ID del usuario desde editaruno.php
        if (isset($_GET['id'])) {
            $userId = $_GET['id'];
            $con = mysqli_connect("localhost", "root", "", "users_crud_php");
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Obtener los datos del usuario con el ID especificado
            $query = "SELECT * FROM evaluaciondesempeno WHERE id = $userId";
            $result = mysqli_query($con, $query);

            // Verificar si se encontraron resultados
            if ($result && mysqli_num_rows($result) > 0) {
                $userData = mysqli_fetch_assoc($result);
            } else {
                echo "No se encontraron datos para el usuario con ID=$userId";
                $userData = [];
            }

            mysqli_close($con);
        } else {
            echo "<p>No se recibió ningún ID de usuario.</p>";
            $userData = [];
        }
        ?>

        <form id="payment-form" class="payment-form" method="POST">
            <div class="container">
                <div class="task">
                    <h2>Editar Datos del Trabajador a Evaluar</h2>
                    <div>
                        <label style="font-size: 100%; " for="nombre">Nombre Completo </label>
                    </div>
                    <div>
                        <input type="text" name="nombre" id="nombre" value="<?php echo isset($userData['nombreTrabajador']) ? htmlspecialchars($userData['nombreTrabajador']) : ''; ?>" readonly>
                    </div>
                    <div>
                        <label style="font-size: 100%;" for="desempeno">Cargo de desempeño </label>
                        <div>
                            <input type="text" name="desempeno" id="desempeno" value="<?php echo isset($userData['cargoDesempeno']) ? htmlspecialchars($userData['cargoDesempeno']) : ''; ?>">
                        </div>
                    </div>
                    <div>
                        <label style="font-size: 100%;" for="contratacion">Fecha de contratación </label>
                        <div>
                            <input type="text" name="contratacion" id="contratacion" value="<?php echo isset($userData['fechaContratacion']) ? htmlspecialchars($userData['fechaContratacion']) : ''; ?>" readonly>
                        </div>
                    </div>
                    <div>
                        <div>
                            <label style="font-size: 100%;" for="antiguedad">Antiguedad </label>
                        </div>
                        <div>
                            <input type="number" name="antiguedad" id="antiguedad" value="<?php echo isset($userData['antiguedad']) ? htmlspecialchars($userData['antiguedad']) : ''; ?>">
                        </div>
                    </div>
                    <div>
                        <label style="font-size: 100%;" for="correo">Correo </label>
                        <div>
                            <input type="text" name="correo" id="correo" value="<?php echo isset($userData['correo']) ? htmlspecialchars($userData['correo']) : ''; ?>" readonly>
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

                                        <td><input id="1" name="A1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['funcionesA1']) ? htmlspecialchars($userData['funcionesA1']) : ''; ?>"></td>
                                        <td><input id="2" name="A2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['funcionesA2']) ? htmlspecialchars($userData['funcionesA2']) : ''; ?>"></td>
                                        <td><input id="3" name="A3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['funcionesA3']) ? htmlspecialchars($userData['funcionesA3']) : ''; ?>"></td>
                                        <td><input id="4" name="A4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['funcionesA4']) ? htmlspecialchars($userData['funcionesA4']) : ''; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabjador posee los conocimientos y habilidades necesarias</td>
                                        <td><input id="1" name="B1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['conocimientosB1']) ? htmlspecialchars($userData['conocimientosB1']) : ''; ?>"></td>
                                        <td><input id="2" name="B2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['conocimientosB2']) ? htmlspecialchars($userData['conocimientosB2']) : ''; ?>"></td>
                                        <td><input id="3" name="B3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['conocimientosB3']) ? htmlspecialchars($userData['conocimientosB3']) : ''; ?>"></td>
                                        <td><input id="4" name="B4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['conocimientosB4']) ? htmlspecialchars($userData['conocimientosB4']) : ''; ?>"></td>
                                    </tr>
                                </table>
                            </div>

                            <div>
                                <table border="1">
                                    <tr>
                                        <td style="text-align: center; padding-left: 0%; background-color: #e99c2e; color: white;" class="center-content; " colspan="5">Planificacion y Organización</td>

                                    </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador requiere una supervisión mínima</td>
                                        <td><input id="1" name="C1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['supervisionC1']) ? htmlspecialchars($userData['supervisionC1']) : ''; ?>"></td>
                                        <td><input id="2" name="C2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['supervisionC2']) ? htmlspecialchars($userData['supervisionC2']) : ''; ?>"></td>
                                        <td><input id="3" name="C3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['supervisionC3']) ? htmlspecialchars($userData['supervisionC3']) : ''; ?>"></td>
                                        <td><input id="4" name="C4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['supervisionC4']) ? htmlspecialchars($userData['supervisionC4']) : ''; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador se desempeña de forma organizada</td>
                                        <td><input id="1" name="D1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['desempenaD1']) ? htmlspecialchars($userData['desempenaD1']) : ''; ?>"></td>
                                        <td><input id="2" name="D2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['desempenaD2']) ? htmlspecialchars($userData['desempenaD2']) : ''; ?>"></td>
                                        <td><input id="3" name="D3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['desempenaD3']) ? htmlspecialchars($userData['desempenaD3']) : ''; ?>"></td>
                                        <td><input id="4" name="D4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['desempenaD4']) ? htmlspecialchars($userData['desempenaD4']) : ''; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador reacciona rápidamente ante las dificultades</td>
                                        <td><input id="1" name="E1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['reaccionaE1']) ? htmlspecialchars($userData['reaccionaE1']) : ''; ?>"></td>
                                        <td><input id="2" name="E2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['reaccionaE2']) ? htmlspecialchars($userData['reaccionaE2']) : ''; ?>"></td>
                                        <td><input id="3" name="E3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['reaccionaE3']) ? htmlspecialchars($userData['reaccionaE3']) : ''; ?>"></td>
                                        <td><input id="4" name="E4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['reaccionaE4']) ? htmlspecialchars($userData['reaccionaE4']) : ''; ?>"></td>
                                    </tr>
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
                                        <td><input id="1" name="F1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['consigueF1']) ? htmlspecialchars($userData['consigueF1']) : ''; ?>"></td>
                                        <td><input id="2" name="F2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['consigueF2']) ? htmlspecialchars($userData['consigueF2']) : ''; ?>"></td>
                                        <td><input id="3" name="F3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['consigueF3']) ? htmlspecialchars($userData['consigueF3']) : ''; ?>"></td>
                                        <td><input id="4" name="F4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['consigueF4']) ? htmlspecialchars($userData['consigueF4']) : ''; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador puede manejar varias actividades a la vez</td>
                                        <td><input id="1" name="G1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['manejarG1']) ? htmlspecialchars($userData['manejarG1']) : ''; ?>"></td>
                                        <td><input id="2" name="G2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['manejarG2']) ? htmlspecialchars($userData['manejarG2']) : ''; ?>"></td>
                                        <td><input id="3" name="G3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['manejarG3']) ? htmlspecialchars($userData['manejarG3']) : ''; ?>"></td>
                                        <td><input id="4" name="G4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['manejarG4']) ? htmlspecialchars($userData['manejarG4']) : ''; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador consigue los estándares de productividad</td>
                                        <td><input id="1" name="H1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['estandaresH1']) ? htmlspecialchars($userData['estandaresH1']) : ''; ?>"></td>
                                        <td><input id="2" name="H2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['estandaresH2']) ? htmlspecialchars($userData['estandaresH2']) : ''; ?>"></td>
                                        <td><input id="3" name="H3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['estandaresH3']) ? htmlspecialchars($userData['estandaresH3']) : ''; ?>"></td>
                                        <td><input id="4" name="H4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['estandaresH4']) ? htmlspecialchars($userData['estandaresH4']) : ''; ?>"></td>
                                    </tr>
                                </table>
                            </div>

                            <div>
                                <table border="1">
                                    <tr>
                                        <td style="text-align: center; padding-left: 0%; background-color: #e99c2e; color: white;" class="center-content; " colspan="5">Trabajo en Equipo</td>

                                    </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador sabe trabajar en equipo</td>
                                        <td><input id="1" name="I1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['equipoI1']) ? htmlspecialchars($userData['equipoI1']) : ''; ?>"></td>
                                        <td><input id="2" name="I2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['equipoI2']) ? htmlspecialchars($userData['equipoI2']) : ''; ?>"></td>
                                        <td><input id="3" name="I3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['equipoI3']) ? htmlspecialchars($userData['equipoI3']) : ''; ?>"></td>
                                        <td><input id="4" name="I4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['equipoI4']) ? htmlspecialchars($userData['equipoI4']) : ''; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador ayuda a su equipo</td>
                                        <td><input id="1" name="J1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['ayudaJ1']) ? htmlspecialchars($userData['ayudaJ1']) : ''; ?>"></td>
                                        <td><input id="2" name="J2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['ayudaJ2']) ? htmlspecialchars($userData['ayudaJ2']) : ''; ?>"></td>
                                        <td><input id="3" name="J3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['ayudaJ3']) ? htmlspecialchars($userData['ayudaJ3']) : ''; ?>"></td>
                                        <td><input id="4" name="J4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['ayudaJ4']) ? htmlspecialchars($userData['ayudaJ4']) : ''; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador se desempeña bien con diferentes tipos de persona</td>
                                        <td><input id="1" name="K1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['personalK1']) ? htmlspecialchars($userData['personalK1']) : ''; ?>"></td>
                                        <td><input id="2" name="K2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['personalK2']) ? htmlspecialchars($userData['personalK2']) : ''; ?>"></td>
                                        <td><input id="3" name="K3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['personalK3']) ? htmlspecialchars($userData['personalK3']) : ''; ?>"></td>
                                        <td><input id="4" name="K4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['personalK4']) ? htmlspecialchars($userData['personalK4']) : ''; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 0%; background-color: #6666;">El trabajador participa activamente en las reuniones de trabajo</td>
                                        <td><input id="1" name="L1" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['reunionL1']) ? htmlspecialchars($userData['reunionL1']) : ''; ?>"></td>
                                        <td><input id="2" name="L2" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['reunionL2']) ? htmlspecialchars($userData['reunionL2']) : ''; ?>"></td>
                                        <td><input id="3" name="L3" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['reunionL3']) ? htmlspecialchars($userData['reunionL3']) : ''; ?>"></td>
                                        <td><input id="4" name="L4" type="number" min="1" max="100" placeholder="0" oninput="disableOthers(this)" value="<?php echo isset($userData['reunionL4']) ? htmlspecialchars($userData['reunionL4']) : ''; ?>"></td>
                                    </tr>
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

                            <input style="width: 95%; height:25px; font-size: 90%" type="text" name="total-suma" id="total-suma" value="<?php echo isset($userData['ocasional']) ? htmlspecialchars($userData['ocasional']) : ''; ?>">
                        </div>
                    </div>
                    <div>
                        <label for="mitad">Total de la mitad del tiempo 50% </label>
                        <div>
                            <input style="width: 95%; height:25px; font-size: 90%" type="text" name="total-suma-id-2" id="total-suma-id-2" value="<?php echo isset($userData['mitad']) ? htmlspecialchars($userData['mitad']) : ''; ?>">
                        </div>
                    </div>
                    <div>
                        <label style="font-size: 100%;" for="frecuente">Total Frecuente 75% </label>
                        <div>
                            <input style="width: 95%; height:25px; font-size: 90%" type="text" name="total-suma-id-3" id="total-suma-id-3" value="<?php echo isset($userData['frecuente']) ? htmlspecialchars($userData['frecuente']) : ''; ?>">
                        </div>
                    </div>
                    <div>
                        <label style="font-size: 100%;" for="siempre">Total Siempre 100% </label>
                        <div>
                            <input style="width: 95%; height:25px; font-size: 90%" type="text" name="total-suma-id-4" id="total-suma-id-4" value="<?php echo isset($userData['siempre']) ? htmlspecialchars($userData['siempre']) : ''; ?>">
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
                        <button type="submit" name="enviar" value="evaluacion" class="btn">Actualizar</button>
                        <button type="button" class="btn back-btn" onclick="window.location.href='editarCATE.php'">Cancelar</button>

                    </div>
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
<script>
    function disableOthers(input) {
        // Obtener todos los input dentro de la fila actual
        const inputs = input.parentElement.parentElement.getElementsByTagName('input');

        // Recorrer todos los inputs
        for (let i = 0; i < inputs.length; i++) {
            if (inputs[i] !== input) { // Excepto el input actual
                inputs[i].value = 0; // Establecer el valor en 0
                inputs[i].disabled = true; // Desactivar el input
            }
        }
    }
</script>
<script>
    // Espera a que el DOM esté completamente cargado
    document.addEventListener("DOMContentLoaded", function() {
        // Obtén referencias a los campos de entrada relevantes
        var A1 = document.getElementById('A1');
        var C1 = document.getElementById('C1');

        // Agrega un evento 'input' al campo A1 para escuchar los cambios
        A1.addEventListener('input', function() {
            // Obtiene el valor actual de A1
            var valorA1 = parseInt(A1.value) || 0;

            // Actualiza el valor de C1
            C1.value = valorA1;
        });
    });
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
</script>