<?php
require_once( dirname( __FILE__ ) . '/../connection.php' );

$connect = connection();
$search = $_GET[ 'search' ] ?? '';

$stmt = $connect->prepare( "
  SELECT
    *
  FROM
    reclamos
  WHERE
    reclamos.nombre LIKE ?
    OR reclamos.correo LIKE ?
    OR reclamos.telefono LIKE ?
    OR reclamos.reclamo LIKE ?
  " );

$searchFor = "%$search%";
$stmt->bind_param( "ssss", $searchFor, $searchFor, $searchFor, $searchFor );
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>RECLAMOS</title>
  <style>
    .content {
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
      font-family: Arial, sans-serif;
      font-size: 1.2em;
    }
    .formulario {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 20px 40px;
      border-radius: 15px;
      box-shadow: 10px 10px 30px rgb(233, 156, 46, 0.4);
      gap: 15px;
    }

    .form-group {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 10px;
    }

    .form-control {
      height: 30px;
      border-radius: 5px;
      border: none;
      padding: 5px 10px;
      min-width: 300px;
      box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
      font-size: 1rem;
    }
    
    .form-control:focus {
      outline: none;
      box-shadow: 2px 2px 5px rgba(233, 156, 46, 0.4);
    }

    .btn {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      background-color: #e99c2e;
      color: white;
      font-weight: bold;
      cursor: pointer;
      box-shadow: 2px 2px 5px rgba(233, 156, 46, 0.4);
      font-size: 1rem;
    }

    .btn:hover {
      background-color: #e99c2e;
    }

    .form-error {
      background-color: #f8d7da;
      color: #721c24;
      font-size: 0.9rem;
      padding: 5px 10px;
      border-radius: 5px;
      margin-bottom: 10px;
    }

    .form-exito {
      background-color: #d4edda;
      color: #155724;
      font-size: 1.2rem;
      padding: 5px 10px;
      border-radius: 5px;
      margin-bottom: 10px;
    }

    textarea {
      resize: none;
      form-sizing: content;
      min-height: 100px;
    }

    .grid {
      margin-top: 50px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      gap: 2rem 3rem;
      padding: 15px;
    }

    .card {
      padding: 15px 30px;
      border-radius: 15px;
      box-shadow: 10px 10px 30px rgb(233, 156, 46, 0.4);

    }

  </style>
</head>
<body>
  <header>
      <h1
        style="text-align: center;"
      >RECLAMOS</h1>
  </header>
  <main class="content">
    <div class="content-busqueda">
      <h2> Buscar </h2>
      <form action="mreclamos(RECL)/viewRECL.php" method="GET">
        <input type="text" name="search" class="form-control" placeholder="Buscar por nombre, correo, teléfono o reclamo" value="<?php echo $search; ?>">
        <button type="submit" class="btn">Buscar</button>
      </form>
    </div>
    <div class="grid">
      <?php while ( $row = $result->fetch_assoc() ) : ?>
      <div class="card">
        <h2> <?php echo $row['nombre']; ?> </h2>
        <p><?php echo $row['correo']; ?></p>
        <p><?php echo $row['telefono']; ?></p>
        <p><?php echo $row['reclamo']; ?></p>
      </div>
      <?php endwhile; ?>
      <?php if ( $result->num_rows === 0 ) : ?>
      <div class="card">
        <p>No se encontraron resultados</p>
      </div>
      <?php endif; ?>
    </div>
    
  </main>
</body>
</html>
