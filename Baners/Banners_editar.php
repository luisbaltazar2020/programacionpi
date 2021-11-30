<?php
    session_start();
    $varsesion =$_SESSION['nombre'];
    if($varsesion==null||$varsesion==''){
        header("Location:menu.php");
    }
    else{
        $name = $_SESSION['nombre'];
    }
?>
<html>
    <head>
    <script src="../js/jquery-3.3.1.min.js"></script>
        <script>
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
                window.location.href="./Banners_lista.php";
            }
            function actualizar(id){
                var nombre=document.forma01.nombre.value;
                if(nombre==''){
                    $('#mensaje').html('Error (Faltan campos por llenar)');
                    setTimeout("$('#mensaje').html('');",5000);
                }else{
                    document.forma01.method='post'
                    document.forma01.action="Funciones/Actualiza.php?id="+id;
                    document.forma01.submit();
                }
            }
        </script>
        <style>
             .fila{
            height: 30px;
                width: 500px;
                border: 1px solid black;
                text-align: center;  
                margin-left: auto;
                margin-right: auto;
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
            background-color: lightgreen;
            }
            .botones{
                float: left;
                border: 1px solid black;
                height: 30px;
                width: 264px;
                background-color: lightgreen;
            }

        </style>
        <style>
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

        </div>
        <button onclick="window.location.href='./Banners_lista.php'">Regresar al listado</button><br><br>
        Baners lista<br><br>
        </div>
        <?php
            require "Funciones/conecta.php";
            $con = conecta();
            $id = $_REQUEST['id'];
            $sql ="SELECT nombre FROM `banners` WHERE id=$id;";
            $res = $con->query($sql);
            $row=$res->fetch_array();

        ?>
        <form name='forma01' enctype="multipart/form-data">
        <?php
            $name=$row["nombre"];
           echo"<input type='text' name='nombre' id='nombre' placeholder='$name' value='$name'/><br>";
           ?>
           <input type="file" id="archivo" name="archivo"><div id="mensajearch" style="color:#F00;font-size:16px;"></div><br><br>
        <?php
           echo"<input type='button' value='Guardar'onclick='actualizar($id);'>";
           ?>
        </form>
        <div id="mensaje" style="color:#F00;font-size:16px;"></div>
    </body>
</html>