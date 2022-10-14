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
            function pedidos(){
                window.location.href="../Pedidos/Pedidos_lista.php";
            }
            function validacion(){
                var nombre=document.forma01.nombre.value;
                var arch=document.forma01.archivo.value;
                if(nombre&&arch!=0){
                    document.forma01.method='post'
                    document.forma01.action='./Funciones/banerssalva.php'
                    document.forma01.submit();

                }else{
                    $('#mensaje').html('Error (Faltan campos por llenar)');
                    setTimeout("$('#mensaje').html('');",5000);
                }
                    
            }
            function eliminar(id){
                if(confirm("desea eliminarlo?")==true){
                    $.ajax({
                        url:'funciones/eliminar_banner.php',
                        type: 'post',
                        datatype:'text',
                        data: 'id='+id,
                        success:function(ban){
                        if(ban==1){
                            $('#'+id).hide();
                        }
                    },error: function(){
                        alert('error archivo no encontrado');
                    }
                    });
                }
            }
            function editar(id){
                window.location.href="Banners_editar.php?id="+id;
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
        <button onclick="window.location.href='../Administradores/Administradores_lista.php'">Regresar al listado</button><br><br>
        Baners lista<br><br>
        <button onclick="window.location.href='../Baners/Baners_alta.php'">Crear Banner</button>
        <div class='fila'>
            <div class='id'>ID</div>
            <div class='name'>Nombre</div>
            <div class='botones'>Botones</div>
        </div>
        <?php
            require "Funciones/conecta.php";
            $con = conecta();

            $sql = "SELECT * FROM banners WHERE status=1 AND eliminado=0";
            $res = $con->query($sql);
            $cont =1;

            while($row=$res->fetch_array()){
                $id = $row["id"];
                $nombre = $row["nombre"];
                
                echo"<div class='fila' id=$id>";
                echo"<div class='id'>$cont</div>";
                echo"<div class='name'>$nombre</div>";
                echo"<div class='botones'>";
                echo"<input type='button' value='Eliminar' onclick='eliminar($id);'>";
                echo"<input type='button' value='Editar' onclick='editar($id);'>";
                echo"</div>";
                echo "</div>";
                $cont++;
            }


        ?>

    </body>
</html>