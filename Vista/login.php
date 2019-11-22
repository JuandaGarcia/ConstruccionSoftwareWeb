<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar sesión</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="css/LoginRegister.css">
</head>
<body>
    <?php include '../controlador/controladorLogin.php'; ?>
    <section class="seccion-imagen">
        <a href="../index.html" class="icon-cancel boton-salir"></a>
        <!-- <div class="texto">
            <h1>Hola</h1>
            <p>Bienvenido al sistema</p>
        </div> -->
    </section>
    <div class="seccion-formulario">
        <form class="formulario" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            
            <h1>Iniciar sesión</h1>

            <figure class="linea"></figure>

            <div class="contenedor-error">
            <span class="mensaje-error"><?php echo $error; ?></span>
            </div>
            <br>
            
            <div class="contenedor-error">
            <label for="Email">Email</label>
            <span class="mensaje-error"><?php echo $email_err; ?></span>
            </div>
            
            <input class="imput-text" type="email" id="Email" placeholder="Ingresa tu Email" name="email"><br>

            <div class="contenedor-error">
            <label for="password">Contraseña</label>
            <span class="mensaje-error"><?php echo $password_err; ?></span>
            </div>
            
            <input class="imput-text" type="password" id="password" placeholder="Ingresa tu contraseña" name="password">
    
            <p>¿No tienes cuenta? <a href="Register.php"><strong>Registrate aquí</strong></a></p>
    
            <input class="boton-iniciar" type="submit"  value="Iniciar Sesión">
        </form>
    </div>
</body>
</html>