<?php
    //Ubicacion del archivo
    //./funciones conecta.php
    define("HOST",'localhost');
    define("BD",'practicas');
    define("USER_BD",'root');
    define("PASS_DB",'');

    function conecta(){
        $con = new mysqli(HOST,USER_BD,PASS_DB,BD);
        return $con;
    }

?>