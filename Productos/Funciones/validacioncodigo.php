<?php
require "conecta.php";
$con=conecta();
$codigo = $_REQUEST['codigo'];
$sql = "SELECT *from productos where status=1 and eliminado=0";
$res = $con->query($sql);
$ban=1;
while($row=$res->fetch_array()){
    if($row['codigo']==$codigo){
        $ban=0;
    }
}
echo $ban;
?>