<?php

    require "conecta.php";
    $con=conecta();

    //Recive variables
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $correo = $_REQUEST['correo'];
    $pass = $_REQUEST['pass'];
    $rol = $_REQUEST['rol'];
    
    $archivo_n = $_FILES['archivo']['tmp_name'];
    $archivo = $_FILES['archivo']['name'];
    $cadena = explode(".",$archivo); 
    $ext  = $cadena[1]; 
    $dir  = "../Archivos/";
    $passEnc = md5($pass);
    $archivo_enc = md5_file($archivo_n);

    $fileName1 = "$archivo_enc.$ext";   //nuevo nombre de mi archivo
    copy($archivo_n,$dir.$fileName1);

    $sql = "INSERT INTO administradores(nombre,apellidos,correo,pass,rol,archivo_n,archivo)VALUES('$nombre','$apellidos',
        '$correo','$passEnc','$rol','$archivo_enc','$archivo');";
    $res = $con->query($sql);

    header("Location:../Administradores_lista.php");

?>