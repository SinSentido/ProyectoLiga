<?php
    require './assets/database/queries.php';


    /*LOGICA DE ELIMINACION*/
    if(isset($_POST['btnDelete'])) { 
        deleteTeam($_POST['btnDelete']);
        $_POST = array();
        header("Location: equipos.php");
    } 

    /*FIN DE ELIMINACION*/

    /*LOGICA DE INSERCCION*/
    if(isset($_POST['btnInputResult'])){
        inputResult($_GET["nameTeamLocal"],$_GET["idMatchResult"],$_GET["resultTeam2"]);
        header("Location: crearResultado.php");
    }

    /*FIN DE INSERCCION*/

?>