<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/css/style.css">
    <title>Usuarios</title>
</head>

<style>
    .container {
        width: 90%;
        margin: auto;
        background-color: #f8f9fc;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        color: black;
        border-radius: 10px;
        margin-top: 3rem;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #e99c2e;
    }

    th {
        color: white;
        background-color: #e99c2e;
    }

    tbody tr:nth-child(even) {
        background-color: #d6a765;
    }

    .search-container {
        margin-bottom: 20px;
    }

    .search-container input[type=text] {
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        width: 100%;
    }

    .btn-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #searchInput {
    padding: 10px;
    border: none; 
    border-bottom: 1px solid white; /* Agrega solo una línea debajo */
    width: 200px;
    font-size: 1.2rem;
    font-family: 'Oswald', sans-serif;
    color: black;
    border-radius: 3px;
    background-color:#f8f9fc; /* Quita el fondo */
    outline: none; /* Elimina el contorno al hacer clic */
    }


/* Variation of work by @mrhyddenn for Radios */


.check {
  cursor: pointer;
  position: relative;
  margin: auto;
  width: 18px;
  height: 18px;
  -webkit-tap-highlight-color: transparent;
  transform: translate3d(0, 0, 0);
}

.check:before {
  content: "";
  position: absolute;
  top: -15px;
  left: -15px;
  width: 48px;
  height: 48px;
  border-radius: 50%;
  background: rgba(34, 50, 84, 0.03);
  opacity: 0;
  transition: opacity 0.2s ease;
}

.check svg {
  position: relative;
  z-index: 1;
  fill: none;
  stroke-linecap: round;
  stroke-linejoin: round;
  stroke: #c8ccd4;
  stroke-width: 1.5;
  transform: translate3d(0, 0, 0);
  transition: all 0.2s ease;
}

.check svg path {
  stroke-dasharray: 60;
  stroke-dashoffset: 0;
}

.check svg polyline {
  stroke-dasharray: 22;
  stroke-dashoffset: 66;
}

.check:hover:before {
  opacity: 1;
}

.check:hover svg {
  stroke: var(--accent-color, #a3e583);
}

#cbx2:checked + .check svg {
  stroke: var(--accent-color, #a3e583);
}

#cbx2:checked + .check svg path {
  stroke-dashoffset: 60;
  transition: all 0.3s linear;
}

#cbx2:checked + .check svg polyline {
  stroke-dashoffset: 42;
  transition: all 0.2s linear;
  transition-delay: 0.15s;
}

.editBtn {
  width: 3rem;
  height: 3rem;
  border-radius: 20%;
  border: none;
  background-color: darkgoldenrod;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.123);
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition: all 0.3s;
    transform: skew(0deg);
}
.editBtn::before {
  content: "";
  width: 200%;
  height: 200%;
  background-color: rgb(175, 147, 35);
  position: absolute;
  z-index: 1;
  transform: scale(0);
  transition: all 0.3s;
  border-radius: 50%;
  filter: blur(10px);
}
.editBtn:hover::before {
  transform: scale(1);
}
.editBtn:hover {
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.336);
}

.editBtn svg {
  height: 17px;
  fill: white;
  z-index: 3;
  transition: all 0.2s;
  transform-origin: bottom;
}


.button-container {
    display: flex;
    justify-content: center;
    align-items: flex-end;
    gap: 10px; 
}

h1{
    margin: 0;
    color: #5f5b57;
    font-size: 2.5rem;
    font-weight: 500;
}

button{
    width: 170px;
    height: 60px;
    line-height: 60px;
    border-radius: 1px;
    font-weight: 500;
    display: inline-block;
    margin-top: 34px;
    justify-content: center;
    align-items: flex-end;
    background: #e99c2e;
    border: 1px solid #e99c2e;
    white-space: nowrap;
    color: #fff;
    font-size: 1rem;
    font-weight: 500;
    text-transform: capitalize;
    border-radius: 3px;
}.bin-button {
  width: 3rem;
  height: 3rem;
  border-radius: 20%;
  border: none;
  background-color: #e91e63; /* Adjust to your specific red color */
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.123);
  cursor: pointer;
  position: relative;
  overflow: hidden;
}

.bin-button::before {
  content: "";
  width: 200%;
  height: 200%;
  background-color: red; /* Adjust to a slightly darker red */
  position: absolute;
  z-index: 1;
  transform: scale(0);
  transition: all 0.3s;
  border-radius: 50%;
  filter: blur(10px);
  display: flex;
  align-items: center;
  justify-content: center;
}

.bin-button:hover::before {
  transform: scale(1);
  display: flex;
  align-items: center;
  justify-content: center;
}

