<?php
    session_start();
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: ../vista/tareas.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrarse</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/LoginRegister.css">
    <link rel="icon" href="img/icon.png">
</head>
<body>
    <?php include '../controlador/controladorRegistro.php'; ?>
    <section class="seccion-imagen">
        <a href="../index.html" class="icon-cancel boton-salir"></a>
        <!-- <div class="texto">
            <h1>Hola</h1>
            <p>Bienvenido al sistema</p>
        </div> -->
    </section>
    <div class="seccion-formulario seccion-formulario-register">
        <form class="formulario formulario-register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            
            <h1>Registrarse</h1>

            <figure class="linea"></figure>

            <div class="contenedor-error">
            <label for="Nombre">Nombre completo</label>
            <span class="mensaje-error"><?php echo $username_err; ?></span>
            </div>
            
            <input class="imput-text imput-text-register" type="text" id="Nombre" placeholder="Nombre completo" name="username">
            <br>

            <div class="contenedor-error">
            <label for="Email">Email</label>
            <span class="mensaje-error"><?php echo $email_err; ?></span>
            </div>

            <input class="imput-text imput-text-register" type="email" id="Email" placeholder="Email" name="email">
            <br>

            <div class="contenedor-error">
            <label for="password">Contraseña</label>
            <span class="mensaje-error"><?php echo $password_err; ?></span>
            </div>

            <input class="imput-text imput-text-register" type="password" id="password" placeholder="Contraseña" name="password">
            
            <p>¿Ya tienes una cuenta? <a href="login.php"><strong>Inicia sesión aquí</strong></a></p>
    
            <input class="boton-iniciar" type="submit"  value="Registrarse">
        </form>
    </div>
</body>
</html>