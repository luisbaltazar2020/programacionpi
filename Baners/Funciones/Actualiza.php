<?php
    require "conecta.php";
    $con=conecta();

    $nombre = $_REQUEST['nombre'];
    $id=$_REQUEST['id'];

    $archivo = $_FILES['archivo']['name'];
    

    if($archivo!=''){
    $archivo_n = $_FILES['archivo']['tmp_name'];
    $cadena = explode(".",$archivo); 
    $ext  = $cadena[1]; 
    $dir  = "../Archivos/";
    $archivo_enc = md5_file($archivo_n);
    
    $fileName1 = "$archivo_enc.$ext";   //nuevo nombre de mi archivo
    copy($archivo_n,$dir.$fileName1);
        $sql = "UPDATE banners Set nombre='$nombre',archivo='$archivo_enc' where id=$id;";
        $res = $con->query($sql);
    }
    else{
        $sql = "UPDATE banners Set nombre='$nombre' where id=$id;";
        $res = $con->query($sql);
    }

    header("Location:../Banners_lista.php");

?>