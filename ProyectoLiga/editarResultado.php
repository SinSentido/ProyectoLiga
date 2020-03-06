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
            <a href="index.php" class="logo"><b>DASHGUM FREE</b></a>
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
                    <h5 class="centered">Nombre del usuario</h5>

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
                            <li><a href="resultados.php">Ver resultados</a></li>
                            <li class="active"><a href="crearResultado.php">Nuevo resultado</a></li>
                        </ul>
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
                <!-- BASIC FORM ELELEMNTS-->
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel form-panel-edit">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Formulario de Resultado</h4>
                            <form class="form-horizontal style-form" method="post" action="buttonsLogic.php">
                                <div class="form-group fg fgEdit">
                                    <div class="col-sm-10 edit-col-sm-10">
                                        <?php
                                            require './dbConnection.php';
                                            require './assets/database/queries.php';
                                            // Obtenemos el partido del item seleccionado de la pagina de mostrar
                                            $id = $_POST['btnResultEdit'];
                                            // Obtenemos los partidos con ese id
                                            $matches = getResultsByMatchWithDB($id, $database);
                                            // Obtenemos los equipos para mostrar sus nombres con el id de de los equipos que jugaron ese partido
                                            $equipoNombre1 = getTeamByIdWithDB($matches[0]["idEquipo"], $database );
                                            $equipoNombre2 = getTeamByIdWithDB($matches[1]["idEquipo"], $database );
                                            echo "<fieldset>";
                                            echo "<label class=\"col-sm-2 col-sm-2 control-label labelPerso\">Nombre del Equipo Local: ". "<span>" .$equipoNombre1[0]["nombreEquipo"]. "</span>" ."</label>";
                                            echo "<input type=\"number\" class=\"form-control editControl\" name=\"resultTeamEdit1\">";
                                            echo "</fieldset>";

                                            echo "<fieldset>";
                                            echo "<label class=\"col-sm-2 col-sm-2 control-label labelPerso\">Nombre del Equipo Visitante: ". "<span>" . $equipoNombre2[0]["nombreEquipo"]. "</span>" ."</label>";
                                            echo "<input type=\"number\" class=\"form-control editControl\" name=\"resultTeamEdit2\">";
                                            echo "</fieldset>";
                                            // Con este input invisible volvemos ha pasar el id hacia el otro documento.
                                            echo "<input type=\"number\" class=\"inputInvisible\" name=\"idMatch\" value=\"$id\">";
                                            // Con este el id del equipo 1.
                                            echo "<input type=\"number\" class=\"inputInvisible\" name=\"idTeam1\" value=\"" . $matches[0]["idEquipo"] . "\">";
                                            // Con este el id del equipo 2.
                                            echo "<input type=\"number\" class=\"inputInvisible\" name=\"idTeam2\" value=\"" . $matches[1]["idEquipo"] . "\">";
                                        ?>
                                        <div class="result">
                                            <input type="submit" value="Editar Resultado" name="btnEditResult">
                                        </div>
                                        
                                    </div>

                            </form>
                        </div>
                    </div>
                    <!-- col-lg-12-->
                </div>

            </section>
        </section>
        <!-- /MAIN CONTENT -->

        <!--main content end-->
        <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
                2014 - Alvarez.is
                <a href="editarResultado.php#" class="go-top">
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