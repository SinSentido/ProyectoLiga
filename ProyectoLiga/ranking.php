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

                    <!--DASHBOARD-->
                    <li class="mt">
                        <a href="index.php">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <hr>

                    <h4 class="sidebar-subtitle">Configuración</h4>

                    <!--EDITAR LIGA-->
                    <li class="mt">
                        <a href="editarLiga.php">
                            <i class="fa fa-pencil-square"></i>
                            <span>Editar liga</span>
                        </a>
                    </li>

                    <!--EQUIPOS-->
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

                    <!--RESULTADOS-->
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-cogs"></i>
                            <span>Resultados</span>
                        </a>
                        <ul class="sub">
                            <li><a href="resultados.php">Ver resultados</a></li>
                            <li><a href="crearResultado.php">Nuevo resultado</a></li>
                        </ul>
                    </li>

                    <hr>
                    <h4 class="sidebar-subtitle">Datos</h4>
                
                    <!-- RANKING -->
                    <li class="mt">
                        <a class="active" href="ranking.php">
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
                <h3><i class="fa fa-angle-right"></i> RANKING </h3>

                <!-- row -->
                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <table class="table table-striped table-advance table-hover">
                                <h4><i class="fa fa-angle-right"></i> Equipos</h4>
                                <hr>
                                <thead>
                                    <tr>
                                        <th>Posición</th>
                                        <th>Nombre</th>
                                        <th>Victorias</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <!-- PHP FOR THE TABLE TEAMS -->
                                <?php
                                    require './dbConnection.php';
                                    require './assets/database/queries.php';

                                    $teams = getAllTeamsWithVictories($database);
                                    $position = 1;

                                    foreach($teams as $team){
                                        echo "<tr>";
                                        echo "<td>" . $position . "</td>";
                                        echo "<td>" . $team['nombreEquipo'] . "</td>";
                                        echo "<td>" . $team['victorias'] . "</td>";
                                        echo "</tr>";

                                        $position += 1;
                                    }
                                ?>
                                <!-- END OF PHP -->
                                    
                                </tbody>
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
                2014 - Alvarez.is
                <a href="ranking.php#" class="go-top">
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