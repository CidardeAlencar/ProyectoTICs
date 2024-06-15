<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Proveedor</title>
    <?php include './inc/linkPROV.php'; ?>
</head>
<body>
    <?php include './inc/navbarPROV.php'; ?>

    <div class="container">
        <h1>Agregar Proveedor</h1>
        <form action="insert_proveedorPROV.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="NITProveedor">NIT del Proveedor:</label>
                <input type="text" id="NITProveedor" name="NITProveedor" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="NombreProveedor">Nombre del Proveedor:</label>
                <input type="text" id="NombreProveedor" name="NombreProveedor" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="Direccion">Dirección:</label>
                <input type="text" id="Direccion" name="Direccion" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="Telefono">Teléfono:</label>
                <input type="text" id="Telefono" name="Telefono" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="PaginaWeb">Página Web:</label>
                <input type="text" id="PaginaWeb" name="PaginaWeb" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="Imagen">Imagen del Proveedor:</label>
                <div class="input-file-container">
                    <input type="file" id="Imagen" name="Imagen" accept="image/*" class="input-file" required onchange="showMessage()">
                    <button type="button" class="btn btn-upload" style="padding: 5px 10px; background-color: #333333 ; color: #fff; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease;">Seleccionar imagen</button>
                </div>
                <p class="file-upload-text">Formatos admitidos: JPG, JPEG, PNG. Tamaño máximo: 5MB.</p>
            </div>

            <div id="upload-message" style="display: none; text-align: center;">
                La imagen ha sido cargada correctamente.
            </div>
            
            <p style="text-align: center;" style="display: inline-block; padding: 10px 20px; background-color: #333333; color: #e99c2e; text-decoration: none; border-radius: 4px; transition: background-color 0.3s ease;">
                <input type="submit" value="Agregar Proveedor">
            </p>
            
        </form>
    </div>

    <?php include './inc/footerPROV.php'; ?>

    <script>
        function showMessage() {
            document.getElementById('upload-message').style.display = 'block';
        }
    </script>
</body>
</html>