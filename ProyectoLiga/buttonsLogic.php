<?php
    require './assets/database/queries.php';


    /*************************** LIGA ***************************/
    /*Crear liga*/
    if(isset($_POST['btnCreateLeague'])){
        insertLeague($_POST['leagueName'], $_POST['description']);

        $_POST = array();
        header("Location: index.php");
    }

    /*Editar liga*/
    if(isset($_POST['btnEditLeague'])){ 
        require './dbConnection.php';
        updateLeague($database, 'L1', $_POST['leagueName'], $_POST['description']);

        $_POST = array();
        header("Location: index.php");
    }


    /*************************** EQUIPOS ***************************/
    /*ELIMINAR EQUIPO*/
    if(isset($_POST['btnDelete'])) { 
        deleteTeam($_POST['btnDelete']);

        $_POST = array();
        header("Location: equipos.php");
    } 

    /* EQUIPO */
    /*CREAR EQUIPO */
    if(isset($_POST['btnCreate'])){
        insertTeam($_POST['teamName'], $_POST['socialNum'], $_POST['city']);

        $_POST = array();
        header("Location: crearEquipo.php");
    }


    /*************************** RESULTADOS ***************************/
    /*Crear resultado*/
    if(isset($_POST['btnInputResult'])){
        insertResult($_POST['teamLocal'], $_POST['resultLocal'], $_POST['teamVisitant'], $_POST['resultVisitant']);

        $_POST = array();
        header("Location: resultados.php");
    }

    /*Editar resultado*/
    if(isset($_POST['btnEditResult'])){
        require './dbConnection.php';
        // Solo vamos a editar el resultado de cada equipo de dicho registro
        // ya que se supone que ya hemos pinchado en que equipo queremos modificar
        // entonces los label mostrará los datos de dicho usuario y solo podremos modificar los resultador de cada equipo
        
        // Editamos el resultado del primer equipo
        updateResultWithDB($_POST["idMatch"],$_POST["idTeam1"], $_POST["resultTeamEdit1"],$database);
        // Editamos el resultado del segundo equipo
        updateResultWithDB($_POST["idMatch"],$_POST["idTeam2"], $_POST["resultTeamEdit2"],$database);

        $_POST = array();
        header("Location: resultados.php");
    }

?>