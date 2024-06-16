<?php
require_once( dirname( __FILE__ ) . '/../connection.php' );

$error = '';

$exito = $_GET['exito'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $connect = connection();
  $nombre = $_POST['nombre'] ?? '';
  $correo = $_POST['correo'] ?? '';
  $telefono = $_POST['telefono'] ?? '';
  $reclamo = $_POST['reclamo'] ?? '';

  if ( empty($nombre) || empty($correo) || empty($telefono) || empty($reclamo) ) {
    $error = 'Todos los campos son obligatorios';
  }

  if ( empty($error) ) {
    try {

      $stmt = $connect->prepare( "
        INSERT INTO reclamos (nombre, correo, telefono, reclamo)
        VALUES (?, ?, ?, ?)
        " );

      $stmt->bind_param( "ssss", $nombre, $correo, $telefono, $reclamo );
      $stmt->execute();
      $stmt->close();

      $exito = true;

    } catch ( Exception $e ) {
      $error = 'Ocurrió un error al enviar el reclamo' . $e->getMessage();
    }
  }
}

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

  </style>
</head>
<body>
  <header>
    <h1>RECLAMOS</h1>
  </header>
  <main class="content">
    <?php if ( $exito ) : ?>
      <div class="form-exito">
        <p>Reclamo enviado con éxito</p>
      </div>
    <?php endif; ?>
    <form class="formulario" action="index.php?mod=18" method="POST">
        <div class="form-group">
          <h2> Ingrese su reclamo </h2>
        </div>
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            placeholder="Ingrese su nombre"
            name="nombre"
          >
        </div>
        <div class="form-group">
          <input type="email" class="form-control" placeholder="Ingrese su correo" name="correo">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Ingrese su teléfono" name="telefono">
        </div>
        <div class="form-group">
          <textarea class="form-control" placeholder="Ingrese su reclamo" name="reclamo"></textarea>
        </div>
        <?php if ( !empty($error) ) : ?>
        <div class="form-error">
          <span> 
          <?= $error ?>
          </span>
        </div>
        <?php endif; ?>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
  </main>
</body>
</html>
