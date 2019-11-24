<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/Tareas.css">
    <link rel="icon" href="img/icon.png">
    <title>To-Do List</title>
</head>
<body>
<?php include '../controlador/controladorTarea.php'; ?>
    <section class="perfil">
        <div class="menu">
            <figure>
                <img src="img/logoblanco.png" class="logo" alt="logo">
            </figure>
            <figure>
                <img src="img/perfil.png" class="foto-perfil" alt="foto perfil">
            </figure>
            <p class="Nombre">Hola <strong><?php echo $_SESSION["usuario"]; ?>!</strong></p>
            <a href="" class="boton">Agregar tarea</a>
            <a href="" class="boton">Ver Lista de tareas</a>
            <a href="../modelo/cerrar-sesion.php" class="boton cerrar">Cerrar la sesión</a>
        </div>
    </section>
    <section class="task">
        <div class="fecha">
            <script src="js/main.js"></script>
        </div>
        <div class="div-nueva-tarea">
            <form action="" class="formulario" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="contenedor-mensaje-nueva">
                        <label for="Nueva-tarea">Nueva tarea</label>
                        <span class="mensaje-error"><?php echo $tarea_alerta; ?></span>
                    </div>
                    <input class="input-text" type="text" id="Nueva-tarea" placeholder="Nueva tarea" name="tarea">
                    <input class="enviar-tarea" type="submit"  value="+"><br>       
            </form>
        </div>
        <span class="mensaje-correcto"><?php echo $tarea_alerta2; ?></span><br>
    </section>
</body>
</html>