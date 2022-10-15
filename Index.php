<html>
    <head>
        <style>
            .tabla{
                height: 400px;
                width: 300px;
                border: 1px solid black;     
                margin-left: auto;      
                margin-right: auto;
                margin-top: auto;
                margin-bottom: auto;
                background-color:lightgreen;
            }
            .sup{
                width: 299px;
                text-align: center;
                height: 20px;
                border: 1px solid black;
                background-color: lightblue;
            }
            .imagen{
                height: 100px;
                margin-right: 100px;
                margin-left: 100px;

            }
            .Entrada{
                margin-right: auto;
                margin-left: 70px;
                height: 30px;
                background-color: lightblue;
            }
            .boton{
                margin-left: 100px;
                background-color: lightskyblue;
            }
        </style>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script>
            function validacion(){
                var usu=document.Inicio.usuario.value;
                var passw=document.Inicio.pass.value;
                if(usu&&passw!=0){
                    $.ajax({
                        url:'Administradores/Funciones/validausuario.php',
                        type: 'post',
                        datatype:'text',
                        data:'user='+usu+'&pass='+passw,
                        success:function(ban){
                            if(ban==0){
                                $('#mensajenuevo').html('Datos incorrectos');
                                setTimeout("$('#mensajenuevo').html('');",5000);
                            }
                            else{
                                window.location.href="menu.php";
                            }
                        }
                    });
                }
                else{
                    $('#mensaje').html('Error (Faltan campos por llenar)');
                    setTimeout("$('#mensaje').html('');",5000);
                }
            }
            function gotousuario(){
                window.location.href="altausu.php";
            }

        </script>
        
    </head>
    <body>
        <?php
        error_reporting(0);
        if(session_start()!=null||session_start()!=''){
            $varsesion = $_SESSION['nombre'];
        if($varsesion!=null||$varsesion!=''){//si ya
            header("Location:menu.php");
        }
        }
        ?>
        <div class='tabla'>
            <div class='sup'>Inicio De Sesion</div><br><br><br>
            <img src="js/sesion.png" class="imagen"><br><br><br>
            <div id="mensajenuevo" style="color:#F00;font-size:16px;"></div>
            <form name="Inicio">
                <input type="text" name="usuario" id="nombre" placeholder="Escribe tu usuario" class='Entrada'/><br><br>
                <input type="password" name="pass" id="nombre" placeholder="Escribe tu password" class='Entrada'/><br><br>
                <input type="button" class='boton' value="Iniciar sesion"onclick="validacion(); ">
                <br><br>
                <input type="button" class='boton' value="Crear cuenta" onclick="gotousuario();">
                <div id="mensaje" style="color:#F00;font-size:16px;"></div>
            </form>
        </div>
    </body>
</html>