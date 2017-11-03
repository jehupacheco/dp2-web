@extends('layouts.blank')

<!-- Bootstrap -->
    <script async="" data-rocketsrc="https://www.google-analytics.com/analytics.js" data-rocketoptimized="true"></script><script type="text/javascript">
//<![CDATA[
window.__cfRocketOptions = {byc:0,p:1508690442,petok:"42319e3ea318aad72b4aa824463dfc51ccb9d961-1509668416-1800"};
//]]>
</script>
<script type="text/javascript" src="https://ajax.cloudflare.com/cdn-cgi/scripts/78d64697/cloudflare-static/rocket.min.js"></script>

@push('stylesheets')
    <link href=" <link href="{{ asset("vendors/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet">" rel="stylesheet">
    <link href=" <link href="{{ asset("vendors/nprogress/nprogress.css") }}" rel="stylesheet">" rel="stylesheet">
    <link href=" <link href="{{ asset("vendors/iCheck/skins/flat/green.css") }}" rel="stylesheet">" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/google-code-prettify/bin/prettify.min.css") }}" rel="stylesheet">" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/select2/dist/css/select2.min.css") }}" rel="stylesheet">" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/switchery/dist/switchery.min.css") }}" rel="stylesheet">" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/starrr/dist/starrr.css") }}" rel="stylesheet">" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/bootstrap-daterangepicker/daterangepicker.css") }}" rel="stylesheet">" rel="stylesheet">
    <link href=" <link href="{{ asset("/build/css/custom.min.css") }}" rel="stylesheet">" rel="stylesheet">

    
    <link href=" <link href="{{ asset("/vendors/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet">" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/nprogress/nprogress.css") }}" rel="stylesheet">" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css") }}" rel="stylesheet">" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/jqvmap/dist/jqvmap.min.css") }}" rel="stylesheet">" rel="stylesheet">

    <!--para manejar Tablas-->
    <link href=" <link href="{{ asset("/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css") }}" rel="stylesheet">" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css") }}" rel="stylesheet">" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css") }}" rel="stylesheet">" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css") }}" rel="stylesheet">" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css") }}" rel="stylesheet">" rel="stylesheet">
    <link href=" <link href="{{ asset("vendors/nprogress/nprogress.css") }}" rel="stylesheet">" rel="stylesheet">

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
                <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sensor de Velocidad<small>.</small></h2>
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
                  <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                    <canvas id="lineChart" style="width: 636px; height: 318px;" width="636" height="318"></canvas>
                  </div>
                </div>
              </div>

              <!-- Descripción del viaje -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sensor de Batería del motor<small>.</small></h2>
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
                  <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                    <canvas id="lineChart" style="width: 636px; height: 318px;" width="636" height="318"></canvas>
                  </div>
                </div>
              </div>

              <!-- Descripción del viaje -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sensor de Peso<small>.</small></h2>
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
                  <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                    <canvas id="lineChart" style="width: 636px; height: 318px;" width="636" height="318"></canvas>
                  </div>
                </div>
              </div>

              <!-- Descripción del viaje -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sensor de Medición de Presión Sanguínea<small>.</small></h2>
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
                  <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                    <canvas id="lineChart" style="width: 636px; height: 318px;" width="636" height="318"></canvas>
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

<!-- jQuery -->
    <script src="/cdn-cgi/scripts/78d64697/cloudflare-static/email-decode.min.js"></script><script data-rocketsrc="../vendors/jquery/dist/jquery.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Bootstrap -->
    <script data-rocketsrc="../vendors/bootstrap/dist/js/bootstrap.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- FastClick -->
    <script data-rocketsrc="../vendors/fastclick/lib/fastclick.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- NProgress -->
    <script data-rocketsrc="../vendors/nprogress/nprogress.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- iCheck -->
    <script data-rocketsrc="../vendors/iCheck/icheck.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Datatables -->
    <script data-rocketsrc="../vendors/datatables.net/js/jquery.dataTables.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-buttons/js/buttons.flash.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-buttons/js/buttons.html5.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-buttons/js/buttons.print.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/jszip/dist/jszip.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/pdfmake/build/pdfmake.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/pdfmake/build/vfs_fonts.js" type="text/rocketscript" data-rocketoptimized="true"></script>

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