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
                    <h3> <small>Registro de Entrega/Devolución de vehículo</small></h3>
                  </div>    
              </div>

          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                    <h2>Alquileres <small>Filtrado de alquileres pendientes de Entrega/Devolución</small></h2>
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

                    <p>Seleccionar un alquiler</p>

                    <div class="table-responsive">
                      <table id="dtTableRenting" class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title" style="display: table-cell;">Placa </th>
                            <th class="column-title" style="display: table-cell;">Organización </th>
                            <th class="column-title" style="display: table-cell;">Cliente</th>
                            <th class="column-title" style="display: table-cell;">Fecha Inicio  </th>
                            <th class="column-title" style="display: table-cell;">Fecha Fin </th>
                            <th class="column-title" style="display: table-cell;">Costo x Hora </th>
                            <th class="column-title" style="display: table-cell;">Costo Total</th>
                            <th class="column-title" style="display: table-cell;">Acciones</th>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($rentings as $renting)
                          <tr class="even pointer">
                            <td class=" ">{{$renting->getPlateById($renting->vehicle_id)}}</td>
                            <td class=" ">{{$renting->getOrgNameById($renting->vehicle_id)}}</td>
                            <td class=" ">{{$renting->getClientNameById($renting->client_id)}}</td>
                            <td class=" ">{{$renting->starts_at}}</td>
                            <td class=" ">{{$renting->finishes_at}}</td>
                            <td class="a-right a-right ">S/. {{$renting->getCostUnitById($renting->vehicle_id)}}</td>
                            <td class="a-right a-right ">S/. {{$renting->getTotalCost()}}</td>
                            <td><a href="#" class="btn btn-success btn-xs fa fa-check"></a></td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Nueva Entrega/Devolución <small>Registro de Entrega/Devolución de vehículo</small></h2>
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
                  <form id="demo-form2" method="POST" action="{{url('alquileres/entrega-devolucion/'.$renting->id.'/nuevo')}}" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente</label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="text" id="client_name" required="required" class="form-control col-md-7 col-xs-12" readonly="true" value="{{$renting->getClientNameById($renting->client_id)}}">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Placa de auto</label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input id="plate" class="form-control col-md-7 col-xs-12" required="required" type="text" name="plate" readonly="true" value="{{$renting->getPlateById($renting->vehicle_id)}}">
                      </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6">Fecha y Hora de Entrega </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="starts_at" type="text" class="form-control" readonly="true" value="{{$renting->starts_at}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6">Fecha y Hora de Retorno </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="starts_at" type="text" class="form-control" readonly="true" value="{{$renting->finishes_at}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6">Costo Por Hora </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="price_hour" type="text" class="form-control" readonly="true" placeholder="S/." value="S/. {{$renting->getCostUnitById($renting->vehicle_id)}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6">Costo Total </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="price_total" type="text" class="form-control" readonly="true" placeholder="S/." value="S/. {{$renting->getTotalCost()}}">
                        </div>
                    </div>
                    
                   <div class="form-group">
                      <label for="option_selected" class="control-label col-md-3 col-sm-3 col-xs-6">Entrega/Devolución <span class="required">*</span></label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        @if(is_null($renting->delivered_at))
                        <input id="option_selected" name="option_selected" type="text" class="form-control" readonly="true"  value="Entrega">
                        @endif
                        @if(is_null($renting->returned_at) && !is_null($renting->delivered_at))
                        <input id="option_selected" name="option_selected" type="text" class="form-control" readonly="true"  value="Devolución">
                        @endif 
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="permisos">El vehículo fue entregado/retornado a tiempo</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <p style="padding: 5px;">
                            <input type="checkbox" name="delivered_returned_onTime" id="delivered_returned_onTime" value="delivered_returned_onTime" data-parsley-mincheck="2" class="flat" /> Sí
                            <br />
                          <p>
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
    $('#dtTableRenting').DataTable({
        "language": {
            "url": "{{asset('json/spanishDataTable.json')}}"
        }
    });
} );
</script>

@endpush

