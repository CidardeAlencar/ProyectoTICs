<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Empleado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .cntnr {
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
        lbl {
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
<div class="cntnr">
    <h1>Gestión de Personal</h1>
    <a href="add_employee.php" class="btn">Añadir Empleado</a>
    <a href="add_academic_record.php" class="btn">Añadir Registro Académico</a>
    <a href="edit_employee.php" class="btn">Editar Empleado</a>
    <a href="change_status.php" class="btn">Cambiar Estado</a>
    <a href="list_employees.php" class="btn">Lista de Empleados</a>
    <a href="../index.php" class="btn">Regresar</a>
</div>
<div class="cntnr">
    <h1>Añadir Empleado</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'db.php';
        $nm = $_POST['nombre'];
        $apl = $_POST['apellido'];
        $crr = $_POST['correo'];
        $nm_cel = $_POST['numero_celular'];
        $cid = $_POST['ci'];
        $crg = $_POST['cargo'];
        $dpt = $_POST['departamento'];

        $sql = "INSERT INTO empleados (nombre, apellido, correo, numero_celular, ci, cargo, departamento)
        VALUES ('$nm', '$apl', '$crr', '$nm_cel', '$cid', '$crg', '$dpt')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green; text-align: center;'>Nuevo empleado añadido exitosamente.</p>";
        } else {
            echo "<p style='color: red; text-align: center;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }

        $conn->close();
    }
    ?>
    <form method="post" action="">
        <lbl for="nombre">Nombre:</lbl>
        <input type="text" id="nombre" name="nombre" required>
        <lbl for="apellido">Apellido:</lbl>
        <input type="text" id="apellido" name="apellido" required>
        <lbl for="correo">Correo electrónico:</lbl>
        <input type="email" id="correo" name="correo" required>
        <lbl for="numero_celular">Número de celular:</lbl>
        <input type="text" id="numero_celular" name="numero_celular" required>
        <lbl for="ci">CI:</lbl>
        <input type="text" id="ci" name="ci" required>
        <lbl for="cargo">Cargo:</lbl>
        <input type="text" id="cargo" name="cargo" required>
        <lbl for="departamento">Departamento:</lbl>
        <select id="departamento" name="departamento" required>
            <option value="Recursos Humanos">Recursos Humanos</option>
            <option value="Gerencia">Gerencia</option>
            <option value="Sistemas">Sistemas</option>
            <option value="Almacén">Almacén</option>
        </select>
        <input type="submit" value="Añadir Empleado">
        <a href="../index.php" class="btn btn-primary">Regresar</a>
    </form>
</div>
</body>
</html>
