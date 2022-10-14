<html>
    <head>
    <script src="js/jquery-3.3.1.min.js"></script>
        <script>
            function validacion(){
                var nombre=document.forma01.nombre.value;
                var apellidos=document.forma01.apellidos.value;
                var correo=document.forma01.correo.value;
                var pass=document.forma01.pass.value;
                var rol=2;
                var arch=document.forma01.archivo.value;
                if(nombre&&apellidos&&correo&&pass&&rol&&arch!=0){
                    $.ajax({
                        url:'Administradores/Funciones/validaciondecorreo.php',
                        type: 'post',
                        datatype:'text',
                        data:'correo='+correo,
                        success:function(ban){
                        if(ban==1){
                            document.forma01.method='post'
                           document.forma01.action='usuariossalva.php'
                           document.forma01.submit();
                        }
                        else{
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
    <button onclick="window.location.href='index.php'">Regresar al Loguin</button><br><br>
        Alta Usuarios<br><br>

        <form name='forma01'enctype="multipart/form-data">
            <input type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre"/><br>
            <input type="text" name="apellidos" id="apellidos" placeholder="Escribe tus apellidos"/><br>
            <input type="text" name="correo" id="correo" placeholder="Escribe tu correo"/> <div id="mensajecorreo" style="color:#F00;font-size:16px;"></div>
            <input type="text" name="pass" id="pass" placeholder="Escribe tu contraseña"/><br>
            <input type="file" id="archivo" name="archivo"> <div id="mensajearch" style="color:#F00;font-size:16px;"></div><br><br>
            <input type="button" value="Guardar"onclick="validacion();">
            <div id="mensaje" style="color:#F00;font-size:16px;"></div>
        </form>
    </body>
</html>