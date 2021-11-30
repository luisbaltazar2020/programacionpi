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
            function baners(){
                window.location.href="../Baners/Banners_lista.php";
            }
            function pedidos(){
                window.location.href="../Pedidos/Pedidos_lista.php";
            }
            function validacion(){
                var nombre=document.forma01.nombre.value;
                var codigo=document.forma01.codigo.value;
                var description=document.forma01.description.value;
                var costo=document.forma01.costo.value;
                var stock=document.forma01.stock.value;
                var arch=document.forma01.archivo.value;
                if(nombre&&codigo&&description&&costo&&stock&&arch!=0){
                    $.ajax({
                        url:'Funciones/validacioncodigo.php',
                        type:'post',
                        datatype:'text',
                        data:'codigo='+codigo,
                        success:function(ban){
                            if(ban==1){
                                document.forma01.method='post'
                                document.forma01.action='Funciones/Productossalva.php'
                                document.forma01.submit();
                            }
                            else{
                                $('#mensajecod').html('El codigo '+codigo+' Ya existe!');
                                setTimeout("$('#mensajecod').html('');",5000);
                            }
                        }
                    });
                }
                else{
                    $('#mensaje').html('Error (Faltan campos por llenar)');
                    setTimeout("$('#mensaje').html('');",5000);
                }
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
        <button onclick="window.location.href='Productos_lista.php'">Regresar al listado</button><br><br>
        Alta Productos<br><br>
        <form name="forma01"enctype="multipart/form-data">
            <label> Nombre:
            <input type="text" name="nombre" id="nombre"><br>
        </label>
        <label> Codigo:
        <input type="text"name="codigo" id="codigo"> <div id="mensajecod" style="color:#F00;font-size:16px;"></div>
        </label>
            <label>Descripcion:<br>
            <textarea name="description" id="description" cols="20" rows="5"></textarea>
        </label><br>
        <label >Costo:
            <input type="number" name="costo" id="costo">
        </label><br>
        <label >Stock:
            <input type="number" name="stock" id="stock">
        </label><br>
        <label >Archivo:
            <input type="file" id="archivo" name="archivo"><div id="mensajearch" style="color:#F00;font-size:16px;"></div><br><br>
        </label><br>
        <input type="button" value="Guardar"onclick="validacion();">
        <div id="mensaje" style="color:#F00;font-size:16px;"></div>
        </form>
        
    </body>
</html>