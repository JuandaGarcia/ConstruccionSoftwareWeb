<?php

// Incluir archivo de conexion a la base de datos
require_once "conexion.php";

$usuario = $_SESSION["id"];
$texto = "";
$estado = true;
$tarea_alerta = $tarea_alerta2 = "";
$puede_enviar = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // VALIDANDO INPUT DE NOMBRE DE USUARIO
    if(empty(trim($_POST["tarea"]))){
        $tarea_alerta = "Por favor, ingrese una tarea en el campo";
    }else{
        $texto = trim($_POST["tarea"]);
        $puede_enviar = true;
    }
}


if(empty($tarea_alerta) && $puede_enviar == true){

    $sql = "INSERT INTO tareas (texto, estado, usuario) VALUES (?, ?, ?)";
            
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "sii", $param_texto, $param_estado, $param_usuario);
                
        // ESTABLECIENDO PARAMETRO
        $param_texto = $texto;
        $param_estado = $estado;  
        $param_usuario = $usuario;    
        
        
        if(mysqli_stmt_execute($stmt)){
            $tarea_alerta2 = "Tarea añadida correctamente";
        }else{
            echo "Algo Salio mal, intentalo despues";
        }
    }
    $puede_enviar = false;
}

mysqli_close($link);
?>