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
        // Obtenemos el ultimo partido creado
        $matchId = insertMatch();
        // Insertamos el equipo local con dicho ultimo partido
        inputResult($_GET["nameTeamLocalResult"], $matchId, $_GET["resultTeam1"]);
        // Insertamos el equipo visitante con dicho ultimo partido
        inputResult($_GET["nameTeamVisitResult"], $matchId, $_GET["resultTeam2"]);
        header("Location: resultados.php");
    }

    /*FIN DE INSERCCION*/

?>