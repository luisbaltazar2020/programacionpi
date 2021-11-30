<?php
require "conecta.php";
$con=conecta();
//Recive variables
$nombre = $_REQUEST['nombre'];
$codigo = $_REQUEST['codigo'];
$description = $_REQUEST['description'];
$costo = $_REQUEST['costo'];
$stock = $_REQUEST['stock'];

$archivo_n = $_FILES['archivo']['tmp_name'];
$archivo = $_FILES['archivo']['name'];
$cadena = explode(".",$archivo); 
$ext  = $cadena[1]; 
$dir  = "../Archivos/";
$archivo_enc = md5_file($archivo_n);

$fileName1 = "$archivo_enc.$ext";   //nuevo nombre de mi archivo
copy($archivo_n,$dir.$fileName1);

$sql = "INSERT INTO productos(nombre,codigo,descripcion,costo,stock,archivo_n,archivo)VALUES('$nombre','$codigo',
    '$description','$costo','$stock','$archivo_enc','$archivo');";
$res = $con->query($sql);

header("Location:../productos_lista.php");

?>

?>