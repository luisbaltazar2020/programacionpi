<?php
    require "conecta.php";
    $con=conecta();

    $nombre = $_REQUEST['nombre'];
    $codigo = $_REQUEST['codigo'];
    $description = $_REQUEST['description'];
    $costo = $_REQUEST['costo'];
    $id=$_REQUEST['id'];
    $stock =$_REQUEST['stock'];

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
        $sql = "UPDATE productos Set archivo_n='$archivo_enc',archivo='$archivo' where id=$id;";
        $res = $con->query($sql);
    }
        $sql = "UPDATE productos Set nombre='$nombre', codigo='$codigo', descripcion='$description', costo='$costo',stock='$stock' where id=$id;";
    $res = $con->query($sql);

    header("Location:../Productos_lista.php");

?>