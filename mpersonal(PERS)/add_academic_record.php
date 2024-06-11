<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Registro Académico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        

        .container {
            
            max-width: 1100px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: orange;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: calc(100% - 22px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: orange;
            color: #fff;
            border: none;
            padding: 10px 0;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: darkorange;
        }

        .btn {
            background-color: orange;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
        }

        .btn:hover {
            background-color: darkorange;
        }
    </style>
</head>
<body>
    <?php
    include 'db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ci = $_POST['ci'];
        $grado = $_POST['grado'];
        $institucion = $_POST['institucion'];
        $año_de_completacion = $_POST['año_de_completacion'];

        // Obtener el id_empleado usando el CI
        $sql = "SELECT id_empleado FROM empleados WHERE ci='$ci'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $empleado = $result->fetch_assoc();
            $id_empleado = $empleado['id_empleado'];

            $sql = "INSERT INTO registros_academicos (id_empleado, grado, institucion, año_de_completacion)
            VALUES ('$id_empleado', '$grado', '$institucion', '$año_de_completacion')";

            if ($conn->query($sql) === TRUE) {
                echo "<p style='color: green; text-align: center;'>Nuevo registro académico creado exitosamente.</p>";
            } else {
                echo "<p style='color: red; text-align: center;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }
        } else {
            echo "<p style='color: red; text-align: center;'>Empleado no encontrado.</p>";
        }
    }

    $conn->close();
    ?>
     <div class="container">
        <h1>Gestión de Personal</h1>
        <a href="add_employee.php" class="btn">Añadir Empleado</a>
        <a href="add_academic_record.php" class="btn">Añadir Registro Académico</a>
        <a href="edit_employee.php" class="btn">Editar Empleado</a>
        <a href="change_status.php" class="btn">Cambiar Estado</a>
        <a href="list_employees.php" class="btn">Lista de Empleados</a>
        <a href="../index.php" class="btn">Regresar</a>
    </div>
    <div class="container">
        <h1>Añadir Registro Académico</h1>
        <form method="post" action="">
            <label for="ci">CI:</label>
            <input type="text" name="ci" required><br>
            <label for="grado">Grado:</label>
            <select name="grado" required>
                <option value="Licenciatura">Licenciatura</option>
                <option value="Maestría">Maestría</option>
                <option value="Doctorado">Doctorado</option>
                <option value="Diplomado">Diplomado</option>
            </select><br>
            <label for="institucion">Institución:</label>
            <input type="text" name="institucion" required><br>
            <label for="año_de_completacion">Año de finalización:</label>
            <select name="año_de_completacion" required>
                <?php
                // Obtener el año actual
                $año_actual = date("Y");
                // Generar opciones de años desde 1970 hasta el año actual
                for ($i = 1970; $i <= $año_actual; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select><br>
            <input type="submit" value="Añadir Registro Académico">
        </form>
        <a href="../index.php" class="btn btn-primary">Regresar</a>
    </div>
</body>
</html>
