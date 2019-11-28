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
<?php include '../controlador/controladorMostrar.php'; ?>
    <section class="perfil">
        <div class="menu">
            <figure>
                <img src="img/logoblanco.png" class="logo" alt="logo">
            </figure>
            <figure>
                <img src="img/perfil.png" class="foto-perfil" alt="foto perfil">
            </figure>
            <p class="Nombre">Hola <strong><?php echo $_SESSION["usuario"]; ?>!</strong></p>
            <a href="tareas.php" class="boton">Agregar tarea</a>
            <a href="tareaslista.php" class="boton">Ver Lista de tareas</a>
            <a href="../modelo/cerrar-sesion.php" class="boton cerrar">Cerrar la sesión</a>
        </div>
    </section>
    <section class="task">
        <div class="fecha">
            <script src="js/main.js"></script>
        </div>
        <div class="div-nueva-tarea">
            <div class="tareaslista">
                <table>
                    <?php    
                    $vacio = 0;
                    while($row = mysqli_fetch_array($tareas_usuario)){ 
                        $vacio ++;    
                    ?>
                        <tr>
                            <td>
                                • <?php echo $row['texto']?> 
                                <a class="eliminar" href="tareaslista.php?eliminar=<?php echo $row['id'];?>">x</a>
                            </td>
                        </tr>
                    <?php } if ($vacio===0) { ?>
                        <a class="mas" href="tareas.php">
                            <?php echo "+ Añadir una tarea"; ?>
                        </a>
                            <?php }
                    ?>
                </table>
            </div>
        </div>
    </section>
</body>
</html>