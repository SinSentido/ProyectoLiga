<?php
    /********************************************************************/
    //Queries para la tabla 'liga'

    function getAllLeagues(){
        require './dbConnection.php';
        $leagues = $database -> select("liga", "*", true);
        return $leagues;
    }

    function getLeagueByName($name){
        require './dbConnection.php';
        //TODO
    }

    function getLeagueById($leagueId){
        require './dbConnection.php';
        //TODO
    }


    /********************************************************************/
    //Queries para la tabla 'equipo'

    function getAllTeams(){
        require './dbConnection.php';
        $teams = $database->select("equipo", "*", true);
        print_r($teams);
    }

    function getAllTeamsByLeague($leagueId){
        require './dbConnection.php';
        //TODO
    }

    function getTeamByName($name){
        require './dbConnection.php';
        $team = $database->select("equipo", "*", ['nombreEquipo' => $name]);
        return $team;
    }

    function getTeamById($id){
        require './dbConnection.php';
        //TODO
    }


    /********************************************************************/
    //Queries para la tabla 'partido'

    function getAllMatches(){
        require './dbConnection.php';
        //TODO
    }

    function getMatchById($matchId){
        require './dbConnection.php';
        //TODO
    }

    function getMatchByDate($date){
        require './dbConnection.php';
        //TODO
    }


    /********************************************************************/
    //Queries para la tabla 'resultado'
    
    function getAllResults(){
        require './dbConnection.php';
        //TODO
    }

    function getResultsByMatch($matchId){
        require './dbConnection.php';
        //TODO
    }

    function getWinnerTeamByMatch($matchId){
        require './dbConnection.php';
        //TODO
    }

    function getTotalPointsByTeam($teamId){
        require './dbConnection.php';
        //TODO
    }

    /*Comentario para probar el fetch segunda parte*/
?>