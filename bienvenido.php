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
        <title>Sistema de administracion</title>
    </head>
    <body>
        Bienvenido <?php echo $name;?>
        <br><br>
        <button onclick="window.location.href='menu.php'">Regresar al menu</button><br><br>
    </body>
</html> 