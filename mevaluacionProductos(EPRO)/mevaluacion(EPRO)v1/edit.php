<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id from URL parameter
$id = $_GET['id'];

// Seleccionar datos asociados con este id particular
$result = mysqli_query($mysqli, "SELECT * FROM productos WHERE id_producto = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$nombre = $resultData['nombre'];
$descripcion = $resultData['descripcion'];
$precio = $resultData['precio'];
$categoria = $resultData['categoria'];
$estado = $resultData['estado'];
$fVencimiento = $resultData['fVencimiento'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Editar Producto</h2>
        <a href="indexEPRO.php" class="btn btn-primary mb-4">Inicio</a>
        <form name="edit" method="post" action="editAction.php">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="<?php echo $descripcion; ?>" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" step="0.01" class="form-control" name="precio" value="<?php echo $precio; ?>" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría</label>
                <input type="text" class="form-control" name="categoria" value="<?php echo $categoria; ?>" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" name="estado" value="<?php echo $estado; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="fVencimiento">Fecha de Vencimiento</label>
                <input type="date" class="form-control" name="fVencimiento" value="<?php echo $fVencimiento; ?>" required>
            </div>
            <input type="hidden" name="id_producto" value="<?php echo $id; ?>">
            <button type="submit" name="update" class="btn btn-success">Actualizar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
