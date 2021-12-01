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
                window.location.href="Productos_lista.php";
            }
            function detalle(id){
                window.location.href="Productos_detalle.php?id="+id;
            }
            function editar(id){
                window.location.href="Productos_editar.php?id="+id;
            }
            function baners(){
                window.location.href="../Baners/Banners_lista.php";
            }
            function pedidos(){
                window.location.href="../Pedidos/Pedidos_lista.php";
            }
            function eliminarfila(id){
                if(confirm("desea eliminarlo?")==true){
                    $.ajax({
                        url:'Funciones/Update.php',
                        type: 'post',
                        datatype:'text',
                        data: 'id='+id,
                        success:function(ban){
                        if(ban==1){
                            $('#'+id).hide();
                        }else{
                             
                        }
                    },error: function(){
                        alert('error archivo no encontrado');
                    }//error al encontrar el archivo
                    });
                }
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
            width: 940px;
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
        <button onclick="window.location.href='Productos_alta.php'">Crear nuevo producto</button><br><br>
        <div class="Tabla">
            <div class="titulo">Listado de Productos</div>
            <?php
                require "Funciones/conecta.php";
                $con = conecta();

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
                    echo"<div class='nombre'>$nombre</div>";
                    echo"<div class='correo'>$codigo</div>";
                    echo"<div class='rol'>$costo</div>";
                    echo"<div class='boton'>";
                    echo"<input onclick='eliminarfila($id);' type='submit' value='Eliminar'/>";
                    echo"</div>";
                    echo"<div class='boton'>";
                    echo"<input onclick='detalle($id);' type='submit' value='Ver detalle'/>";
                    echo"</div>";
                    echo"<div class='boton'>";
                    echo"<input onclick='editar($id);' type='submit' value='Editar'/>";
                    echo"</div>";
                    echo "</div>";
                    $cont++;
                }
            ?>
        </div>
        <br><br><button onclick="window.location.href='../menu.php'">Regresar al menu</button><br><br>
    </body>
</html>