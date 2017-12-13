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
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#vehicles" id="vehicles-tab" role="tab" data-toggle="tab" aria-expanded="true">Vehiculo</a>
                        </li>
                        @can('Estacionamiento')
                        <li role="presentation" class=""><a href="#parkings" role="tab" id="parkings-tab" data-toggle="tab" aria-expanded="false">Estacionamiento</a>
                        </li>
                        @endcan
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="vehicles" aria-labelledby="vehicles-tab">
                          <form id="demo-form2" method="POST" action="{{url('alquileres/nuevo')}}" data-parsley-validate class="form-horizontal form-label-left">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="is_parking" value="false">
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
                                            <h2><small>Seleccionar Cliente</small></h2>

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
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary" onclick="getCliente('demo-form2', 'dtTableClient')" data-dismiss="modal" value="Confirmar">Aceptar</button>
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
                                            <h2><small>Seleccionar Vehículo</small></h2>
                                            
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
                                        <button type="button" class="btn btn-primary" onclick="getVehiculo('demo-form2', 'dtTableVehicle')" data-dismiss="modal" value="Confirmar">Aceptar</button>
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
                            
                            <!-- <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mac"> Mac Address <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="mac" name="mac" required="required" class="form-control col-md-7 col-xs-12" data-inputmask="'mask' : '**:**:**:**:**:**'">
                              </div>

                            </div> -->

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
                        <div role="tabpanel" class="tab-pane fade" id="parkings" aria-labelledby="parkings-tab">
                          <form id="demo-form3" method="POST" action="{{url('alquileres/nuevo')}}" data-parsley-validate class="form-horizontal form-label-left">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="is_parking" value="true">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="client_name" required="required" class="form-control col-md-7 col-xs-12" readonly="true">
                                <input type="text" id="client_id" name="client_id" style="display: none;">
                              </div>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <!-- <button type="submit" class="btn btn-success">Buscar</button> -->
                                
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target=".modalBuscarClienteParking"><i class="fa fa-search"></i></button>

                                <div class="modal modalBuscarClienteParking" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <h2><small>Seleccionar Cliente</small></h2>

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
                                            <table id="dtTableClientParking" class="table table-striped table-bordered bulk_action">
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
                                                @foreach ($parkingClients as $cliente)
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
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary" onclick="getCliente('demo-form3', 'dtTableClientParking')" data-dismiss="modal" value="Confirmar">Aceptar</button>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">ID Estacionamiento <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="plate" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" style="display: none;">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="vehicle_id" name="vehicle_id" required="required" readonly="true">
                              </div>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <!-- <button type="submit" class="btn btn-success">Buscar</button> -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target=".modalBuscarVehiculoParking"><i class="fa fa-search"></i></button>
            
                                <div class="modal modalBuscarVehiculoParking" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <h2><small>Seleccionar Estacionamiento</small></h2>
                                            
                                            <div class="clearfix"></div>
                                          </div>
                                          <div class="x_content">
                                            <p class="text-muted font-13 m-b-30">
                                              Seleccionar un estacionamiento de la siguiente lista por favor
                                            </p>
                                            <table id="dtTableVehicleParking" class="table table-striped table-bordered bulk_action">
                                              <thead>
                                                <tr>
                                                  <th>ID</th>
                                                  <th>Precio/Hora</th>
                                                  <th>Descripción</th>
                                                  <th>Organización</th>
                                                  <th>
                                                  Seleccionar
                                                  </th>
                                                </tr>
                                              </thead>


                                              <tbody>
                                                @foreach ($parkingVehicles as $vehicle)
                                                @if(!is_null($vehicle->mac))
                                                <tr>
                                                  <td>{{$vehicle->id}}</td>
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
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary" onclick="getVehiculo('demo-form3', 'dtTableVehicleParking')" data-dismiss="modal" value="Confirmar">Aceptar</button>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

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

                            <!-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-6">Costo Total </label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                  <input id="price_total" type="text" class="form-control" readonly="true" placeholder="S/.">
                                </div>
                            </div> -->

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

  function getCliente(form, table){
      $('#' + form + ' #client_id').val($('#'+ table + ' input:radio:checked').val());
      $('#' + form + ' #client_name').val($('#'+ table + ' input:radio:checked').attr("alt"));
    }


  function getVehiculo(form, table){
      $('#' + form + ' #vehicle_id').val($('#' + table + ' input:radio:checked').val());
      $('#' + form + ' #plate').val($('#' + table + ' input:radio:checked').attr("alt"));
      $('#' + form + ' #price_hour').val($('#precioVehiculo' + $('#' + form + ' #vehicle_id').val()).attr("alt") + ' Soles');



      var total = 0.00;
      $('#price_total').val(total.toFixed(2) + ' Soles');
    }
</script>

<script>
var shown = [false, false, false, false];

$('.modalBuscarCliente').on('shown.bs.modal', function() {
  if (!shown[0]) {
    $('#dtTableClient').DataTable({
        "language": {
            "url": "{{asset('json/spanishDataTable.json')}}"
        }
    });
    shown[0] = true;
  }
});

$('.modalBuscarVehiculo').on('shown.bs.modal', function() {
  if (!shown[1]) {
    $('#dtTableVehicle').DataTable({
        "language": {
            "url": "{{asset('json/spanishDataTable.json')}}"
        }
    });
    shown[1] = true;
  }
});

$('.modalBuscarClienteParking').on('shown.bs.modal', function() {
  if (!shown[2]) {
    $('#dtTableClientParking').DataTable({
        "language": {
            "url": "{{asset('json/spanishDataTable.json')}}"
        }
    });
    shown[2] = true;
  }
});

$('.modalBuscarVehiculoParking').on('shown.bs.modal', function() {
  if (!shown[3]) {
    $('#dtTableVehicleParking').DataTable({
        "language": {
            "url": "{{asset('json/spanishDataTable.json')}}"
        }
    });
    shown[3] = true;
  }
});

</script>


<script>
      function setDateRangePicker(form) {
        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#' + form + ' #start_date').val(start.format('YYYY/MM/DD HH:mm:ss')); 
          $('#' + form + ' #end_date').val(end.format('YYYY/MM/DD HH:mm:ss')); 
          $('#' + form + ' #reportrange span').html(start.format('MMMM D HH:mm:ss, YYYY') + ' - ' + end.format('MMMM D HH:mm:ss, YYYY'));
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
        $('#' + form + ' #reportrange span').html(moment().format('MMMM D HH:mm:ss, YYYY') + ' - ' + moment().add(24, 'hours').format('MMMM D HH:mm:ss, YYYY'));
        $('#' + form + ' #reportrange').daterangepicker(optionSet1, cb);
        $('#' + form + ' #reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D HH:mm:ss, YYYY') + " to " + picker.endDate.format('MMMM D HH:mm:ss, YYYY'));
          $('#' + form + ' #start_date').val(picker.startDate.format('YYYY/MM/DD HH:mm:ss')); 
          $('#' + form + ' #end_date').val(picker.endDate.format('YYYY/MM/DD HH:mm:ss')); 

          var precio = parseFloat($('#' + form + ' #price_hour').val());
          var start = moment($('#' + form +' #start_date').val());
          var end  =  moment($('#' + form +' #end_date').val());

          var difference = end.diff(start,'hours');

          var total = precio * difference;
          $('#price_total').val(total.toFixed(2) + ' Soles');
        });
        $('#' + form + ' #reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });

        
      }

      var parkingTabOpened = false;

      $(document).ready(function() {
        setDateRangePicker('demo-form2');
        setDateRangePicker('demo-form3');
      });

</script>
@endpush

