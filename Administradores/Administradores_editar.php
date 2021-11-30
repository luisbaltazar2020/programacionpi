<?php
    session_start();
    $varsesion =$_SESSION['nombre'];
    if($varsesion==null||$varsesion==''){
        header("Location:Index.php");
    }
    else{
        $name = $_SESSION['nombre'];
    }
?><html>
    <head>
    <script src="../js/jquery-3.3.1.min.js"></script>
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
                window.location.href="../Baners/Baners_alta.php";
            }
            function validacion(id){
                var nombre=document.forma01.nombre.value;
                var apellidos=document.forma01.apellidos.value;
                var correo=document.forma01.correo.value;
                var rol=document.forma01.rol.value;
                var passw=document.forma01.password.value;
                var arc=document.forma01.archivo.value;
                if(nombre&&apellidos&&correo&&rol!=0){ 
                    $.ajax({
                        url:'Funciones/validacion_correo.php',
                        type: 'post',
                        datatype:'text',
                        data:'correo='+correo+"&id="+id,
                        success:function(ban){
                        if(ban==1){
                           document.forma01.method='post'
                           document.forma01.action='Funciones/Actualiza.php?id='+id;
                           document.forma01.submit();
                        }else{
                            $('#mensajecorreo').html('El correo '+correo+' Ya existe!');
                            setTimeout("$('#mensajecorreo').html('');",5000);
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
            <input type="button" class='botonp' value="Productos" onclick="">
            </div>

            <div class='baners'>
            <input type="button" class='botoni' value="Baners" onclick="baners();">
            </div>

            <div clasS='pedidos'>
            <input type="button" class='botoni' value="Pedidos" onclick="">
            </div>

            <div class='nombre'>Bienvenido <?php echo $name;?> </div>

            <div class='cerrar'>
            <input type="button" class='boton' value="Cerrar sesion" onclick="cerrarsesion();">
            </div>
        </div>
    <button onclick="window.location.href='Administradores_lista.php'">Regresar al listado</button><br><br>
       Editar<br><br>
       <?php
            require "Funciones/conecta.php";
            $con = conecta();
            $id = $_REQUEST['id'];
            $sql ="SELECT nombre,apellidos,correo,rol,status FROM `administradores` WHERE id=$id;";
            $res = $con->query($sql);
            $row=$res->fetch_array();
            
        ?>

        <form name='forma01' enctype="multipart/form-data">
            <?php
            $name=$row["nombre"];
           echo"<input type='text' name='nombre' id='nombre' placeholder='$name' value='$name'/><br>";
            $apellido=$row["apellidos"];
            echo"<input type='text' name='apellidos' id='apellidos' placeholder='$apellido' value='$apellido'/><br>";
            
            echo"<input type='text' name='password' id='password' placeholder='password'/><br>";
            $correo=$row["correo"];
           echo"<input type='text' name='correo' id='correo' placeholder='$correo' value='$correo'/> <div id='mensajecorreo' style='color:#F00;font-size:16px;'></div>";
           $rol=$row["rol"];
            echo"<select name='rol' id='rol' value='$rol'>";
                echo"<option value='0'>Selecciona</option>";
                echo"<option value='1'>Gerente</option>";
                echo"<option value='2'>Ejectuivo</option>";
            ?>
            </select><br>
            <?php
            echo"<input type='file' id='archivo' name='archivo'><br><br>";
            echo"<input type='button' value='Guardar'onclick='validacion($id);'>";
            ?>
            <div id="mensaje" style="color:#F00;font-size:16px;"></div>
        </form>
    </body>
</html>