@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
          <div>
            <div class="row">
              @if (session('stored'))
                  <script>$("#modalSuccess").modal("show");</script>
                  
                  <div class="alert alert-success fade in">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>¡Éxito!</strong> {{session('stored')}}
                  </div>
              @endif

              @if (session('delete'))
                  <script>$("#modalError").modal("show");</script>   
                  <div class="alert alert-danger fade in"> {{session('delete')}}  </div>               
              @endif
            </div>
              <div class="page-title">
                  <div class="title_left">
                    <h3> <small>Alquiler de Vehículos</small></h3>
                  </div>

                  
                </div>

          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Nuevo Alquiler <small>Registro de nuevo alquiler de vehículo</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <button type="button" class="btn"><i class="fa fa-wrench"></i></button>
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
                  <form id="demo-form2" method="POST" action="{{url('alquileres/nuevo')}}" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="client_name" required="required" class="form-control col-md-7 col-xs-12" readonly="true">
                        <input type="text" id="client_id" name="client_id" style="display: none;">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <!-- <button type="submit" class="btn btn-success">Buscar</button> -->
                        
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target=".modalBuscarCliente"><i class="fa fa-search"></i></button>

                        <div class="modal modalBuscarCliente" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Lista de Clientes</h4>
                              </div>
                              <div class="modal-body">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2>Seleccionar Cliente</small></h2>

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
                                      Seleccionar un cliente de la siguiente lista por favor
                                    </p>
                                    <table id="dtTableClient" class="table table-striped table-bordered bulk_action">
                                      <thead>
                                        <tr>
                                          <th>Nombre</th>
                                          <th>Apellido</th>
                                          <th>Correo</th>
                                          <th>Teléfono</th>
                                          <th>Organización</th>
                                          <th>
                                           Seleccionar
                                          </th>
                                        </tr>
                                      </thead>


                                      <tbody>
                                        @foreach ($clientes as $cliente)
                                        <tr>
                                          <td>{{$cliente->name}}</td>
                                          <td>{{$cliente->lastname}}</td>
                                          <td>{{$cliente->email}}</td>
                                          <td>{{$cliente->phone}}</td>
                                          <td>{{$cliente->getOrgNameById($cliente->organization_id)}}</td>
                                          <td text-center>
                                                <input type="radio" name="optradio" alt="{{$cliente->name}} {{$cliente->lastname}}" value="{{$cliente->id}}">
                                          </td>
                                          
                                        </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="getCliente()" data-dismiss="modal" value="Confirmar">Aceptar</button>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Placa de auto <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="plate" class="form-control col-md-7 col-xs-12" required="required" type="text" name="middle-name" readonly="true">
                        <input type="text" id="vehicle_id" name="vehicle_id" style="display: none;">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <!-- <button type="submit" class="btn btn-success">Buscar</button> -->
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
                                        @if(is_null($vehicle->mac))
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

                    <!-- <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de vehículo</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control">
                          <option>Elija una opción</option>
                          @foreach($all_organizations as $org)
                            <option value="{{$org->id}}">{{$org->name}}</option>   
                          @endforeach
                        </select>

                      </div>
                    </div> -->
                    <div class="form-group">
                      <label for="reportrange" class="control-label col-md-3 col-sm-3 col-xs-12">Periodo de alquiler</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div id="reportrange" name="reportrange"  style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                          <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                          <span>December 30, 2017 - January 28, 2017</span> <b class="caret"></b>
                        </div>
                      </div>
                      <input id="start_date" name="start_date" type="text" style="display: none;">
                      <input id="end_date" name="end_date" type="text" style="display: none;">
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6">Costo Por Hora </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="price_hour" type="text" class="form-control" readonly="true" placeholder="S/.">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6">Costo Total </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="price_total" type="text" class="form-control" readonly="true" placeholder="S/.">
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mac"> Mac Address <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="mac" name="mac" required="required" class="form-control col-md-7 col-xs-12" data-inputmask="'mask' : '**:**:**:**:**:**'">
                      </div>

                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                        <!-- <button type="submit" class="btn btn-success">Buscar</button> -->
                        <button href="" type="submit" class="btn btn-success">Aceptar</button>
                        <a href="{{url('/alquileres/index')}}" class="btn btn-success">Regresar</a>
                      </div>
                    </div>

                    

                  </form>

                </div>
              </div>
            </div>
          </div>

        
    </div>
    <!-- /page content -->


    
@endsection
@push('scripts')

<script>
  $(document).ready(function() {
    $(":input").inputmask();
  });
</script>
<script>
  function getCliente(){                
      document.getElementById('client_id').value =  $('#dtTableClient input:radio:checked').val();
      document.getElementById('client_name').value =  $('#dtTableClient input:radio:checked').attr("alt");
    }

  function getVehiculo(){                
      document.getElementById('vehicle_id').value =  $('#dtTableVehicle input:radio:checked').val();
      document.getElementById('plate').value =  $('#dtTableVehicle input:radio:checked').attr("alt");
      document.getElementById('price_hour').value =  $('#precioVehiculo'+document.getElementById('vehicle_id').value).attr("alt") + ' Soles';
      var precio = parseFloat($('#price_hour').val());

      var start = moment(document.getElementById('start_date').value);
      var end  =  moment(document.getElementById('end_date').value);
      var difference = end.diff(start,'days');
      var total = precio * difference;
      document.getElementById('price_total').value = total.toFixed(2) + ' Soles';
    }
</script>

<script>
$(document).ready(function(){});

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
  <!-- bootstrap-daterangepicker -->
      $(document).ready(function() {

        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange span').html(start.format('MMMM D HH:mm:ss, YYYY') + ' - ' + end.format('MMMM D HH:mm:ss, YYYY'));
        };

        var optionSet1 = {
          
          startDate: moment(),
          endDate: moment().add(24, 'hours'),
          minDate: moment(),
          maxDate: '12/31/2018',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: true,
          timePickerIncrement: 10,
          timePicker12Hour: true,
          ranges: {
            'Un día': [moment(), moment().add(1, 'days')],
            'Una semana': [moment(), moment().add(6, 'days')],
            'Un mes': [moment(), moment().add(1, 'months')],
            'Un Año': [moment(), moment().add(12, 'months')],
          },
          opens: 'right',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'DD/MM/YYYY',
          separator: ' a ',
          locale: {
            applyLabel: 'Aplicar',
            cancelLabel: 'Cancelar',
            fromLabel: 'De',
            toLabel: 'hasta',
            customRangeLabel: 'Seleccionar',
            daysOfWeek: ['Do', 'Lu', 'Ma', 'Mie', 'Jue', 'Vie', 'Sab'],
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            firstDay: 1
          }
        };
        $('#reportrange span').html(moment().format('MMMM D HH:mm:ss, YYYY') + ' - ' + moment().add(24, 'hours').format('MMMM D HH:mm:ss, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
          // console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D HH:mm:ss, YYYY') + " to " + picker.endDate.format('MMMM D HH:mm:ss, YYYY'));
          document.getElementById('start_date').value = picker.startDate.format('YYYY/MM/DD HH:mm:ss');
          document.getElementById('end_date').value = picker.endDate.format('YYYY/MM/DD HH:mm:ss');

        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });
        $('#options1').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
          $('#reportrange').data('daterangepicker').remove();
        });
      });
    <!-- /bootstrap-daterangepicker -->

</script>
@endpush

