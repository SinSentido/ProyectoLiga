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
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />

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
                    <li><a class="logout" href="login.php">Logout</a></li>
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
                        <a class="active" href="javascript:;">
                            <i class="fa fa-desktop"></i>
                            <span>Equipos</span>
                        </a>
                        <ul class="sub">
                            <li><a href="equipos.php">Ver equipos</a></li>
                            <li class="active"><a href="crearEquipo.php">Crear equipo</a></li>
                        </ul>
                    </li>

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
                <h3><i class="fa fa-angle-right"></i> Formulario Equipo</h3>

                <!-- BASIC FORM ELELEMNTS -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Creacion De Equipo</h4>

                            <form class="form-horizontal style-form" method="POST" action="buttonsLogic.php">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nombre Del Equipo</label>
                                    <div class="col-sm-10">
                                        <input name="teamName" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Numero Social</label>
                                    <div class="col-sm-10">
                                        <input name="socialNum" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Ciudad</label>
                                    <div class="col-sm-10">
                                        <input name="city" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="result">
                                    <button type="submit" name="btnCreate">Crear equipo</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- col-lg-12-->
                </div>

            </section>
            <! --/wrapper -->
        </section>
        <!-- /MAIN CONTENT -->

        <!--main content end-->
        <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
            Proyecto HLC realizado por Jose Luis del Rio Muñoz Y Jose Antonio Simón
                <a href="crearEquipo.php#" class="go-top">
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
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

    <!--custom switch-->
    <script src="assets/js/bootstrap-switch.js"></script>

    <!--custom tagsinput-->
    <script src="assets/js/jquery.tagsinput.js"></script>

    <!--custom checkbox & radio-->

    <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


    <script src="assets/js/form-component.js"></script>


    <script>
        //custom select box

        $(function() {
            $('select.styled').customSelect();
        });
    </script>

</body>

</html>