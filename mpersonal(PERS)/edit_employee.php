<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
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
<div class="container">
        <h1>Gestión de Personal</h1>
        <a href="mpersonal(PERS)/add_employee.php" class="btn">Añadir Empleado</a>
        <a href="mpersonal(PERS)/add_academic_record.php" class="btn">Añadir Registro Académico</a>
        <a href="mpersonal(PERS)/edit_employee.php" class="btn">Editar Empleado</a>
        <a href="mpersonal(PERS)/change_status.php" class="btn">Cambiar Estado</a>
        <a href="mpersonal(PERS)/list_employees.php" class="btn">Lista de Empleados</a>
        <a href="../index.php" class="btn">Regresar</a>
    </div>
    <div class="container">
        <h1>Editar Empleado</h1>
        <form method="post" action="">
            <label for="ci">CI del Empleado:</label>
            <input type="text" id="ci" name="ci" required>
            <input type="submit" value="Buscar Empleado">
        </form>
    </div>
</body>
</html>

<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ci'])) {
    $ci = $_POST['ci'];

    $sql = "SELECT * FROM empleados WHERE ci='$ci'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<div class="container">
    <form method="post" action="">
        <input type="hidden" name="ci" value="<?php echo $row['ci']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo isset($row['nombre']) ? $row['nombre'] : ''; ?>" required>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo isset($row['apellido']) ? $row['apellido'] : ''; ?>" required>
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" value="<?php echo isset($row['correo']) ? $row['correo'] : ''; ?>" required>
        <label for="numero_celular">Número de celular:</label>
        <input type="text" id="numero_celular" name="numero_celular" value="<?php echo isset($row['numero_celular']) ? $row['numero_celular'] : ''; ?>" required>
        <label for="cargo">Cargo:</label>
        <input type="text" id="cargo" name="cargo" value="<?php echo isset($row['cargo']) ? $row['cargo'] : ''; ?>" required>
        <label for="departamento">Departamento:</label>
        <select id="departamento" name="departamento" required>
            <option value="Recursos Humanos" <?php if (isset($row['departamento']) && $row['departamento'] == 'Recursos Humanos') echo 'selected'; ?>>Recursos Humanos</option>
            <option value="Gerencia" <?php if (isset($row['departamento']) && $row['departamento'] == 'Gerencia') echo 'selected'; ?>>Gerencia</option>
            <option value="Sistemas" <?php if (isset($row['departamento']) && $row['departamento'] == 'Sistemas') echo 'selected'; ?>>Sistemas</option>
            <option value="Almacén" <?php if (isset($row['departamento']) && $row['departamento'] == 'Almacén') echo 'selected'; ?>>Almacén</option>
        </select>
        <input type="submit" value="Actualizar Empleado">
        <a href="../index.php" class="btn btn-primary">Regresar</a>

    </form>
</div>

<?php
    } else {
        echo "<p style='color: red; text-align: center;'>Empleado no encontrado.</p>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ci'])) {
    $ci = $_POST['ci'];
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $numero_celular = isset($_POST['numero_celular']) ? $_POST['numero_celular'] : '';
    $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '';
    $departamento = isset($_POST['departamento']) ? $_POST['departamento'] : '';

    $sql_update = "UPDATE empleados SET nombre='$nombre', apellido='$apellido', correo='$correo', numero_celular='$numero_celular', cargo='$cargo', departamento='$departamento' WHERE ci='$ci'";

    if ($conn->query($sql_update) === TRUE) {
        echo "<p style='color: green; text-align: center;'>Empleado actualizado exitosamente.</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Error al actualizar el empleado: " . $conn->error . "</p>";
    }
}
?>