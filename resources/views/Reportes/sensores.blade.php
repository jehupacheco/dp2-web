@extends('layouts.blank')

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
              <h2>Reportes <small>Filtrado por viajes</small></h2>
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
              <p>Elegir un tipo de sensor y un viaje relacionado para mostrar los datos obtenidos</p>
              <br />
              <form id="demo-form2"  method="POST" action="{{url('reportes/sensores/filtrado')}}" data-parsley-validate class="form-horizontal form-label-left">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Viaje</label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <input id="travel_name" class="form-control col-md-3 col-xs-12" type="text" name="travel_name" readonly="true">
                    <input id="travel_id" name="travel_id" type="text" readonly="true" style="display: none;">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target=".modalBuscarViaje"><i class="fa fa-search"></i></button>

                    <div class="modal modalBuscarViaje" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Lista de viajes</h4>
                          </div>
                          <div class="modal-body">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              <div class="x_title">
                                <h2>Seleccionar Viaje</small></h2>

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
                                  Seleccionar un viaje de la siguiente lista por favor
                                </p>
                                <table id="dtTableTravel" class="table table-striped table-bordered bulk_action">
                                  <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>Cliente</th>
                                      <th>Vehiculo</th>
                                      <th>Distancia Total</th>
                                      <th>
                                       Seleccionar
                                      </th>
                                    </tr>
                                  </thead>


                                  <tbody>
                                    @foreach ($travels as $travel)
                                    @if(!is_null($travel->id))
                                    <tr>
                                      <td>{{$travel->id}}</td>
                                      <td>{{$travel->getClientNameById($travel->client_id)}}</td>
                                      <td>{{$travel->getVehiclePlacaById($travel->vehicle_id)}}</td>
                                      <td>{{$travel->total_distance}}</td>
                                      <td text-center>
                                            <input type="radio" name="optradioTravel" alt="Viaje {{$travel->id}}"  value="{{$travel->id}}">
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
                            <button type="button" class="btn btn-primary" onclick="getTravel()" data-dismiss="modal" value="Confirmar">Aceptar</button>
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
                <div class="col-md-12 col-sm-12 col-xs-12">
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

  function getTravel(){                
      document.getElementById('travel_id').value =  $('#dtTableTravel input:radio:checked').val();
      document.getElementById('travel_name').value =  $('#dtTableTravel input:radio:checked').attr("alt");
    }
</script>

<script>
$(document).ready(function() {
    $('#dtTableTravel').DataTable({
        "language": {
            "url": "{{asset('json/spanishDataTable.json')}}"
        }
    });
} );
</script>

<script>
      Chart.defaults.global.legend = {
        enabled: false
      };
      var readinglist = <?php echo json_encode($readinglist); ?>;
      var sensor = <?php echo json_encode($sensorselected); ?>;
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
            label: sensor.description,
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