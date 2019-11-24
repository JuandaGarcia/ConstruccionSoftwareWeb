<?php
    
    // Incluir archivo de conexion a la base de datos
    require_once "conexion.php";
    
    // Definir variable e inicializar con valores vacio
    $username = $email = $password = $password2 = "";
    $username_err = $email_err = $password_err = $password2_err = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        // VALIDANDO INPUT DE NOMBRE DE USUARIO
        if(empty(trim($_POST["username"]))){
            $username_err = "Por favor, ingrese un nombre";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM usuarios WHERE NombreUsuario = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                $param_username = trim($_POST["username"]);
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    $username = trim($_POST["username"]);
                    
                }else{
                    echo "Ups! Algo salió mal, inténtalo mas tarde";
                }
            }
        }
        
        
        // VALIDANDO INPUT DE EMAIL
        if(empty(trim($_POST["email"]))){
            $email_err = "Por favor, ingrese un correo";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM usuarios WHERE email = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_email);
                
                $param_email = trim($_POST["email"]);
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $email_err = "Este correo ya está en uso";
                    }else{
                        $email = trim($_POST["email"]);
                    }
                }else{
                    echo "Ups! Algo salió mal, inténtalo mas tarde";
                }
            }
        }
        
        
        // VALIDANDO CONTRASEÑA
        if(empty(trim($_POST["password"]))){
            $password_err = "Por favor, ingrese una contraseña";
        }elseif(strlen(trim($_POST["password"])) < 8){
            $password_err = "debe de tener al menos 8 caracteres";
        } else{
            $password = trim($_POST["password"]);
        }
        
        
        // COMPROBANDO LOS ERRORES DE ENTRADA ANTES DE INSERTAR LOS DATOS EN LA BASE DE DATOS
        if(empty($username_err) && empty($email_err) && empty($password_err)){
            
            $sql = "INSERT INTO usuarios (NombreUsuario, email, contraseña) VALUES (?, ?, ?)";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);
                
                // ESTABLECIENDO PARAMETRO
                $param_username = $username;
                $param_email = $email;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // ENCRIPTANDO CONTRASEÑA
                
                
                if(mysqli_stmt_execute($stmt)){
        
                    $sql = "SELECT id, NombreUsuario, email, contraseña FROM usuarios WHERE email = ?";
        
                    if($stmt = mysqli_prepare($link, $sql)){
            
                        mysqli_stmt_bind_param($stmt, "s", $param_email);
            
                        $param_email = $email;
            
                        if(mysqli_stmt_execute($stmt)){
                            mysqli_stmt_store_result($stmt);
                        }
            
                        if(mysqli_stmt_num_rows($stmt) == 1){
                            mysqli_stmt_bind_result($stmt, $id, $usuario, $email, $hashed_password);
                
                            if(mysqli_stmt_fetch($stmt)){

                                if(password_verify($password, $hashed_password)){
                                    session_start();
                        
                                    // ALMACENAR DATOS EN VARABLES DE SESION
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["id"] = $id;
                                    $_SESSION["email"] = $email;
                                    $_SESSION["usuario"] = $usuario;
                        
                                    header("location: ../vista/tareas.php");
                                }else{
                                    $error = "*El correo electrónico y la contraseña que ingresaste no coinciden con nuestros registros. Por favor, revisa e inténtalo de nuevo.";
                                }
                            } 
                        }else{
                                $error = "El correo electrónico y la contraseña que ingresaste no coinciden con nuestros registros. Por favor, revisa e inténtalo de nuevo.";
                            }
                    }else{
                            echo "UPS! algo salio mal, intentalo mas tarde";
                        }
                }else{
                    echo "Algo Salio mal, intentalo despues";
                }
            }
        }
        
        mysqli_close($link);
        
    }

?>