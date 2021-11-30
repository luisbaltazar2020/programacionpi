<?php
require "conecta.php";
$con=conecta();
$usuario = $_REQUEST['user'];
$passw = $_REQUEST['pass'];
$passw = md5($passw);
$ban=0;

$sql = "Select * from administradores where correo = '$usuario' and pass = '$passw'and status= 1 and eliminado =0;";
$res = $con->query($sql);
$num = $res->num_rows;

if($num>0){
    $activa=1;
    $ban=1;
    $row =$res->fetch_array();
    $idU = $row["id"];
    $nombre = $row["nombre"].' '.$row["apellidos"];
    $correo = $row["correo"];
    session_start();
    $_SESSION['idU']= $idU;
    $_SESSION["nombre"]=$nombre;
    $_SESSION["correo"]=$correo;
}
echo $ban;
?> 