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
        header("Location: resultados.php");
    }

    /*LOGICA DE EDICION*/
    if(isset($_POST['btnEditResult'])){
        require './dbConnection.php';
        // Solo vamos a editar el resultado de cada equipo de dicho registro
        // ya que se supone que ya hemos pinchado en que equipo queremos modificar
        // entonces los label mostrará los datos de dicho usuario y solo podremos modificar los resultador de cada equipo
        $matchId = $_POST["idMatch"];
        $idTeam1 = $_POST["idTeam1"];
        $resul1 = $_POST["resultTeamEdit1"];

        
        // Editamos el resultado del primer equipo
        updateResultWithDB($_POST["idMatch"],$_POST["idTeam1"], $_POST["resultTeamEdit1"],$database);
        // Editamos el resultado del segundo equipo
        updateResultWithDB($_POST["idMatch"],$_POST["idTeam2"], $_POST["resultTeamEdit2"],$database);
        header("Location: resultados.php");
    }

    /*FIN DE INSERCCION*/

?>