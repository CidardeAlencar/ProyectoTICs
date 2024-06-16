<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM productos ORDER BY id_producto ASC");
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lista de Productos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
	<h1 class="mt-5">Lista de Productos</h1>

	<!-- Formulario de búsqueda -->
	<form class="form-inline mt-3 mb-3" method="GET" action="">
		<input type="text" class="form-control mr-sm-2" name="buscar" placeholder="Buscar por nombre..." value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : ''; ?>">
		<button type="submit" class="btn btn-primary">Buscar</button>
		<a href="add.php" class="btn btn-success ml-2" role="button">Nuevo Registro</a>
		<a href="add.php" class="btn btn-secondary ml-2" role="button">Evaluacion de Productos</a>
	</form>


	<div class="table-responsive">
		<table class="table table-bordered">
			<thead style="background-color: #e99c2e;">
				<tr>
					<th>ID Pwwroducto</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Precio</th>
					<th>Categoría</th>
					<th>Estado</th>

					<th>Fecha de Vencimiento</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<?php
				// Fetch the next row of a result set as an associative array
				while ($res = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $res["id_producto"] . "</td>";
					echo "<td>" . $res["nombre"] . "</td>";
					echo "<td>" . $res["descripcion"] . "</td>";
					echo "<td>" . $res["precio"] . "</td>";
					echo "<td>" . $res["categoria"] . "</td>";
					echo "<td>" . $res["estado"] . "</td>";
					//echo "<td><img src='" . $row["imagen_principal"] . "' width='100' height='100'></td>";
					echo "<td>" . $res["fVencimiento"] . "</td>";

					echo '<td>';
					
					echo '<a class="btn btn-warning ml-2" role="button" href="#" onclick="window.location.href=\'/mevaluacionProductos(EPRO)/edit.php?id=' . $res['id_producto'] . '\';">
        <i class="fas fa-edit"></i>
      </a>';

echo '<a class="btn btn-danger ml-2" role="button" href="#" onclick="if(confirm(\'¿Seguro que quiere eliminar?\')){ window.location.href=\'/mevaluacionProductos(EPRO)/delete.php?id=' . $res['id_producto'] . '\';}">
        <i class="fas fa-sync"></i>
      </a>';

					echo '<td>';

					echo '</td>';
				}
				?>
			</tbody>
		</table>
		<a href="../mevaluacionProductos(EPRO)/edit.php"></a>
	</div>
</body>

</html>