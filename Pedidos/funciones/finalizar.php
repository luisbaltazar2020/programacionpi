<?php
     require "conecta.php";
     $con=conecta();
     session_start();
     $name=$_SESSION['nombre'];
     $sql="UPDATE `pedidos` SET `status`=1 WHERE usuario='$name'";
     $res = $con->query($sql);
     header("Location:../Pedidos_lista.php");
?>
