<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Estado</title>
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

        .ntfctn {
            display: none;
            background-color: #4CAF50; /* Green */
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .ntfctn.err {
            background-color: #f44336; /* Red */
        }

        .ntfctn.shw {
            display: block;
        }
    </style>
</head>
<body>
<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ci = $_POST['ci'];

    // Verificar si el empleado existe
    $sql = "SELECT id_empleado FROM empleados WHERE ci='$ci'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $empleado = $result->fetch_assoc();
        $id_empleado = $empleado['id_empleado'];

        // Cambiar el estado del empleado
        $sql = "UPDATE empleados SET estado = 1 - estado WHERE id_empleado='$id_empleado'";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green; text-align: center;'>El estado del empleado ha sido actualizado correctamente.</p>";
        } else {
            echo "<p style='color: red; text-align: center;'>Error al actualizar el estado del empleado: " . $conn->error . "</p>";
        }
    } else {
        echo "<p style='color: red; text-align: center;'>Empleado no encontrado.</p>";
    }
}

$conn->close();
?>

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
    <h1>Cambiar Estado</h1>
    <form method="post" action="change_status.php">
        <lbl for="ci">CI:</lbl>
        <input type="text" name="ci" required><br>
        <lbl for="nuevo_estado">Nuevo Estado:</lbl>
        <select name="nuevo_estado" required>
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select><br>
        <input type="submit" value="Actualizar Estado">
    </form>
    <a href="../index.php" class="btn btn-primary">Regresar</a>
</div>
</body>
</html>
