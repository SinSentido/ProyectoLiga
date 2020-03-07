<?php

//Si no se ha hecho login redirección inmediatamente a la página de login
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

    <title>Proyecto Liga HLC</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>

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

            <?php
                require 'assets/database/queries.php';
                require './dbConnection.php';

                if(empty(getAllLeagues($database))){
                    header("Location: crearLiga.php");
                }

                $league = getLeagueById($database, "L1");
                $currentUser = getUserByName($database, "admin");
                $numOfTeams = getAllTeamsCount($database);
                $numOfMatches = getAllMatchesCount($database);
                $totalPoints = getTotalPointsInLeague($database);
            ?>

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
                        <a class="active" href="index.php">
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

                <div class="row">
                    <div class="col-lg-12 main-chart">
                        <h1><?php echo $league[0]['nombreLiga']; ?></h1>
                        <h2><?php echo $league[0]['descripcion']; ?></h2>
                        <div class="row mtbox">
                            <div class="col-md-4 col-sm-3 box0">
                                <div class="box1">
                                    <span class="li_t-shirt"></span>
                                    <h3><?php echo $numOfTeams; ?></h3>
                                </div>
                                <p>There are <?php echo $numOfTeams; ?> teams in the league</p>
                            </div>
                            <div class="col-md-4 col-sm-3 box0">
                                <div class="box1">
                                    <span class="li_world"></span>
                                    <h3><?php echo $totalPoints; ?></h3>
                                </div>
                                <p><?php echo $totalPoints; ?> points scored in the league</p>
                            </div>
                            <div class="col-md-4 col-sm-3 box0">
                                <div class="box1">
                                    <span class="li_calendar"></span>
                                    <h3><?php echo $numOfMatches; ?></h3>
                                </div>
                                <p><?php echo $numOfMatches; ?> partidos jugados</p>
                            </div>
                        </div>
                        <!-- /row mt -->


                        <div class="row">
                            <!-- TWITTER PANEL -->
                            <div class="col-md-12 mb">
                                <div class="darkblue-panel pn">
                                    <div class="darkblue-header">
                                        <h5>ESTADÍSTICAS DE PUNTOS</h5>
                                    </div>
                                    <canvas id="doughnut" height="300" width="400"></canvas>
                                    <script>
                                        var doughnutData = [{
                                            value: 60,
                                            color: "#68dff0"
                                        }, {
                                            value: 40,
                                            color: "#444c57"
                                        }];
                                        var myDoughnut = new Chart(document.getElementById("doughnut").getContext("2d")).Doughnut(doughnutData);
                                    </script>
                                    <p>Puntos anotados por equipo</p>
                                </div>
                                <! -- /darkblue panel -->
                            </div>
                            <!-- /col-md-4 -->
                        </div>
                        <!-- /row -->

                        <div class="row mt">
                            <!--CUSTOM CHART START -->
                            <div class="border-head">
                                <h3>PARTIDOS JUGADOS</h3>
                            </div>
                            <div class="custom-bar-chart">
                                <ul class="y-axis">
                                    <li><span>10.000</span></li>
                                    <li><span>8.000</span></li>
                                    <li><span>6.000</span></li>
                                    <li><span>4.000</span></li>
                                    <li><span>2.000</span></li>
                                    <li><span>0</span></li>
                                </ul>
                                <div class="bar">
                                    <div class="title">JAN</div>
                                    <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
                                </div>
                                <div class="bar ">
                                    <div class="title">FEB</div>
                                    <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
                                </div>
                                <div class="bar ">
                                    <div class="title">MAR</div>
                                    <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
                                </div>
                                <div class="bar ">
                                    <div class="title">APR</div>
                                    <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
                                </div>
                                <div class="bar">
                                    <div class="title">MAY</div>
                                    <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
                                </div>
                                <div class="bar ">
                                    <div class="title">JUN</div>
                                    <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
                                </div>
                                <div class="bar">
                                    <div class="title">JUL</div>
                                    <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                                </div>
                            </div>
                            <!--custom chart end-->
                        </div>
                        <!-- /row -->

                    </div>
                    <!-- /col-lg-9 END SECTION MIDDLE -->


                    <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->


                </div>
                <! --/row -->
            </section>
        </section>

        <!--main content end-->
        <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
                2014 - Alvarez.is
                <a href="index.php#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>
    <script src="assets/js/zabuto_calendar.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var unique_id = $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: 'Bienvenido a tu liga',
                // (string | mandatory) the text inside the notification
                text: 'Desde este panel de administración podrás gestionar tu liga',
                // (string | optional) the image to display on the left
                image: 'assets/img/pelotaLogin.png',
                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: true,
                // (int | optional) the time you want it to be alive for before fading out
                time: '',
                // (string | optional) the class name you want to apply to that specific message
                class_name: 'my-sticky-class'
            });

            return false;
        });
    </script>

    <script type="application/javascript">
        $(document).ready(function() {
            $("#date-popover").popover({
                html: true,
                trigger: "manual"
            });
            $("#date-popover").hide();
            $("#date-popover").click(function(e) {
                $(this).hide();
            });

            $("#my-calendar").zabuto_calendar({
                action: function() {
                    return myDateFunction(this.id, false);
                },
                action_nav: function() {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [{
                    type: "text",
                    label: "Special event",
                    badge: "00"
                }, {
                    type: "block",
                    label: "Regular event",
                }]
            });
        });


        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>


</body>

</html>