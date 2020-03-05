<?php
    require './assets/database/queries.php';

    /*EQUIPOS*/
    /*ELIMINAR EQUIPO*/
    if(isset($_POST['btnDelete'])) { 
        deleteTeam($_POST['btnDelete']);
        $_POST = array();
        header("Location: equipos.php");
    } 

    /*CREAR EQUIPO */
    if(isset($_POST['btnCreate'])){
        
    }


    /*RESULTADOS*/
    /*LOGICA DE INSERCCION*/
    if(isset($_POST['btnInputResult'])){
        inputResult($_GET["nameTeamLocal"],$_GET["idMatchResult"],$_GET["resultTeam2"]);
        header("Location: crearResultado.php");
    }

    /*FIN DE INSERCCION*/

?>