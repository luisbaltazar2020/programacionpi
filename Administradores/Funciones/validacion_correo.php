<?php
 require "conecta.php";
 $con = conecta();
 $correo = $_REQUEST['correo'];
 $id = $_REQUEST['id'];
 $sql2 ="SELECT correo From administradores where id=$id;";
 $res2=$con->query($sql2);
 $ban=1;
 $row2=$res2->fetch_array();

 if($row2['correo']==$correo){
     echo"$ban";
 }
 else{
     $sql = "SELECT * FROM administradores WHERE status=1 AND eliminado=0";
    $res = $con->query($sql);
 
    while($row=$res->fetch_array()){ 
        if($row['correo']==$correo){
       $ban=0; 
        }
    }
    echo $ban;
 }
 
?>