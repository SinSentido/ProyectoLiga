<?php
    /********************************************************************/
    //Queries para la tabla 'liga'
    /********************************************************************/

    //Devuelve todas las ligas en la base de datos
    function getAllLeagues(){
        require './dbConnection.php';
        $leagues = $database -> select("liga", "*", true);
        return $leagues;
    }

    //Devuelve una liga buscada por nombre
    function getLeagueByName($name){
        require './dbConnection.php';
        $league = $database->select("liga", "*", ['nombreLiga' => $name]);
        return $league;
    }

    //Devuelve una liga buscada por Id
    function getLeagueById($leagueId){
        require './dbConnection.php';
        $league = $database->select("liga", "*", ['idLiga' => $leagueId]);
        return $league;
    }


    /********************************************************************/
    //Queries para la tabla 'equipo'
    /********************************************************************/

    //Devuelve todos los equipos en la base de datos
    function getAllTeams(){
        require './dbConnection.php';
        $teams = $database->select("equipo", "*", true);
        print_r($teams);
    }

    //Devuelve todos los equipo pertenecientes a una liga
    function getAllTeamsByLeague($leagueId){
        require './dbConnection.php';
        $teams = $database->select("equipo", "*", ['idLiga' => $leagueId]);
        return $teams;
        
    }

    //Devuelve un equipo buscado por nombre
    function getTeamByName($name){
        require './dbConnection.php';
        $team = $database->select("equipo", "*", ['nombreEquipo' => $name]);
        return $team;
    }

    //Devuelve un equipo buscado por Id
    function getTeamById($teamId){
        require './dbConnection.php';
        $team = $database->select("equipo", "*", ['idEquipo' => $teamId]);
        return $team;
    }


    /********************************************************************/
    //Queries para la tabla 'partido'
    /********************************************************************/

    //Devuelve todos los partidos
    function getAllMatches(){
        require './dbConnection.php';
        $matches = $database->select("partido", "*", true);
        return $matches;
    }

    //Devuelve un partido buscado por Id
    function getMatchById($matchId){
        require './dbConnection.php';
        $match = $database->select("partido", "*", ['idPartido' => $matchId]);
        return $match;
    }

    //Devuelve los partidos de una fecha determinada
    function getMatchesByDate($date){
        require './dbConnection.php';
        $matches = $database->select("partido", "*", ['fecha' => $date]);
        return $matches;
    }


    /********************************************************************/
    //Queries para la tabla 'resultado'
    /********************************************************************/
    
    //Devuelve todos los resultados
    function getAllResults(){
        require './dbConnection.php';
        $results = $database->select("resultado", "*", true);
        return $results;
    }

    //Devuelve los resultados de un partido indicado por su Id
    function getResultsByMatch($matchId){
        require './dbConnection.php';
        $results = $database->select("resultado", "*", ['idPartido' => $matchId]);
        return $results;
    }

    //Devuelve el equipo con más puntos de un partido en concreto indicado por su Id
    function getWinnerTeamByMatch($matchId){
        require './dbConnection.php';
        //TODO
    }

    //Devuelve el total de puntos de un equipo indicado por su Id
    function getTotalPointsByTeam($teamId){
        require './dbConnection.php';
        $totalPoints = $database->sum("resultado", "resultado", ['idEquipo' => $teamId]);
        return $totalPoints;
    }
?>