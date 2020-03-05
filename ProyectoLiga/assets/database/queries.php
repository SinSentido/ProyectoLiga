<?php
    /********************************************************************/
    //Queries para la tabla 'usuario'
    //Columnas: nombreUsuario(string), pass(string)
    /********************************************************************/
    function getAllUsers(){
        require './dbConnection.php';
        $users = $database->select('usuario', "*", true);
        return $users;
    }


    /********************************************************************/
    //Queries para la tabla 'liga'
    //Columnas: idLiga(string), nombreLiga(string), fechaCreacion(date), descripcion(string),
    //          activa(boolean)
    /********************************************************************/

    //Devuelve todas las ligas en la base de datos
    function getAllLeagues(){
        require './dbConnection.php';
        $leagues = $database->select("liga", "*", true);
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

    //Inserta una nueva liga en la base de datos
    function insertLeague($leagueName, $leagueDescription){
        require './dbConnection.php';
        $database->insert("liga", [
            "idLiga" => "E" . strval($database->count("liga")+1),
            "nombreLiga" => $leagueName,
            "fechaCreacion" => date("Y-m-d"),
            "descripcion" => $leagueDescription,
            "activa" => true
        ]);
    }

    //Marca una liga como inactiva
    function deleteLeague($leagueId){
        require './dbConnection.php';
        $database->update("liga", ["activa" => false], ["idLiga" => $leagueId]);
    }

    /********************************************************************/
    //Queries para la tabla 'equipo'
    //Columnas: idEquipo(string), idLiga(string), nombreEquipo(string), nSocial(string),
    //          ciudad(string), fechaCreacion(date)
    /********************************************************************/
    
    //Inserta un equipo a la base de datos
    function insertTeam($idEquipo, $idLiga, $nombreEquipo, $nSocial, $ciudad, $fechaCreacion){
        require './dbConnection.php';
        $database-> insert('equipo', [
            'idEquipo' => ($database-max("equipo")+1),
            'idLiga' => "L1",
            'nombreEquipo' => $nombreEquipo,
            'nSocial' => $nSocial,
            'ciudad' => $ciudad,
            'fechaCreacion' => date('Y-m-d')
        ]);
    }

    //Devuelve todos los equipos en la base de datos
    function getAllTeams(){
        require './dbConnection.php';
        $teams = $database->select("equipo", "*", true);
        return $teams;
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



    //Borra un equipo indicado por su Id
    function deleteTeam($teamId){
        require './dbConnection.php';
        $database->delete("equipo", ['idEquipo' => $teamId]);
    }


    /********************************************************************/
    //Queries para la tabla 'partido'
    //Columnas: idPartido(string), fecha(date)
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

    //Devuelve un partido buscado por Id
    function getMatchLatestId(){
        require './dbConnection.php';
        $match = $database->count("partido", "*", true);
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
    //Columnas: idPartido(string), idEquipo(string), resultado(number)
    /********************************************************************/
    
    //Devuelve todos los resultados
    function getAllResults(){
        require './dbConnection.php';
        $results = $database->select("resultado", "*", true);
        return $results;
    }

    function getAllResultsWithTeam(){
        require './dbConnection.php';
        $results = $database->select("resultado",
        ["[><]equipo" => ["idEquipo" => "idEquipo"],
         "[><]partido" => ["idPartido" => "idPartido"]], 
         [
            "resultado.idPartido",
            "partido.fecha",
            "resultado.idEquipo",
            "equipo.nombreEquipo",
            "resultado"
        ]);
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


    //edita un resultado
    function updateResult($idMatch,$resultIdTeam,$result){
        require './dbConnection.php';
        $database->update("resultado",[
            "idPartido" => $idMatch,
            "idEquipo" => $result,
            "resultado" => $resultIdTeam
        ]);
    }

    //Inserta el resultado de dos equipos disputados en un partido 
    function inputResult($nameTeam, $result){
        require './dbConnection.php';
        // Obtenmos el id del equipo 
        $idTeam = getTeamByName($nameTeam);
        // Obtenmos el id del partido 
        $idMatchR = getMatchLatestId();
        if($idTeam >= 0) {
            $database-> insert('resultado', [
                'idPartido' => $idMatchR,
                'idEquipo' => $idTeam,
                'resultado' => $result
            ]);
        };

    }
?>