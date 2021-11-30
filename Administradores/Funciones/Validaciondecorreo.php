<?php
 require "conecta.php";
 $con = conecta();
 $correo = $_REQUEST['correo'];
 $sql = "SELECT * FROM administradores WHERE status=1 AND eliminado=0";
 $res = $con->query($sql);
 $ban=1;
 if($row=$res->fetch_array()==false){
   echo $ban;  
 }
 else{
     while($row=$res->fetch_array()){
    if($row['correo']==$correo){
       $ban=0; 
    }
}
echo $ban;
 }


?>