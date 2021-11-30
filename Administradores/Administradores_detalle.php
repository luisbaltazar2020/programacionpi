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
                window.location.href="Administradores_lista.php";
            }
            function baners(){
                window.location.href="../Baners/Banners_lista.php";
            }
            function productos(){
                window.location.href="../Productos/Productos_lista.php";
            }
        </script>
        <style>
            .menup{
                height: 32px;
                width:874px;
                border: 1px solid black;
                margin-left: auto;
                margin-right: auto;
                background-color:lightblue;
            }
            .name{
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
            .tabla{
            height: 262px;
            width: 1060px;
            border: 1px solid black;
            margin-left: auto;
            margin-right: auto;
            background-color:lightblue;
            }
            .fila{
                height: auto;
                width: 150px;
                border:1px solid black;
                height:30px;
                float:left;
                text-align: center; 
                background-color:lightgreen;
            }
            .fila2{
                height: auto;
                width: 150px;
                border:1px solid black;
                height:228px;
                float:left;
                text-align: center; 
            }
            .correo{
                height: auto;
                width: 250px;
                border:1px solid black;
                height:30px;
                float:left;
                text-align: center; 
                background-color:lightgreen;
            }
            .nombre{
                height: auto;
                width: 100px;
                border:1px solid black;
                height:30px;
                float:left;
                text-align: center; 
                background-color:lightgreen;
            }
            .nombredeta{
                height: auto;
                width: 100px;
                border:1px solid black;
                height:228px;
                float:left;
                text-align: center; 
            }
            .correodeta{
                height: auto;
                width: 250px;
                border:1px solid black;
                height:228px;
                float:left;
                text-align: center; 
            }
            .imagen{
                height: auto;
                width: 298px;
                border:1px solid black;
                height:30px;
                float:left;
                text-align: center; 
                background-color:lightgreen;
            }
            .imagendeta{
                height: auto;
                width: 298px;
                border:1px solid black;
                height:228px;
                float:left;
                text-align: center; 
            }
            .imga{
                height:230px;
                width: 298px;
            }
        </style>
    </head>
    <?php
            require "Funciones/conecta.php";
            $con = conecta();
            $id = $_REQUEST['id'];
            $sql ="SELECT nombre,apellidos,correo,rol,status,archivo_n FROM `administradores` WHERE id=$id;";
            $res = $con->query($sql);
            $row=$res->fetch_array();
            
            
        ?>
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
            <input type="button" class='botoni' value="Pedidos" onclick="">
            </div>

            <div class='name'>Bienvenido <?php echo $name;?> </div>

            <div class='cerrar'>
            <input type="button" class='boton' value="Cerrar sesion" onclick="cerrarsesion();">
            </div>
        </div><br>
        <div class="tabla">
            <div class="nombre">Nombre</div>
            <div class="nombre">Apellidos</div>
            <div class="correo">Correo</div>
            <div class="fila">Rol</div>
            <div class="fila">Status</div>
            <div class="imagen">Foto</div><br>
            <div class="nombredeta">
                <?php
                echo $row['nombre'];?>
            </div>

            <div class="nombredeta">
            <?php
                echo $row['apellidos'];?>
            </div>

            <div class="correodeta">
            <?php
                echo $row['correo'];?>
            </div>
            <div class="fila2">
            <?php
                $rol_text=($row['rol']=='1') ? "Gerente":"Ejecutivo";
                echo $rol_text;?>
            </div>
            <div class="fila2">
            <?php
            $status_txt=($row['status']=='1')? "Activo":"Inactivo";
                echo $status_txt;?>
            </div>
            <div class="imagendeta">
                <img src="Archivos/<?php echo $row['archivo_n'];?>" class="imga">
            </div>
            </div>
        </div><br><br>
        <button onclick="window.location.href='Administradores_lista.php'">Regresar al listado</button><br><br>
    </body>
</html>










