<?php

// Incluir archivo de conexion a la base de datos
require_once "conexion.php";

$id_usuario = $_SESSION["id"];


$tareas_usuario = mysqli_query($link, "SELECT * FROM tareas WHERE usuario = $id_usuario");

if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    mysqli_query($link, "DELETE FROM tareas WHERE id = $id");
    header('location: ../vista/tareaslista.php');
}

?>