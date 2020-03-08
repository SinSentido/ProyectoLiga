<?php 
    require 'assets/database/queries.php';
    require 'dbConnection.php';
    

    //Si hay un evento cargado en las cookies
    if(isset($_COOKIE['eventTitle']) && isset($_COOKIE['eventDate'])){
        //Se inserta el nuevo evento
        insertEvent($database, $_COOKIE['eventTitle'], $_COOKIE['eventDate']);

        //Borrar las cookies
        setcookie('eventTitle', "", time() -3600);
        setcookie('eventDate', "", time() -3600);
    }

    //Coge todos los eventos de la base de datos
    $arrayEventos = getAllEventsInfo($database);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        
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

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>Gestor de ligas de baloncesto</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
               
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
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
                        <a href="ranking.php">
                            <i class="fa fa-star"></i>
                            <span>Ranking</span>
                        </a>
                    </li>

                    <!--CALENDARIO DE PARTIDOS-->
                    <li>
                        <a class="active" href="calendarioPartidos.php">
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
            <div id="guardarEvento"></div>

          	<h3><i class="fa fa-angle-right"></i> Calendario de partidos</h3>
              <!-- page start-->
              <div class="row mt">
                  <aside class="col-lg-3 mt">
                      <h4><i class="fa fa-angle-right"></i> Equipos</h4>
                      <div id="external-events">

                      <!-- Comienza bloque php -->
                      <?php


                       $teams = getAllTeamsOrderedByName($database);

                        foreach($teams as $team){
                            echo "<div class=\"external-event label label-success\">" . $team['nombreEquipo'] . "</div>";
                        }
                      ?>
                    <!-- Fin del bloque php -->

                      </div>
                  </aside>
                  <aside class="col-lg-9 mt">
                      <section class="panel">
                          <div class="panel-body">
                              <div id="calendar" class="has-toolbar"></div>
                          </div>
                      </section>
                  </aside>
              </div>
              <!-- page end-->
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
          Proyecto HLC realizado por Jose Luis del Rio Muñoz Y Jose Antonio Simón
              <a href="calendarioPartidos.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
	<script src="assets/js/fullcalendar/fullcalendar.min.js"></script>    
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script>
        var Script = function () {


        /* initialize the external events
        -----------------------------------------------------------------*/

        $('#external-events div.external-event').each(function() {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });


        /* initialize the calendar
        -----------------------------------------------------------------*/

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(date, allDay) { // this function is called when something is dropped

                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject');

                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);

                // assign it the date that was reported
                copiedEventObject.start = date;
                copiedEventObject.allDay = allDay;

                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }

                storeEventInLocal(copiedEventObject);

            },
            events: <?php echo json_encode($arrayEventos); ?>
        });


        /********************************************************************************/
        /********************************************************************************/
        /* Guarda cada evento en la base de datos horario */
        function storeEventInLocal(event) {
            let formatted_date = event.start.getFullYear() + "-" + (event.start.getMonth() + 1) + "-" + event.start.getDate();

            document.cookie = `eventTitle = ${event.title}`;
            document.cookie = `eventDate = ${formatted_date}`;

            console.log(formatted_date)

            location.reload();
        }
        }();
    </script>    
  
  <script>
      //custom select box

      $(function(){
          $("select.styled").customSelect();
      });

  </script>

  </body>
</html>
