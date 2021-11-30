<?php
    require "conecta.php";
    $con=conecta();

    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $correo = $_REQUEST['correo'];
    $rol = $_REQUEST['rol'];
    $id=$_REQUEST['id'];
    $pass=$_REQUEST['password'];

    $archivo_n = $_FILES['archivo']['tmp_name'];
    $archivo = $_FILES['archivo']['name'];

    $cadena = explode(".",$archivo); 
    $dir  = "../Archivos/";
    $archivo_enc = md5_file($archivo_n);
    $ext  = $cadena[1];
    $fileName1 = "$archivo_enc.$ext";
    copy($archivo_n,$dir.$fileName1);
    echo"$archivo<br>";
    echo"$archivo_enc<br>";

    if($archivo!=''){
        $sql = "UPDATE administradores Set archivo_n='$archivo_enc',archivo='$archivo' where id=$id;";
        $res = $con->query($sql);
    }

    if($pass!=''){
        $passEnc = md5($pass);
        $sql = "UPDATE administradores Set nombre='$nombre', apellidos='$apellidos', correo='$correo', pass='$passEnc', rol='$rol' where id=$id;";
    }
    else{
        $sql = "UPDATE administradores Set nombre='$nombre', apellidos='$apellidos', correo='$correo', rol='$rol' where id=$id;";
    }
    
    $res = $con->query($sql);

    header("Location:../Administradores_lista.php");

?>