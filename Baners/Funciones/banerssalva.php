<?php

    require "conecta.php";
    $con=conecta();

    //Recive variables
    $nombre = $_REQUEST['nombre'];

    $archivo = $_FILES['archivo']['name'];
    $archivo_n = $_FILES['archivo']['tmp_name'];
    $cadena = explode(".",$archivo); 
    $ext  = $cadena[1]; 
    $dir  = "../Archivos/";
    $archivo_enc = md5_file($archivo_n);
    
    $fileName1 = "$archivo_enc.$ext";   //nuevo nombre de mi archivo
    copy($archivo_n,$dir.$fileName1);
    
    $sql = "INSERT INTO banners(`nombre`, `archivo`)VALUES('$nombre','$archivo_enc');";
    $res = $con->query($sql);

    header("Location:../Baners_alta.php");

?>
