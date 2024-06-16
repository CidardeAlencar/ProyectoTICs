<?php
// Archivo cambiar_estado.php

// Conectarse a la base de datos (si no está ya conectado)
$conexion = mysqli_connect("localhost", "root", "", "users_crud_php");

// Verificar la conexión
if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Obtener los parámetros id y estado de la URL
$id = $_GET['id'];
$estado = $_GET['estado'];

// Actualizar el estado en la base de datos
$sql = "UPDATE evaluaciondesempeno SET estado = '$estado' WHERE id = '$id'";

if (mysqli_query($conexion, $sql)) {
    echo "Estado actualizado correctamente";
} else {
    echo "Error al actualizar el estado: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
