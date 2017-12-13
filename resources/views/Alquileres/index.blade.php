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
                    <h3> <small>Alquileres de Vehículos</small></h3>
                  </div>

                  
                </div>

          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <ul class="pagination pagination-split">
                  <!-- <li><a href="#">Todos los Clientes</a></li> -->
                  <li><a href="{{url('/alquileres/nuevo')}}">Nuevo Alquiler <i class="fa fa-plus" aria-hidden="true"></i></a></li>
                  <li><a href="{{url('/alquileres/entrega-devolucion/nuevo')}}">Entrega/Devolución <i class="fa fa-car" aria-hidden="true"></i></a></li>
                </ul>
              </div>
          </div>
          <div class="clearfix"></div>
         <!--  <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Alquileres <small>Filtrado de alquileres</small></h2>
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
                  <form id="demo-form2"  method="POST" action="{{url('alquileres/index/filtrado')}}" data-parsley-validate class="form-horizontal form-label-left">
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
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Placa de auto</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="plate" class="form-control col-md-7 col-xs-12" type="text" name="plate" readonly="true">
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de vehículo</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="org" name="org" class="form-control">
                          <option>Elija una opción</option>
                          @foreach($all_organizations as $org)
                            <option value="{{$org->id}}">{{$org->name}}</option>   
                          @endforeach
                        </select>

                      </div>
                    </div>
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Alquiler</label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="date" name="middle-name">
                      </div>
                      
                    </div>
                

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6">Costo Total Mínimo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" class="form-control" placeholder="S/.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6">Costo Total Máximo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" class="form-control" placeholder="S/.">
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                        <!-- <button type="submit" class="btn btn-success">Buscar</button>
                        <button type="submit"  class="btn btn-success">Buscar</button>
                        <a href="{{url('/')}}" class="btn btn-success">Regresar</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div> --> 
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                    <h2>Alquileres <small>Filtrado de alquileres</small></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#vehicles" id="vehicles-tab" role="tab" data-toggle="tab" aria-expanded="true">Vehiculos</a>
                        </li>
                        @can('Estacionamiento')
                        <li role="presentation" class=""><a href="#parkings" role="tab" id="parkings-tab" data-toggle="tab" aria-expanded="false">Estacionamientos</a>
                        </li>
                        @endcan
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="vehicles" aria-labelledby="vehicles-tab">
                          <p>Seleccionar una fila para ver su detalle</p>

                          <div class="table-responsive">
                            <table id="dtTableRenting" class="table table-striped jambo_table bulk_action">
                              <thead>
                                <tr class="headings">
                                  <!-- <th>
                                    <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                  </th> -->
                                  <th class="column-title" style="display: table-cell;">Placa </th>
                                  <th class="column-title" style="display: table-cell;">Organización </th>
                                  <th class="column-title" style="display: table-cell;">Cliente</th>
                                  <th class="column-title" style="display: table-cell;">Fecha Inicio  </th>
                                  <th class="column-title" style="display: table-cell;">Fecha Fin </th>
                                  <th class="column-title" style="display: table-cell;">Costo x Hora </th>
                                  <th class="column-title" style="display: table-cell;">Costo Total</th>
                                  <th class="column-title" style="display: table-cell;">Acciones</th>
                                  
                                  <th class="bulk-actions" colspan="7" style="display: none;">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt">1 Records Selected</span> ) <i class="fa fa-chevron-down"></i></a>
                                  </th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($rentings as $renting)
                                <tr class="even pointer">
                                  <!-- <td class="a-center ">
                                    <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                  </td> -->
                                  <td class=" ">{{$renting->getPlateById($renting->vehicle_id)}}</td>
                                  <td class=" ">{{$renting->getOrgNameById($renting->vehicle_id)}}</td>
                                  <td class=" ">{{$renting->getClientNameById($renting->client_id)}}</td>
                                  <td class=" ">{{$renting->starts_at}}</td>
                                  <td class=" ">{{$renting->finishes_at}}</td>
                                  <td class="a-right a-right ">S/. {{$renting->getCostUnitById($renting->vehicle_id)}}</td>
                                  <td class="a-right a-right ">S/. {{$renting->getTotalCost()}}</td>
                                  <td><a href="#" class="btn btn-info btn-xs fa fa-pencil"></a><a data-href="{{url('alquileres/'.$renting->id.'/destroy')}}" class="btn btn-danger btn-xs fa fa-trash" title="Eliminar" data-toggle="modal" data-target="#modalEliminar"></a></td>
                                </tr>
                                @endforeach
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                        @can('Estacionamiento')
                        <div role="tabpanel" class="tab-pane fade" id="parkings" aria-labelledby="parkings-tab">
                          <p>Seleccionar una fila para ver su detalle</p>

                          <div class="table-responsive">
                            <table id="dtTableParkingRenting" class="table table-striped jambo_table bulk_action">
                              <thead>
                                <tr class="headings">
                                  <!-- <th>
                                    <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                  </th> -->
                                  <th class="column-title" style="display: table-cell;">Organización </th>
                                  <th class="column-title" style="display: table-cell;">Cliente</th>
                                  <th class="column-title" style="display: table-cell;">Fecha Inicio  </th>
                                  <th class="column-title" style="display: table-cell;">Fecha Fin </th>
                                  <th class="column-title" style="display: table-cell;">Costo x Hora </th>
                                  <th class="column-title" style="display: table-cell;">Costo Total</th>
                                  <th class="column-title" style="display: table-cell;">Acciones</th>
                                  
                                  <th class="bulk-actions" colspan="6" style="display: none;">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt">1 Records Selected</span> ) <i class="fa fa-chevron-down"></i></a>
                                  </th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($parkingRentings as $renting)
                                <tr class="even pointer">
                                  <!-- <td class="a-center ">
                                    <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                  </td> -->
                                  <td class=" ">{{$renting->getOrgNameById($renting->vehicle_id)}}</td>
                                  <td class=" ">{{$renting->getClientNameById($renting->client_id)}}</td>
                                  <td class=" ">{{$renting->starts_at}}</td>
                                  <td class=" ">{{$renting->finishes_at}}</td>
                                  <td class="a-right a-right ">S/. {{$renting->getCostUnitById($renting->vehicle_id)}}</td>
                                  <td class="a-right a-right ">S/. {{$renting->getTotalCost()}}</td>
                                  <td><a href="#" class="btn btn-info btn-xs fa fa-pencil"></a><a data-href="{{url('alquileres/'.$renting->id.'/destroy')}}" class="btn btn-danger btn-xs fa fa-trash" title="Eliminar" data-toggle="modal" data-target="#modalEliminar"></a></td>
                                </tr>
                                @endforeach
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                        @endcan
                      </div>

                  </div>
                </div>
            </div>
          </div>
    </div>
    <!-- /page content -->

