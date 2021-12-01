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
        </script>
        <style>
            .menup{
                height: 32px;
                width: 874px;
                border: 1px solid black;
                margin-left: auto;
                margin-right: auto;
                background-color:lightblue;
            }
            .Inicio{
                float: left;
                height: 30px;
                width: 80px;
                border: 1px solid black;
                background-color:lightgreen;
                margin-right:10px;
            }
            .administradores{
                float:left;
                border: 1px solid black;
                margin-right:10px;
            }
            .productos{
                float:left;
                border: 1px solid black;
                margin-right:10px;
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
            .botoni{
                background-color: lightgreen;
                width: 80px;
                height: 30px;
                float:left;
            }
            .botona{
                background-color: lightgreen;
                width: 110px;
                height: 30px;
            }
            .botonp{
                background-color: lightgreen;
                width: 80px;
                height: 30px;
            }
            .fila{
                background-color:lightgreen;
                height: 30px;
                border: 1px solid black;
                width: 410px;
                margin-right: auto;
                margin-left: auto;
            }
            .id{
            float: left;
            border: 1px solid black;
            text-align:center;
            height: 30px;
            width:30px;
            background-color:green;
        }
        .name{
            float: left;
            border: 1px solid black;
            text-align:left;
            height: 30px;
            width: 200px;
        }
        .cantidad{
            float: left;
            border: 1px solid black;
            text-align:left;
            height: 30px;
            width: 70px;
        }
        .costo{
            float: left;
            border: 1px solid black;
            text-align:left;
            height: 30px;
            width: 50px;
        }
        .total{
            float: left;
            border: 1px solid black;
            text-align:left;
            height: 30px;
            width: 50px;
        }
        .fila2{
            background-color:lightgreen;
                height: 30px;
                border: 1px solid black;
                width: 410px;
                margin-right: auto;
                margin-left: auto;
                text-align: right;
        }
        .boton{
                background-color: lightgreen;
                width: 90px;
                height: 30px;
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
        <button onclick="window.location.href='./Pedidos_lista.php'">Regresar al listado</button><br><br>
        <div class='fila'>
            <div class='id'>ID</div>
            <div class='name'>Nombre</div>
            <div class='cantidad'>Cantidad</div>
            <div class='costo'>Costo</div>
            <div class='total'>Total</div>
        </div>
        <?php
            require "./funciones/conecta.php";
            $con=conecta();
            $id_pedido=$_REQUEST['id'];
            $sql="SELECT * FROM `pedidos_productos` WHERE id_pedido=$id_pedido";
            $res=$con->query($sql);
            
            $total=0;
            while($row=$res->fetch_array()){
                $id_producto=$row['id_producto'];
                $cantidad=$row['cantidad'];
                $precio=$row['precio'];
                $subtotal=$precio*$cantidad;
                $sql2="SELECT * FROM `productos` WHERE id=$id_producto";
                $res2=$con->query($sql2);
                $row2=$res2->fetch_array();
                $nombre=$row2['nombre'];
                echo" <div class='fila'>";
                echo"<div class='id'>$id_pedido</div>";
                echo"<div class='name'>$nombre</div>";
                echo"<div class='cantidad'>$cantidad</div>";
                echo"<div class='costo'>$precio</div>";
                echo"<div class='total'>$subtotal</div>";
                echo"</div>";
                $total+=$subtotal;
                }
                echo"<div class='fila2'>Total: $total</div>";
        ?>
    </body>
</html>


