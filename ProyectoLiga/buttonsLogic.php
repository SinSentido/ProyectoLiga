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
        insertTeam($_POST['teamName'], $_POST['socialNum'], $_POST['city']);
        $_POST = array();
        header("Location: crearEquipo.php");
    }


    /*RESULTADOS*/
    /*LOGICA DE INSERCCION*/
    if(isset($_POST['btnInputResult'])){
        // Insertamos el equipo local
        inputResult($_GET["nameTeamLocalResult"],$_GET["selectResult"],$_GET["resultTeam1"]);
        // Insertamos el equipo visitante
        inputResult($_GET["nameTeamVisitResult"],$_GET["selectResult"],$_GET["resultTeam2"]);
        header("Location: resultados.php");
    }

    /*FIN DE INSERCCION*/

?>