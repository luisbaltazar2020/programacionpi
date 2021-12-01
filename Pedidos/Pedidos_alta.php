<?php
    session_start();
    $varsesion =$_SESSION['nombre'];
    if($varsesion==null||$varsesion==''){
        header("Location:Index.php");
    }
    else{
        $name = $_SESSION['nombre'];
    }
?>
<html>
    <head>
        <title>Listado de Productos</title>
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script>
            function cerrarsesion(){
                window.location.href="../cerrar.php";
            }
            function bienvenido(){
                window.location.href="../bienvenido.php";
            }
            function administradores(){
                window.location.href="../Administradores/Administradores_lista.php";
            }
            function productos(){
                window.location.href="../Productos/Productos_lista.php";
            }
            function baners(){
                window.location.href="../Baners/Banners_lista.php";
            }
            function pedidos(){
                window.location.href="../Pedidos/Pedidos_lista.php";
            }
            function validacion(id){
                var fecha=document.forma01.fecha.value;
                var cantidad=document.forma01.cantidad.value;
                if(id&&cantidad&&fecha!=0){
                    document.forma01.method='post'
                    document.forma01.action='funciones/pedidossalva.php?idprod='+id;
                    document.forma01.submit();
                }
                else{
                    $('#mensaje').html('Error (Faltan campos por llenar)');
                    setTimeout("$('#mensaje').html('');",5000);
                }
            }
            function finalizar(){
                window.location.href="./funciones/finalizar.php";
            }
        </script>
        <style>
        .titulo{
                height: 30px;
                width: auto;
                border: 1px solid black;
                text-align: center;
                background-color: lightgreen;
            }
        .fila{
            height: 30px;
                width: 700px;
                border: 1px solid black;
                text-align: center;
                margin-left: auto;
                margin-right: auto;  
                background-color: lightgreen;
        }
        .id{
            float: left;
            border: 1px solid black;
            text-align:center;
            height: 30px;
            width:30px;
            background-color:green;
        }
        .Tabla{
            height: auto;
            width: 940px;
            border: 1px solid black;
            margin-left: auto;
            margin-right: auto;
            background-color:lightblue;
        }
        .na{
            float: left;
            border: 1px solid black;
            text-align:center;
            height: 30px;
            width: 100px;
        }
        .correo{
            float: left;
            border: 1px solid black;
            text-align:center;
            height: 30px;
            width: 250px;
        }
        .rol{
            float:left;
            border: 1px solid black;
            text-align:center;
            height: 30px;
            width: 94PX;
        }
        .botones{
            float:left;
            border:1px solid black;
            text-align:center;
            height: 30px;
            width: 300px;
        }
        .menup{
                height: 32px;
                width: 874px;
                border: 1px solid black;
                margin-left: auto;
                margin-right: auto;
                background-color:lightblue;
            }
            .nombre{
                height: 30px;
                width: 280px;
                border: 1px solid black;
                background-color:lightgreen;
                float: left;
                text-align: center;
            }
            .cerrar{
                height: 30px;
                width: 90px;
                border: 1px solid black;
                background-color:lightgreen;
                float: left;
                margin-left:10px;
            }
            .boton{
                background-color: lightgreen;
                width: 90px;
                height: 30px;
            }
            .Inicio{
                float: left;
                height: 30px;
                width: 80px;
                border: 1px solid black;
                background-color:lightgreen;
                margin-right:10px;
            }
            .botoni{
                background-color: lightgreen;
                width: 80px;
                height: 30px;
            }
            .administradores{
                float:left;
                border: 1px solid black;
                margin-right:10px;
            }
            .botona{
                background-color: lightgreen;
                width: 110px;
                height: 30px;
            }
            .productos{
                float:left;
                border: 1px solid black;
                margin-right:10px;
            }
            .botonp{
                background-color: lightgreen;
                width: 80px;
                height: 30px;
            }
            .baners{
                float:left;
                border: 1px solid black;
                margin-right:10px;
            }
            .pedidos{
                float:left;
                border: 1px solid black;
                margin-right:10px;
            }
            .botonm{
                float:left;
            }
        </style> 
    </head>
    
    <body>
    <div class='Menup'>
            <div class='Inicio'>
            <input type="button" class='botoni' value="Inicio" onclick="bienvenido();">
            </div>

            <div class='administradores'>
            <input type="button" class='botona' value="Administradores" onclick="administradores();">
            </div>

            <div class='productos'>
            <input type="button" class='botonp' value="Productos" onclick="productos();">
            </div>

            <div class='baners'>
            <input type="button" class='botoni' value="Baners" onclick="baners();">
            </div>

            <div clasS='pedidos'>
            <input type="button" class='botoni' value="Pedidos" onclick="pedidos();">
            </div>

            <div class='nombre'>Bienvenido <?php echo $name;?> </div>

            <div class='cerrar'>
            <input type="button" class='boton' value="Cerrar sesion" onclick="cerrarsesion();">
            
            </div>
        </div><br>
        <button onclick="window.location.href='../menu.php'">Regresar al menu</button><br><br>
        Alta Pedidos
        <div id="mensaje" style="color:#F00;font-size:16px;"></div>
        <?php
            require "Funciones/conecta.php";
            $con = conecta();
            $ida =$_SESSION['idU'];

        echo"<form name='forma01'>";
            echo"<input type='date' name='fecha'>";
            echo"<select name='cantidad'>";
           echo"<option value='0' selected>Cantidad</option>";
           for($i=1;$i<5000;$i++){
               echo "<option value = '$i'>$i</option>";
           }
       echo"</select>";
        echo"</form>";
        $sql = "SELECT * FROM Productos WHERE status=1 AND eliminado=0";
        $res = $con->query($sql);
        $cont =1;

        while($row=$res->fetch_array()){
            $id = $row["id"];
            $nombre = $row["nombre"];
            $codigo = $row["codigo"];
            $descripcion = $row["descripcion"];
            $costo = $row["costo"];
            echo"<div class='fila' id=$id>";
            echo"<div class='id'>$cont</div>";
            echo"<div class='na'>$nombre</div>";
            echo"<div class='na'>$codigo</div>";
            echo"<div class='rol'>$costo</div>";
            echo"<div class='botones'>";
           echo"<input onclick='validacion($id);' type='submit' value='Enviar' /> ";
           echo"</div>";
           echo "</div>";
           $cont++;
        }
        ?>
        <button onclick="finalizar();">Finalizar pedido</button>
    </body>
</html>