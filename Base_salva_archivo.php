<?php
$file_name = $_FILES['archivo']['name']; //nombre real del archivo  
$file_tmp =  $_FILES['archivo']['tmp_name']; //nombre temporal del archivo
$cadena = explode(".",$file_name); //separa el nombre para tener la extension
$ext  = $cadena[1];                //Extension
$dir  = "Archivos/";                //carpeta donde se guardaran
$file_enc = md5_file($file_tmp);  //Nombre del archivo encriptado

echo "file_name: $file_name <br>";
echo "file_tmp:  $file_tmp  <br>";
echo "ext:       $ext       <br>";
echo "file_enc:  $file_enc  <br>";

if($file_name != ''){
    $fileName1 = "$file_enc.$ext";   //nuevo nombre de mi archivo
    copy($file_tmp,$dir.$fileName1);
}

?>