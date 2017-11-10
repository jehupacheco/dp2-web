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
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" readonly="true">
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
                                                <input type="radio" name="optradio" alt="{{$cliente->nombre}} {{$cliente->lastname}}" value="{{$cliente->id}}">
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
                                <button type="button" class="btn btn-primary">Aceptar</button>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Placa de auto <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" readonly="true">
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
                                                <input type="radio" name="optradioVehicle" alt="{{$vehicle->plate}}" value="{{$vehicle->id}}">
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
                                <button type="button" class="btn btn-primary">Aceptar</button>
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
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Periodo de alquiler</label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" readonly="true">
                      </div>
                      
                    </div>
                  
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6">Costo Por Hora </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" class="form-control" readonly="true" placeholder="S/.">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6">Costo Total </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" class="form-control" readonly="true" placeholder="S/.">
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


    <div id="modalBuscarCliente2" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->     
        <div class="modal-content">
        
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">BUSCAR CLIENTE</h4>
            </div>

            <div class="modal-body">            
              <div class="container">         
                <div class="table-responsive">
                  <div class="container" id="TableContainer">
                    <div class="text-left">
                        <font color="black"> 
                          Ingresar alguno de los siguientes campos:
                          <ul>
                          <li>Nombre</li>
                          <li>Apellido Paterno</li>
                          <li>Edad</li>
                          <li>Correo</li>
                          <li>DNI</li>
                          <li>Estado</li>
                          </ul>
                        </font>                 
                      </div>
                      <br>
                                                    
                  </div>                
                </div>    
              </div>
            </div> 

            <div class="modal-footer">                      
              <div class="btn-inline">
                <div class="btn-group col-sm-4"></div>                            
                <div class="btn-group ">
                  <input class="btn btn-primary"  data-dismiss="modal" value="Confirmar">         
                </div>
                <div class="btn-group">
                  <a  data-dismiss="modal" class="btn btn-info">Cancelar</a>
                </div>
              </div>
            </div>

        </div>
      </div>
    </div>

    
@endsection
@push('scripts')
<script>
$(document).ready(function(){});

$(document).ready(function() {
    $('#dtTableClient').DataTable({
        "language": {
            "url": "{{asset('admin/json/spanishDataTable.json')}}"
        }
    });
} );
$(document).ready(function() {
    $('#dtTableVehicle').DataTable({
        "language": {
            "url": "{{asset('admin/json/spanishDataTable.json')}}"
        }
    });
} );

</script>

@endpush

