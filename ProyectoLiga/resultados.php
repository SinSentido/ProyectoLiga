<?php

if(!isset($_COOKIE['correctLogin'])){
   header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Gestor de ligas de baloncesto</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <section id="container">
        <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b>Gestor de ligas de baloncesto</b></a>
            <!--logo end-->
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </header>
        <!--header end-->

        <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">

                    <p class="centered">
                        <a href="index.php"><img src="assets/img/pelotaLogin.png" class="img-circle" width="60"></a>
                    </p>
                    <h5 class="centered">Menu</h5>

                    <li class="mt">
                        <a href="index.php">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-desktop"></i>
                            <span>Equipos</span>
                        </a>
                        <ul class="sub">
                            <li><a href="equipos.php">Ver equipos</a></li>
                            <li><a href="crearEquipo.php">Crear equipo</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a class="active" href="javascript:;">
                            <i class="fa fa-cogs"></i>
                            <span>Resultados</span>
                        </a>
                        <ul class="sub">
                            <li class="active"><a href="resultados.php">Ver resultados</a></li>
                            <li><a href="crearResultado.php">Nuevo resultado</a></li>
                        </ul>
                    </li>

                    <hr>
                    <h4 class="sidebar-subtitle">Datos</h4>
                
                    <!-- RANKING -->
                    <li class="mt">
                        <a href="ranking.php">
                            <i class="fa fa-star"></i>
                            <span>Ranking</span>
                        </a>
                    </li>

                    <!--CALENDARIO DE PARTIDOS-->
                    <li>
                        <a href="calendarioPartidos.php">
                            <i class="fa fa-calendar"></i>
                            <span>Calendario de partidos</span>
                        </a>
                    </li>
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->

        <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> RESULTADOS DE LOS EQUIPOS</h3>

                <!-- row -->

                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <table class="table table-striped table-advance table-hover">
                                <h4><i class="fa fa-angle-right"></i> Resultados Individuales</h4>
                                <hr>
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-bullhorn"></i> ID_Partido</th>
                                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Nombre del Equipo</th>
                                        <th><i class="fa fa-bullhorn"></i> Fecha del Partido</th<i>
                                        <th><i class="fa fa-bookmark"></i> Resultado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <!-- PHP FOR THE TABLE RESULTS -->
                                <?php
                                
                                    require './dbConnection.php';
                                    require './assets/database/queries.php';
                                    $results = getAllResultsWithTeam($database);

                                    foreach($results as $result) {
                                        echo "<tr>";
                                        echo "<td>" . $result['idPartido'] . "</td>";
                                        echo "<td>" . $result['nombreEquipo'] . "</td>";
                                        echo "<td>" . $result['fecha'] . "</td>";
                                        echo "<td>" . $result['resultado'] . "</td>";
                                        echo "<td>";
                                        echo "<form action=\"editarResultado.php\" method=\"POST\"><button type=\"submit\" name=\"btnResultEdit\" value=\"" . $result['idPartido'] . "\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button></form>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                ?>
                                    <!-- END OF PHP -->
                            </table>
                        </div>
                        <!-- /content-panel -->
                    </div>
                    <!-- /col-md-12 -->
                </div>
                

                <!-- RESULTADOS COMPLETOS CON LOS DOS EQUIPOS: -->
                <!-- /row -->
                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <table class="table table-striped table-advance table-hover">
                                <h4><i class="fa fa-angle-right"></i> Resultados</h4>
                                <hr>
                                <thead>
                                    <tr>
                                        <th><i class="hidden-phone"></i> ID_Partido</th>
                                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Nombre del Equipo Local</th>
                                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Resultado Local</th>
                                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Nombre del Equipo Visitante</th>
                                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Resultado Visitante</th>
                                        <th><i class="hidden-phone"></i> Fecha del Partido</th<i>
                                        <th></th>
                                    </tr>
                                </thead>
                                <!-- PHP FOR THE TABLE RESULTS -->
                                <?php
                                    $aux = -1;
                                    foreach($results as $result) {
                                        if($aux != $result["idPartido"]){
                                            // Devuelve los datos de los dos equipos echados en el partido seleccionado
                                            $resultsCompleted = getAllResultByMatch($database,$result["idPartido"]);
                                            echo "<tr>";
                                            echo "<td>" . $resultsCompleted[0]['idPartido'] . "</td>";
                                            echo "<td>" . $resultsCompleted[0]['nombreEquipo'] . "</td>";
                                            echo "<td>" . $resultsCompleted[0]['resultado'] . "</td>";
                                            echo "<td>" . $resultsCompleted[1]['nombreEquipo'] . "</td>";
                                            echo "<td>" . $resultsCompleted[1]['resultado'] . "</td>";
                                            echo "<td>" . $resultsCompleted[1]['fecha'] . "</td>";
                                            echo "<td>";
                                            echo "<form action=\"editarResultado.php\" method=\"POST\"><button type=\"submit\" name=\"btnResultEdit\" value=\"" . $resultsCompleted[0]['idPartido'] . "\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button></form>";
                                            echo "</td>";
                                            echo "</tr>";
                                        $aux = $result["idPartido"];
                                        }
                                    }
                                ?>
                                    <!-- END OF PHP -->
                            </table>
                        </div>
                        <!-- /content-panel -->
                    </div>
                    <!-- /col-md-12 -->
                </div>
                <!-- /row -->

            </section>
            <! --/wrapper -->
        </section>
        <!-- /MAIN CONTENT -->

        <!--main content end-->
        <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
            Proyecto HLC realizado por Jose Luis del Rio Muñoz Y Jose Antonio Simón
                <a href="resultados.php#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->

    <script>
        //custom select box

        $(function() {
            $('select.styled').customSelect();
        });
    </script>

</body>

</html>