<!-- Modal Eliminar-->
    <div id="modalEliminar" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Confirmar</h4>
          </div>
          <div class="modal-body">
            <p>¿Está seguro que desea eliminar el alquiler?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-danger btn-ok">Confirmar</a>
          </div>
        </div>

      </div>
    </div>
@endsection




@push('scripts')


<script>
  function getCliente(){                
      document.getElementById('client_id').value =  $('#dtTableClient input:radio:checked').val();
      document.getElementById('client_name').value =  $('#dtTableClient input:radio:checked').attr("alt");
    }

  function getVehiculo(){                
      document.getElementById('vehicle_id').value =  $('#dtTableVehicle input:radio:checked').val();
      document.getElementById('plate').value =  $('#dtTableVehicle input:radio:checked').attr("alt");
    }
</script>

<script>
  var parkingTableInitialized = false;

  $('#modalEliminar').on('shown.bs.modal', function (e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
  });

  $(document).ready(function() {
      $('#dtTableRenting').DataTable({
          "language": {
              "url": "{{asset('json/spanishDataTable.json')}}"
          }
      });
  });

  $('#parkings-tab').click(function() {
      if (!parkingTableInitialized) {
        setTimeout(function () {
          $('#dtTableParkingRenting').DataTable({
              "language": {
                  "url": "{{asset('json/spanishDataTable.json')}}"
              }
          });
        }, 500);

        parkingTableInitialized = true;
      }

  })

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
@endpush


