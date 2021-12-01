<?php
    require "conecta.php";
    $con=conecta();
    session_start();
    //variables
    $band=0;
    $cont=0;
    $ida =$_SESSION['idU'];
    $name=$_SESSION['nombre'];
    $fecha=$_REQUEST['fecha'];
    $cantidad=$_REQUEST['cantidad'];
    $idprod=$_REQUEST['idprod'];

    $sql="SELECT  * FROM `pedidos` WHERE usuario='$name'";
    $res = $con->query($sql);
    $row=$res->fetch_array();
    $idped=$row['id'];
    
    $sql="SELECT * FROM `productos` WHERE id=$idprod";
    $res = $con->query($sql);
    $row=$res->fetch_array();
    $costo=$row['costo'];

    //consulta para saber si ya tenemos pedidos abiertos
    $sql="SELECT  * FROM `pedidos` WHERE usuario='$name'";
    $res = $con->query($sql);
    while($row=$res->fetch_array()){
        if($row['status']==0)
            $cont++;
    }
    
    if($cont==0){
        $sql = "INSERT INTO `pedidos`(`fecha`, `usuario`) VALUES ('$fecha','$name')";
        $res = $con->query($sql);
        $sqla = "SELECT * FROM `pedidos` WHERE usuario='$name'";
        $resa = $con->query($sqla);
        $row=$resa->fetch_array();
        $idpedido=$row['id'];
        $sql="INSERT INTO `pedidos_productos`(`id_pedido`, `id_producto`, `cantidad`, `precio`) 
        VALUES ($idpedido,$idprod,$cantidad,$costo)";
        $res = $con->query($sql);
    }
    else{
        //validar si tenemos algun producto repetido
        $sqla = "SELECT * FROM `pedidos` WHERE usuario='$name'";
        $resa = $con->query($sqla);
        $row=$resa->fetch_array();
        $idpedido=$row['id'];
        $sql="SELECT * FROM `pedidos_productos` WHERE id_pedido=$idpedido";
        $res = $con->query($sql);
        //validacion si hay mas de un producto igual
        while($row=$res->fetch_array()){
            if($row['id_producto']==$idprod){
                $band++;
            }
        }
        if($band>0){
            $sql="SELECT cantidad FROM `pedidos_productos` WHERE id_pedido=$idpedido and id_producto=$idprod";
            $res = $con->query($sql);
            $row2=$res->fetch_array();
            $cantidadde = $row2['cantidad'];
            //Actualizamos
            $cantidad+=$cantidadde;
            $sql="UPDATE `pedidos_productos` SET `cantidad`=$cantidad WHERE id_pedido=$idpedido and id_producto=$idprod";
            $res = $con->query($sql);
        }
        else{
            //crear nuevo pedidos_productos por que no se repite
            $sql="INSERT INTO `pedidos_productos`(`id_pedido`, `id_producto`, `cantidad`, `precio`) 
            VALUES ($idpedido,$idprod,$cantidad,$costo)";
            $res = $con->query($sql);
        }
   }
   header("Location:../Pedidos_alta.php");
?>