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
            function detalle(id){
                window.location.href="../Pedidos/Pedidos_detalle.php?id="+id;
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
                width: auto;
                border: 1px solid black;
                text-align: center;  
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
            width: 518px;
            border: 1px solid black;
            margin-left: auto;
            margin-right: auto;
            background-color:lightblue;
        }
        .nombre{
            float: left;
            border: 1px solid black;
            text-align:left;
            height: 30px;
            width: 200px;
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
        .boton{
            float:left;
            border:1px solid black;
            text-align:center;
            height: 30px;
            width: 119px;
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
                float:left;
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
            .usuario{
                float:left;
                background-color: lightgreen;
                height: 30px;
                width: 300px;
                border: 1px solid black;
            }
            .status{
                float:left;
                background-color: lightgreen;
                height: 30px;
                width: 100px;
                border: 1px solid black;
            }

        </style> 
    </head>
    
    <body>
    <div class='Menup'>
            <div class='Inicio'>
            <input type="button" class='botoni' value="Inicio" onclick="bienvenido();">
            </div>

            <?php
            if($_SESSION['rol']==1){
                echo" <div class='administradores'>
            <input type='button' class='botona' value='Administradores' onclick='administradores();'>
            </div>";
            }
            else{
                echo" <div class='administradores'>
            <input type='button' class='botona'>
            </div>";
            }
            ?>
            <div class='productos'>
            <input type="button" class='botonp' value="Productos" onclick="productos();">
            </div>

            <?php
            if($_SESSION['rol']==1){
                echo" <div class='baners'>
                <input type='button' class='botoni' value='Baners' onclick='baners();'>
                </div>";
            }
            else{
                echo" <div class='baners'>
                <input type='button' class='botoni'>
                </div>";
            }
            ?>

            <div clasS='pedidos'>
            <input type="button" class='botoni' value="Pedidos" onclick="pedidos();">
            </div>

            <div class='nombre'>Bienvenido <?php echo $name;?> </div>

            <div class='cerrar'>
            <input type="button" class='boton' value="Cerrar sesion" onclick="cerrarsesion();">
            </div>
        </div><br>
        <button onclick="window.location.href='../menu.php'">Regresar al menu</button><br><br>
        <button onclick="window.location.href='./Pedidos_alta.php'" >Crear pedido</button><br>
        Lista Pedidos
        <div class="Tabla">
            <div class="titulo">Listado de Productos</div>
            <div class='fila'>
                <div class='id'>ID</div>
                <div class='usuario'>Usuario</div>
                <div class='status'>Status</div>
                <div class='botoni'>Boton</div>
            </div>
            <?php
                require "Funciones/conecta.php";
                $con = conecta();
                if($_SESSION['rol']==1){
                    $sql = "SELECT * FROM `pedidos` WHERE status=1";
                    $res = $con->query($sql);
                    $cont =1;

                    while($row=$res->fetch_array()){
                        $id = $row["id"];
                        $fecha = $row["fecha"];
                        $usuario = $row["usuario"];
                        $status = $row["status"];
                        if($status==1){
                            $status_txt='cerrado';
                        }
                        echo"<div class='fila' id=$id>";
                        echo"<div class='id'>$cont</div>";
                        echo"<div class='usuario'>$usuario</div>";
                        echo"<div class='status'>$status_txt</div>";
                        echo"<div class='botoni'>";
                        echo"<input onclick='detalle($id);' type='submit' value='Ver detalle'/>";
                        echo"</div>";
                        echo "</div>";
                        $cont++;
                    }
                }
                else{
                    $sql = "SELECT * FROM `pedidos` WHERE 1 and usuario='$name'";
                    $res = $con->query($sql);
                    $cont =1;

                    while($row=$res->fetch_array()){
                        $id = $row["id"];
                        $fecha = $row["fecha"];
                        $usuario = $row["usuario"];
                        $status = $row["status"];
                        if($status==1){
                            $status_txt='Cerrado';
                        }
                        if($status==0){
                            $status_txt='Abierto';
                        }
                        echo"<div class='fila' id=$id>";
                        echo"<div class='id'>$cont</div>";
                        echo"<div class='usuario'>$usuario</div>";
                        echo"<div class='status'>$status_txt</div>";
                        echo"<div class='botoni'>";
                        echo"<input onclick='detalle($id);' type='submit' value='Ver detalle'/>";
                        echo"</div>";
                        echo "</div>";
                        $cont++;
                    }
                }

                
            ?>
        </div>

    </body>
</html>