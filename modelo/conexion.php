<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'Webcs');

    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    if($link === false){
        //die("No se pudo conectar a la base da datos" . mysqli_connect_error());
    }
    else{
        //echo 'Conexion Exitosa';
    }
?>