.bin-button:hover {
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.336);
  display: flex;
  align-items: center;
  justify-content: center;
}

.bin-button i.fas.fa-trash {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 17px;
  fill: white; /* Maintain white for visibility against red */
  z-index: 3;
}

</style>

<body>
    <div class="container">
        <h1>Bienvenido Administrador</h1><br>
        <h1>Lista de usuarios</h1>
        <br>
        <div class="btn-container">
            <div>
                <button type="button" onclick="window.location.href= 'mgestionUsuarios(GUSU)/registro_user.php' " >Nuevo usuario <i class="fa fa-plus"></i></button>
            </div>
            <div>
                <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Buscar...">
            </div>
        </div>
        <br><br>
        <table id="userTable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $SQL = "SELECT * FROM user";
                $dato = mysqli_query($conexion, $SQL);

                if ($dato->num_rows > 0) {
                    while ($fila = mysqli_fetch_array($dato)) {
                        ?>
                        <tr>
                            <td><?php echo $fila['nombre']; ?></td>
                            <td><?php echo $fila['apPAt'], " ", $fila['apMAt']; ?></td>
                            <td><?php echo $fila['correo']; ?></td>
                            <td><?php echo $fila['telefono']; ?></td>
                            <td><?php echo $fila['rol']; ?></td>
                            <?php if ($fila['rol'] == 'admin') { ?>
                                <td>
                                    <center>
                                        <button class="editBtn" onclick="window.location.href = 'mgestionUsuarios(GUSU)/edit_user.php?id=<?php echo $fila['id']; ?>'">
                                            <svg height="1em" viewBox="0 0 512 512">
                                                <path
                                                d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"
                                                ></path>
                                            </svg>
                                        </button>
                                    </center>
                                </td>
                                <td><center><a><i class="fa fa-check" style="color:black;"></i></a></center>
                                </td>
                            <?php } else if ($fila['rol'] == 'user') { ?>
                                <td>
                                    <center>
                                        <div class="button-container">
                                            <button class="editBtn" onclick="window.location.href = 'mgestionUsuarios(GUSU)/edit_user.php?id=<?php echo $fila['id']; ?>'">
                                                <svg height="1em" viewBox="0 0 512 512">
                                                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                                                </svg>
                                            </button>
                                            <a href="mgestionUsuarios(GUSU)/eliminar_user.php?id=<?php echo $fila['id']; ?>" class="bin-button">
    <i class="fas fa-trash"></i>
</a>
                                        </div>
                                    </center>
                                </td>

                                <td>
                                    <center>
                                        <input type="checkbox" class="estado-checkbox" id="cbx2" style="display: none;" data-userid="<?php echo $fila['id']; ?>" <?php echo ($fila['estado'] == 1) ? 'checked' : ''; ?>>
                                        <label for="cbx2" class="check">
                                            <svg width="18px" height="18px" viewBox="0 0 18 18">
                                                <path d="M 1 9 L 1 9 c 0 -5 3 -8 8 -8 L 9 1 C 14 1 17 5 17 9 L 17 9 c 0 4 -4 8 -8 8 L 9 17 C 5 17 1 14 1 9 L 1 9 Z"></path>
                                                <polyline points="1 9 7 14 15 4"></polyline>
                                            </svg>
                                        </label>
                                    </center>
                                </td>
                            <?php } ?>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr class="text-center">
                        <td colspan="7">No existen registros</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>





        
    </div>
</body>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userId'], $_POST['newState'])) {
    include '../includes/_db.php';

    $userId = mysqli_real_escape_string($conexion, $_POST['userId']);
    $newState = mysqli_real_escape_string($conexion, $_POST['newState']);

    $sql = "UPDATE user SET estado = '$newState' WHERE id = '$userId'";
    if (mysqli_query($conexion, $sql)) {
        echo 'Éxito'; 
    } else {
        echo 'Error'; 
    }

    mysqli_close($conexion);
}
?>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var checkboxes = document.querySelectorAll('.estado-checkbox');

        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                var userId = this.getAttribute('data-userid');
                var newState = this.checked ? 1 : 0;

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // La solicitud fue exitosa
                            console.log('Estado actualizado correctamente.');
                        } else {
                            // Error al actualizar el estado
                            console.error('Error al actualizar el estado.');
                        }
                    }
                };
                xhr.open('POST', '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('userId=' + userId + '&newState=' + newState);
            });
        });
    });
</script>


<script>



    function filterTable() {
        var input, filter, table, tr, td, i, j, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("userTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            if (tr[i].parentNode.nodeName === 'THEAD') {
                continue; // Ignorar las filas de la cabecera
            }
            txtValue = "";
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
                txtValue += td[j].textContent || td[j].innerText;
            }
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
</script>

</html>