<?php
 require "conecta.php";
 $con = conecta();
 $codigo = $_REQUEST['codigo'];
 $id = $_REQUEST['id'];
 $sql ="SELECT codigo From productos where id=$id;";
 $res=$con->query($sql);
 $ban=1;
 $row=$res->fetch_array();

 if($row['codigo']==$codigo){
     echo"$ban";
 }
 else{
     $sql = "SELECT * FROM productos WHERE status=1 AND eliminado=0";
    $res = $con->query($sql);
 
    while($row=$res->fetch_array()){ 
        if($row['codigo']==$codigo){
       $ban=0; 
        }
    }
    echo $ban;
 }
 
?>