@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

    <!-- page content -->

    <div class="right_col" role="main">
         <div class="page-title">
              <div class="title_left">
                <h3> <small>Reporte de Alquileres de clientes</small></h3>
              </div>
          </div>
          <div class="row">
            
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Filtros de Reporte<small>Filtrado de alquileres</small></h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form2"  method="POST" action="{{url('/reportes/filtrosReportes/Clientes')}}" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="client_name" required="required" class="form-control col-md-7 col-xs-12" readonly="true">
                        <input id="client_id" name="client_id" type="text" readonly="true" style="display: none;">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
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
                      <label for="fechaInicial" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Inicio</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="fechaInicial" class="form-control col-md-7 col-xs-12" type="date" name="fechaInicial">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="fechaFin" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Final</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
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
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                    <h2>Alquileres <small>Filtrado de Alquileres por Cliente</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <p>A continuación se muestra el listado de Alquileres de los usuarios</p>
                    <div class="table-responsive">
                      <table id="dtTableRenting" class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                            </th>
                            <th class="column-title" style="display: table-cell;">Cliente </th>
                            <th class="column-title" style="display: table-cell;">Vehículo(placa) </th>
                            <th class="column-title" style="display: table-cell;">Fecha de Inicio</th>
                            <th class="column-title" style="display: table-cell;">Fecha Final  </th>
                            <th class="column-title" style="display: table-cell;">Costo Total </th>
                            
                            <th class="bulk-actions" colspan="7" style="display: none;">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt">1 Records Selected</span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($rentings as $renting)
                          <tr class="even pointer">
                            <td class="a-center ">
                              <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                            </td>
                            <td class=" ">{{$renting->getClientNameById($renting->client_id)}}</td>
                            <td class=" ">{{$renting->getPlateById($renting->vehicle_id)}}</td>
                            <td class=" ">{{$renting->starts_at}}</td>
                            <td class=" ">{{$renting->finishes_at}}</td>
                            <td class=" ">{{$renting->getTotalCost()}}</td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
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
  function getCliente(){                
      document.getElementById('client_id').value =  $('#dtTableClient input:radio:checked').val();
      document.getElementById('client_name').value =  $('#dtTableClient input:radio:checked').attr("alt");
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

@endpush


