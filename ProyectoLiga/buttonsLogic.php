<?php
    require './assets/database/queries.php';

    if(isset($_POST['btnDelete'])) { 
        deleteTeam($_POST['btnDelete']);
        $_POST = array();
        header("Location: equipos.php");
    } 

    if(isset($_POST['btnInputResult'])){
        inputResult($_GET["idTeam1result"],$_GET["idTeam2result"],$_GET["idMatchResult"],$_GET["resultTeam2"]);
        header("Location: crearResultado.php");
    }

?>