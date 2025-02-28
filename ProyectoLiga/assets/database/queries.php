<?php
    /********************************************************************/
    //Queries para la tabla 'usuario'
    //Columnas: nombreUsuario(string), pass(string)
    /********************************************************************/
    
    //Devuelve todos los usuario en la base de datos
    function getAllUsers(){
        require './dbConnection.php';
        $users = $database->select('usuario', "*", true);
        return $users;
    }

    //Devuelve un usuario segun el nombre indicado por parámetro
    function getUserByName($database, $name){
        $currentUser = $database->select('usuario', '*', ['nombreUsuario' => $name]);
        return $currentUser;
    }



    /********************************************************************/
    //Queries para la tabla 'liga'
    //Columnas: idLiga(string), nombreLiga(string), fechaCreacion(date), descripcion(string),
    //          activa(boolean)
    /********************************************************************/

    //Devuelve todas las ligas en la base de datos
    function getAllLeagues($database){
        $leagues = $database->select("liga", "*", true);
        return $leagues;
    }

    //Devuelve una liga buscada por nombre
    function getLeagueByName($database, $name){
        $league = $database->select("liga", "*", ['nombreLiga' => $name]);
        return $league;
    }

    //Devuelve una liga buscada por Id
    function getLeagueById($database, $leagueId){
        $league = $database->select("liga", "*", ['idLiga' => $leagueId]);
        return $league;
    }

    //Inserta una nueva liga en la base de datos
    function insertLeague($leagueName, $leagueDescription){
        require './dbConnection.php';
        $database->insert("liga", [
            "idLiga" => "L1", //. strval($database->count("liga")+1),
            "nombreLiga" => $leagueName,
            "fechaCreacion" => date("Y-m-d"),
            "descripcion" => $leagueDescription,
            "activa" => true
        ]);
    }

    //Actualiza los datos de una liga
    function updateLeague($database, $leagueId, $name, $description){
        $database->update('liga', [
            'nombreLiga' => $name,
            'descripcion' => $description
        ],[
            'idLiga' => $leagueId
        ]);
    }

    //Marca una liga como inactiva
    function deleteLeague($database, $leagueId){
        $database->update("liga", ["activa" => false], ["idLiga" => $leagueId]);
    }



    /********************************************************************/
    //Queries para la tabla 'equipo'
    //Columnas: idEquipo(int), idLiga(string), nombreEquipo(string), nSocial(string),
    //          ciudad(string), fechaCreacion(date)
    /********************************************************************/
    
    //Inserta un equipo a la base de datos
    function insertTeam($nombreEquipo, $nSocial, $ciudad){
        require './dbConnection.php';
        $database-> insert('equipo', [
            'idEquipo' => ($database->max("equipo", "idEquipo")+1),
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

    //Devuelve todos los equipos ordenados por nombre
    function getAllTeamsOrderedByName($database){
        $teams = $database->select("equipo", "*", [
            "ORDER" => "nombreEquipo"
        ]);
        return $teams;
    }

    //Devuelve todos los equipos ordenados por su número de victorias
    function getTeamsWithTotalMatches($database){
        echo "hola";

        $partidosJugados = $database->query("SELECT <nombreEquipo>, COUNT(<resultado.idPartido>) AS <partidos> FROM <equipo> 
            JOIN <resultado> ON <equipo.idEquipo> = <resultado.idEquipo> GROUP BY 1")->fetchAll();

        return $partidosJugados;
    }

    function getAllTeamsWithVictories($database){
        $teams = $database->query("SELECT <nombreEquipo>, COUNT(<r.idEquipo>) AS <victorias> FROM <equipo> AS <e> JOIN <resultado> AS <r> ON <r.idEquipo> = <e.idEquipo>
        WHERE <r.resultado> >= (SELECT MAX(<resultado>) FROM <resultado> AS <r2> WHERE <r2.idPartido> = <r.idPartido>) GROUP BY 1 ORDER BY 2 DESC;")->fetchAll();

        return $teams;
    }

    //Devuelve todos los equipo pertenecientes a una liga
    function getAllTeamsByLeague($database, $leagueId){

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
    //Devuelve un equipo buscado por Id y pasando la base de datos
    function getTeamByIdWithDB($teamId, $database){
        $team = $database->select("equipo", "*", ['idEquipo' => $teamId]);
        return $team;
    }

    //Devuelve la suma de todos los equipos
    function getAllTeamsCount($database){
        $numOfTeams = $database->count('equipo');
        return $numOfTeams;
    }

    //Borra un equipo indicado por su Id
    function deleteTeam($teamId){
        require './dbConnection.php';
        $database->delete("equipo", ['idEquipo' => $teamId]);
    }



    /********************************************************************/
    //Queries para la tabla 'partido'
    //Columnas: idPartido(int), fecha(date)
    /********************************************************************/

    //Devuelve todos los partidos
    function getAllMatches($database){
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

    //Crea un nuevo partido
    function insertMatch(){
        require './dbConnection.php';
        $database->insert('partido', [
            'idPartido' => ($database->max("partido", "idPartido")+1),
            'fecha' => date('Y-m-d')
        ]);
        return $database->max("partido", "idPartido");
    }
    //Crea un nuevo partido pasando la bd
    function insertMatchWithDB($database){
        $database->insert('partido', [
            'idPartido' => ($database->max("partido", "idPartido")+1),
            'fecha' => date('Y-m-d')
        ]);
        return $database->max("partido", "idPartido");
    }

    //Devuelve la suma de todos los partidos
    function getAllMatchesCount($database){
        $numOfMatches = ($database->count('partido'));
        return $numOfMatches;
    }



    /********************************************************************/
    //Queries para la tabla 'resultado'
    //Columnas: idPartido(int), idEquipo(string), resultado(number)
    /********************************************************************/
    
    //Devuelve todos los resultados con el idDePartido
    function getAllResultByMatch($database, $idMatch){

        $results = $database->query(
            "SELECT resultado.idPartido, equipo.nombreEquipo, fecha, resultado FROM <resultado>, <partido>, <equipo>
             WHERE <resultado.idPartido> = <partido.idPartido> AND <resultado.idEquipo> = <equipo.idEquipo> AND <resultado.idPartido> = :id 
             GROUP BY resultado.idPartido , equipo.nombreEquipo ORDER BY <resultado.idPartido> DESC",
            [
                ":id" => $idMatch
            ]
        )->fetchAll();
        return $results;
    }


    //Devuelve todos los resultados
    function getAllResults($database){
        $results = $database->select("resultado", "*", true);
        return $results;
    }

    function getAllResultsWithTeam($database){
        $results = $database->select("resultado",
        ["[><]equipo" => ["idEquipo" => "idEquipo"],
         "[><]partido" => ["idPartido" => "idPartido"]], 
         [
            "resultado.idPartido",
            "partido.fecha",
            "resultado.idEquipo",
            "equipo.nombreEquipo",
            "resultado"
         ],[
             'ORDER' => 'idPartido'
         ]);
        return $results;
    }

    //Devuelve los resultados de un partido indicado por su Id
    function getResultsByMatch($matchId){
        require './dbConnection.php';
        $results = $database->select("resultado", "*", ['idPartido' => $matchId]);
        return $results;
    }

    //Devuelve los resultados de un partido indicado por su Id
    function getResultsByMatchWithDB($matchId, $database){
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

    //Devuelve los puntos totales anotados en la liga
    function getTotalPointsInLeague($database){
        $totalPointsInLeague = $database->sum("resultado", "resultado");
        return $totalPointsInLeague;
    }

    //edita un resultado
    function updateResultWithDB($idMatch, $idTeam, $result, $database){
        $database->update("resultado",["resultado" => $result],["idPartido" => $idMatch, "idEquipo" => $idTeam ]);
    }

    //Inserta el resultado 
    /*
    $nameTeam = nombre del equipo
    $idMatchR = id del partido
    $result = resultado de ese equipo
    */
    function insertResult($idLocal, $resultLocal, $idVisitant, $resultVisitant){
        require './dbConnection.php';

        $database->insert('partido', [
            'idPartido' => ($database->max("partido", "idPartido")+1),
            'fecha' => date('Y-m-d')
        ]);
        $matchId = $database->max("partido", "idPartido");


        $database->insert('resultado', [
            'idPartido' => $matchId,
            'idEquipo' => $idLocal,
            'resultado' => $resultLocal
        ]);


        $database->insert('resultado', [
            'idPartido' => $matchId,
            'idEquipo' => $idVisitant,
            'resultado' => $resultVisitant
        ]);
    }



    /********************************************************************/
    //Queries para la tabla 'evento'
    //Columnas: idEvento(int), title(string), start(date)
    /********************************************************************/

    //Devuelve todos los eventos
    function getAllEvents($database){
        $events = $database->select('evento', '*', true);
        return $events;
    }

    //Devuelve solo la información necesaria para pintar los eventos en el calendario
    function getAllEventsInfo($database){
        $events = $database->select('evento', [
            "title",
            "start"
        ], true);
        return $events;
    }

    //Inserta un nuevo evento
    function insertEvent($database, $title, $date){
        $database->insert('evento', [
            "title" => $title,
            "start" => $date
        ]);
    }
?>