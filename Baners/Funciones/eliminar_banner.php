<?php
    require "conecta.php";
    $con = conecta();
    $id = $_REQUEST['id'];
    $sql = "UPDATE banners SET eliminado=1 WHERE id=$id";
    $res = $con->query($sql);
    echo $res;
?>