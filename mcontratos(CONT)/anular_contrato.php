<?php
@include 'connection.php';
$_A = connection();
$_B = $_GET['id'];
if (isset($_POST['anular'])) {
    $_C = "UPDATE Contratos SET estado = 'inactivo' WHERE contratoId = $_B";
    if (mysqli_query($_A, $_C)) {
        echo '<script>alert("Contrato anulado exitosamente"); window.location.href = "./index.php";</script>';
    } else {
        echo '<script>alert("Error al anular el contrato"); window.location.href = "./index.php";</script>';
    }
}
$_D = "SELECT * FROM Contratos WHERE contratoId = $_B";
$_E = mysqli_query($_A, $_D);
if ($_E && mysqli_num_rows($_E) == 1) {
    // Código adicional si es necesario
} else {
    echo '<p>Contrato no encontrado.</p>';
    exit();
}
?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fc;
    }
    main {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
    .container {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        width: 80%;
        max-width: 800px;
        margin: 0 auto;
    }
    h1, h2 {
        color: #333;
        text-align: center;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #e99c2e;
        color: #fff;
    }
    .eliminar {
        text-align: center;
        margin-top: 20px;
    }
    .eliminar h2 {
        color: #e99c2e;
        margin-bottom: 20px;
    }
    .eliminar p {
        font-size: 18px;
        margin-bottom: 20px;
    }
    .eliminar form {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .button-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
    }
    .button-container button {
        margin: 0 15px;
    }
    button[name="atras"] {
        background-color: blue;
        color: white;
    }
    button[name="atras"]:hover {
        background-color: darkblue;
    }
</style>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar contrato</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="eliminar">
        <div class="container">
            <h2>Anular contrato</h2>
            <p>¿Seguro que desea anular el contrato?</p>
            <form action="anular_contrato.php?id=<?php echo $_B; ?>" method="post">
                <div class="button-container">
                    <button type="submit" name="anular">Anular</button>
                    <button type="button" name="atras" onclick="window.history.back();">Atrás</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
