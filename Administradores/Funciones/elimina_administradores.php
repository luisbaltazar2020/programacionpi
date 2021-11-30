<?php
    require "./conecta.php";
    $con = conecta();

    $id = $_REQUEST['id'];
    //$sql = "DELETE FROM administradores WHERE id=$id";
    $sql = "UPDATE administradores SET eliminado=1 WHERE id=$id";
    $res = $con->query($sql);

    header("Location: Lista.php");
?>