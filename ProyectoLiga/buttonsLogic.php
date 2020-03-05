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
    /*INSERTAR RESULTADO*/
    if(isset($_POST['btnInputResult'])){

        // Insertamos el equipo local con dicho ultimo partido
        insertResult($_POST['teamLocal'], $_POST['resultLocal'], $_POST['teamVisitant'], $_POST['resultVisitant']);

        // Insertamos el equipo visitante con dicho ultimo partido
        //insertResult($_POST['teamVisitant'], $matchId, $_POST['resultVisitant']);

        $_POST = array();
        header("Location: index.php");
    }
?>