@extends('layouts.blank')

<!-- Bootstrap -->
    <script async="" data-rocketsrc="https://www.google-analytics.com/analytics.js" data-rocketoptimized="true"></script><script type="text/javascript">
//<![CDATA[
window.__cfRocketOptions = {byc:0,p:1508690442,petok:"42319e3ea318aad72b4aa824463dfc51ccb9d961-1509668416-1800"};
//]]>
</script>
<script type="text/javascript" src="https://ajax.cloudflare.com/cdn-cgi/scripts/78d64697/cloudflare-static/rocket.min.js"></script>

@push('stylesheets')
    <link href=" <link href="{{ asset("vendors/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("vendors/nprogress/nprogress.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("vendors/iCheck/skins/flat/green.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/google-code-prettify/bin/prettify.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/select2/dist/css/select2.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/switchery/dist/switchery.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/starrr/dist/starrr.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/bootstrap-daterangepicker/daterangepicker.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/build/css/custom.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/nprogress/nprogress.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/jqvmap/dist/jqvmap.min.css") }}" rel="stylesheet">
    <!--para manejar Tablas-->
    <link href=" <link href="{{ asset("/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("vendors/nprogress/nprogress.css") }}" rel="stylesheet">

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
                <h3> <small>Reporte de Medicion de Sensores</small></h3>
              </div>
          </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Reportes <small>Filtrado por vehiculo</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form id="demo-form2"  method="POST" action="{{url('reportes/sensores/filtrado')}}" data-parsley-validate class="form-horizontal form-label-left">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Placa de auto</label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <input id="plate" class="form-control col-md-3 col-xs-12" type="text" name="plate" readonly="true">
                    <input id="vehicle_id" name="vehicle_id" type="text" readonly="true" style="display: none;">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target=".modalBuscarVehiculo"><i class="fa fa-search"></i></button>

                    <div class="modal modalBuscarVehiculo" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Lista de Vehículos</h4>
                          </div>
                          <div class="modal-body">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              <div class="x_title">
                                <h2>Seleccionar Vehículo</small></h2>

                                <ul class="nav navbar-right panel_toolbox">
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                  </li>
                                  <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                      <li><a href="#">Settings 1</a>
                                      </li>
                                      <li><a href="#">Settings 2</a>
                                      </li>
                                    </ul>
                                  </li>
                                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                                  </li>
                                </ul>
                                <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                                <p class="text-muted font-13 m-b-30">
                                  Seleccionar un vehículo de la siguiente lista por favor
                                </p>
                                <table id="dtTableVehicle" class="table table-striped table-bordered bulk_action">
                                  <thead>
                                    <tr>
                                      <th>Placa</th>
                                      <th>Precio/Hora</th>
                                      <th>Descripción</th>
                                      <th>Organización</th>
                                      <th>
                                       Seleccionar
                                      </th>
                                    </tr>
                                  </thead>


                                  <tbody>
                                    @foreach ($vehicles as $vehicle)
                                    @if(!is_null($vehicle->mac))
                                    <tr>
                                      <td>{{$vehicle->plate}}</td>
                                      <td>{{$vehicle->price}}</td>
                                      <td>{{$vehicle->description}}</td>
                                      <td>{{$vehicle->getOrgNameById($vehicle->organization_id)}}</td>
                                      <td text-center>
                                            <input type="radio" name="optradioVehicle" alt="{{$vehicle->plate}}"  value="{{$vehicle->id}}">
                                            <input id="precioVehiculo{{$vehicle->id}}" type="text" alt="{{$vehicle->price}}" style="display: none;">
                                      </td>
                                      
                                    </tr>
                                    @endif
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="getVehiculo()" data-dismiss="modal" value="Confirmar">Aceptar</button>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de sensor</label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <select id="sensor_id" name="sensor_id" class="form-control">
                      <option>Elija una opción</option>
                      @foreach($sensors as $sensor)
                        <option value="{{$sensor->id}}">{{$sensor->description}}</option>   
                      @endforeach
                    </select>

                  </div>
                </div>
                <div class="form-group">
                  <label for="fechaInicial" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Inicio</label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <input id="fechaInicial" class="form-control col-md-7 col-xs-12" type="date" name="fechaInicial">
                  </div>
                  
                </div>
                <div class="form-group">
                  <label for="fechaFin" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Final</label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <input id="fechaFin" class="form-control col-md-7 col-xs-12" type="date" name="fechaFin">
                  </div>
                  
                </div>
            
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                    <!-- <button type="submit" class="btn btn-success">Buscar</button> -->
                    <button type="submit"  class="btn btn-success">Buscar</button>
                    <a href="{{url('/')}}" class="btn btn-success">Regresar</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Información sensores -->
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_content">
              <div class="row">
                

                <!-- Descripción del viaje -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sensor de {{$sensorselected->description}}<small>.</small></h2>
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
    <!-- /page content -->
@endsection

@push('scripts')
<script>

  function getVehiculo(){                
      document.getElementById('vehicle_id').value =  $('#dtTableVehicle input:radio:checked').val();
      document.getElementById('plate').value =  $('#dtTableVehicle input:radio:checked').attr("alt");
    }
</script>

<script>
  $(document).ready(function() {
      $('#dtTableRenting').DataTable({
          "language": {
              "url": "{{asset('json/spanishDataTable.json')}}"
          }
      });
  } );
  $(document).ready(function() {
    $('#dtTableClient').DataTable({
        "language": {
            "url": "{{asset('json/spanishDataTable.json')}}"
        }
    });
} );
$(document).ready(function() {
    $('#dtTableVehicle').DataTable({
        "language": {
            "url": "{{asset('json/spanishDataTable.json')}}"
        }
    });
} );
</script>



<script>
   $(function () {
   var bindDatePicker = function() {
    $(".date").datetimepicker({
        format:'YYYY-MM-DD',
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down"
      }
    }).find('input:first').on("blur",function () {
      // check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
      // update the format if it's yyyy-mm-dd
      var date = parseDate($(this).val());

      if (! isValidDate(date)) {
        //create date based on momentjs (we have that)
        date = moment().format('YYYY-MM-DD');
      }

      $(this).val(date);
    });
  }
   
   var isValidDate = function(value, format) {
    format = format || false;
    // lets parse the date to the best of our knowledge
    if (format) {
      value = parseDate(value);
    }

    var timestamp = Date.parse(value);

    return isNaN(timestamp) == false;
   }
   
   var parseDate = function(value) {
    var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
    if (m)
      value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

    return value;
   }
   
   bindDatePicker();
 });
</script>


<!-- Google Analytics -->
<script type="text/rocketscript" data-rocketoptimized="true">
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-23581568-13', 'auto');
ga('send', 'pageview');



</script>

<script>
      Chart.defaults.global.legend = {
        enabled: false
      };
      var readinglist = <?php echo json_encode($readinglist); ?>;
      // Line chart
      //console.log(readinglist);
      var labels = [],data=[];
      for (var i = 0; i < readinglist.length; i++) {
          labels.push(readinglist[i].dia);
          data.push(readinglist[i].value);
      }
      var ctx = document.getElementById("lineChart");
      var lineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
            label: "My First dataset",
            backgroundColor: "rgba(38, 185, 154, 0.31)",
            borderColor: "rgba(38, 185, 154, 0.7)",
            pointBorderColor: "rgba(38, 185, 154, 0.7)",
            pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointBorderWidth: 1,
            data: data
          }]
        },
      });

    </script>

    @endpush