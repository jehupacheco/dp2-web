@extends('layouts.blank')



@push('stylesheets')

<!-- Bootstrap -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
    <script async="" data-rocketsrc="https://www.google-analytics.com/analytics.js" data-rocketoptimized="true"></script><script type="text/javascript">
//<![CDATA[
window.__cfRocketOptions = {byc:0,p:1508690442,petok:"42319e3ea318aad72b4aa824463dfc51ccb9d961-1509668416-1800"};
//]]>
</script>
<script type="text/javascript" src="https://ajax.cloudflare.com/cdn-cgi/scripts/78d64697/cloudflare-static/rocket.min.js"></script>

    <link href=" <link href="{{ asset("../vendors/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("../vendors/nprogress/nprogress.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("../vendors/iCheck/skins/flat/green.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("../vendors/google-code-prettify/bin/prettify.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("../vendors/select2/dist/css/select2.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("../vendors/switchery/dist/switchery.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("../vendors/starrr/dist/starrr.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("../vendors/bootstrap-daterangepicker/daterangepicker.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("../build/css/custom.min.css") }}" rel="stylesheet">

    
    <link href=" <link href="{{ asset("../vendors/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("../vendors/nprogress/nprogress.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("../vendors/jqvmap/dist/jqvmap.min.css") }}" rel="stylesheet">

    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
      <div>
          <div class="page-title">
              <div class="title_left">
                <h3> <small>Reporte de Usuarios por vehículo</small></h3>
              </div>
          </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_content">
              <div class="row">
                

                <!-- Descripción del viaje -->
                <div class="col-md-6 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Datos Generales</h2>
                      
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>

                      <div class="clearfix"></div>

                    </div>
                    <div class="x_content">
                      <p>Kilómetros recorridos: 5km</p>
                      <p>Costo Total: S/. 120.00</p>
                      <p>Costo por hora: S/50.00</p>
                      <p>Velocidad Promedio: 50 km/h</p>
                      <p>Energía consumida: 50</p>
                    </div>
                  </div>

                  <div class="col-md-9 col-sm-9 col-xs-12"><p>. </p></div>
                  <div class="col-md-9 col-sm-9 col-xs-12"><p>. </p></div>

                  <!-- Descripción de infracciones -->
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Detalles del viaje</h2>
                      
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>

                      <div class="clearfix"></div>

                    </div>
                    <div class="x_content">
                      <p>Total de infracciones cometidas: 5</p>
                      <p>Fecha de inicio del viaje: 12/05/2017 </p>
                      <p>Hora de inicio del viaje: 07:00 pm </p>
                      <p>Fecha de fin del viaje: 13/05/2017 </p>
                      <p>Hora de fin del viaje: 05:00 pm </p>
                    </div>
                  </div>
                  
                  <div class="col-md-9 col-sm-9 col-xs-12"><p>. </p></div>
                  <div class="col-md-9 col-sm-9 col-xs-12"><p>. </p></div>

                  <div class="col-md-9 col-sm-9 col-xs-12">
                  
                  <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Network Activities <small>Graph title sub-title</small></h3>
                  </div>
                  <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>October 4, 2017 - November 2, 2017</span> <b class="caret"></b>
                    </div>
                  </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div id="chart_plot_01" class="demo-placeholder" style="padding: 0px; position: relative;"><canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 662px; height: 280px;" width="662" height="280"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 91px; top: 264px; left: 89px; text-align: center;">02 km</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 91px; top: 264px; left: 193px; text-align: center;">03 km</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 91px; top: 264px; left: 296px; text-align: center;">04 km</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 91px; top: 264px; left: 400px; text-align: center;">05 km</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 91px; top: 264px; left: 503px; text-align: center;">06 km</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 91px; top: 264px; left: 607px; text-align: center;">07 km</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 252px; left: 13px; text-align: right;">0 km/h</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 232px; left: 7px; text-align: right;">10 km/h</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 213px; left: 7px; text-align: right;">20 km/h</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 194px; left: 7px; text-align: right;">30 km/h</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 174px; left: 7px; text-align: right;">40 km/h</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 155px; left: 7px; text-align: right;">50 km/h</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 136px; left: 7px; text-align: right;">60 km/h</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 116px; left: 7px; text-align: right;">70 km/h</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 97px; left: 7px; text-align: right;">80 km/h</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 78px; left: 7px; text-align: right;">90 km/h</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 58px; left: 1px; text-align: right;">100 km/h</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 39px; left: 2px; text-align: right;">110 km/h</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 20px; left: 1px; text-align: right;">120 km/h</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 1px; text-align: right;">130 km/h</div></div></div><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 662px; height: 280px;" width="662" height="280"></canvas></div>
                </div>
                

                <div class="clearfix"></div>
              </div>
            </div>

          </div>

                  
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12"><p>. </p></div>
                <div class="col-md-9 col-sm-9 col-xs-12"><p>. </p></div>
                <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Infracciones Cometidas <small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">

                    <ul class="list-unstyled timeline widget">
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a></a>
                                          </h2>
                            <div class="byline">
                              <span>13 hours ago</span> tipo <a>Exceso de Peso</a>
                            </div>
                            <p class="excerpt">Se excedió el peso permitido del vehículo</p>
                            <p class="excerpt">Fecha: 12/02/2017 hora: 05:00pm</p>
                            <a>Leer&nbsp;Mas</a>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a></a>
                                          </h2>
                            <div class="byline">
                              <span>13 hours ago</span> tipo <a>Exceso de Peso</a>
                            </div>
                            <p class="excerpt">Se excedió el peso permitido del vehículo</p>
                            <p class="excerpt">Fecha: 12/02/2017 hora: 05:00pm</p>
                            <a>Leer&nbsp;Mas</a>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

                </div>

                <div class="clearfix"></div>



              
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
  </div>
    <!-- /page content -->
@endsection

<!-- jQuery -->
    <script data-rocketsrc="../vendors/jquery/dist/jquery.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Bootstrap -->
    <script data-rocketsrc="../vendors/bootstrap/dist/js/bootstrap.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- FastClick -->
    <script data-rocketsrc="../vendors/fastclick/lib/fastclick.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- NProgress -->
    <script data-rocketsrc="../vendors/nprogress/nprogress.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- bootstrap-progressbar -->
    <script data-rocketsrc="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- iCheck -->
    <script data-rocketsrc="../vendors/iCheck/icheck.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- bootstrap-daterangepicker -->
    <script data-rocketsrc="../vendors/moment/min/moment.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/bootstrap-daterangepicker/daterangepicker.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- bootstrap-wysiwyg -->
    <script data-rocketsrc="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/jquery.hotkeys/jquery.hotkeys.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/google-code-prettify/src/prettify.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- jQuery Tags Input -->
    <script data-rocketsrc="../vendors/jquery.tagsinput/src/jquery.tagsinput.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Switchery -->
    <script data-rocketsrc="../vendors/switchery/dist/switchery.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Select2 -->
    <script data-rocketsrc="../vendors/select2/dist/js/select2.full.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Parsley -->
    <script data-rocketsrc="../vendors/parsleyjs/dist/parsley.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Autosize -->
    <script data-rocketsrc="../vendors/autosize/dist/autosize.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- jQuery autocomplete -->
    <script data-rocketsrc="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- starrr -->
    <script data-rocketsrc="../vendors/starrr/dist/starrr.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Custom Theme Scripts -->
    <script data-rocketsrc="../build/js/custom.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>

<!-- jQuery -->
    <script data-rocketsrc="../vendors/jquery/dist/jquery.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Bootstrap -->
    <script data-rocketsrc="../vendors/bootstrap/dist/js/bootstrap.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- FastClick -->
    <script data-rocketsrc="../vendors/fastclick/lib/fastclick.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- NProgress -->
    <script data-rocketsrc="../vendors/nprogress/nprogress.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Chart.js -->
    <script data-rocketsrc="../vendors/Chart.js/dist/Chart.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- gauge.js -->
    <script data-rocketsrc="../vendors/gauge.js/dist/gauge.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- bootstrap-progressbar -->
    <script data-rocketsrc="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- iCheck -->
    <script data-rocketsrc="../vendors/iCheck/icheck.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Skycons -->
    <script data-rocketsrc="../vendors/skycons/skycons.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Flot -->
    <script data-rocketsrc="../vendors/Flot/jquery.flot.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/Flot/jquery.flot.pie.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/Flot/jquery.flot.time.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/Flot/jquery.flot.stack.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/Flot/jquery.flot.resize.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Flot plugins -->
    <script data-rocketsrc="../vendors/flot.orderbars/js/jquery.flot.orderBars.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/flot-spline/js/jquery.flot.spline.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/flot.curvedlines/curvedLines.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- DateJS -->
    <script data-rocketsrc="../vendors/DateJS/build/date.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- JQVMap -->
    <script data-rocketsrc="../vendors/jqvmap/dist/jquery.vmap.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/jqvmap/dist/maps/jquery.vmap.world.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- bootstrap-daterangepicker -->
    <script data-rocketsrc="../vendors/moment/min/moment.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/bootstrap-daterangepicker/daterangepicker.js" type="text/rocketscript" data-rocketoptimized="true"></script>

    <!-- Custom Theme Scripts -->
    <script data-rocketsrc="../build/js/custom.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
<!-- Google Analytics -->
<script type="text/rocketscript" data-rocketoptimized="true">
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-23581568-13', 'auto');
ga('send', 'pageview');

</script>