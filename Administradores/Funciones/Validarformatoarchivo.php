<?php
$file_name = $_FILES['archivo']['name'];
$cadena = explode(".",$file_name);
$ext  = $cadena[1];
$band=0;
if($ext=='png'||$ext=='jpg'){
    $band=1;
}
echo $band;
?>