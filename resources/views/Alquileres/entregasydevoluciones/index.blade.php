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
                            <td><a href="{{url('alquileres/entrega-devolucion/'.$renting->id.'/nuevo')}}" class="btn btn-success btn-xs fa fa-check"></a></td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                    </div>
                  </div>

                </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                    <h2>Entregas/Devoluciones <i class="fa fa-exchange" aria-hidden="true"></i> <small>Información de Entregas/Devoluciones de Vehículos</small></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <p>Seleccionar un alquiler</p>

                    <div class="table-responsive">
                      <table id="dtTableInOut" class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title" style="display: table-cell;">Placa </th>
                            <th class="column-title" style="display: table-cell;">Organización </th>
                            <th class="column-title" style="display: table-cell;">Cliente</th>
                            <th class="column-title" style="display: table-cell;">Se entregó</th>
                            <th class="column-title" style="display: table-cell;">Se devolvió </th>
                            <th class="column-title" style="display: table-cell;"><i class="fa fa-calendar" aria-hidden="true"></i> Entrega </th>
                            <th class="column-title" style="display: table-cell;"><i class="fa fa-calendar" aria-hidden="true"></i> Devolución</th>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($rentingsAll as $renting)
                          <tr class="even pointer">
                            <td class=" ">{{$renting->getPlateById($renting->vehicle_id)}}</td>
                            <td class=" ">{{$renting->getOrgNameById($renting->vehicle_id)}}</td>
                            <td class=" ">{{$renting->getClientNameById($renting->client_id)}}</td>
                            @if(!is_null($renting->delivered_at))
                            <td class=" ">&nbsp;&nbsp;&nbsp;<i class="fa fa-check fa-lg" style="color: #49ea49;"></i></td> 
                            @else
                            <td class=" ">&nbsp;&nbsp;&nbsp;<i class="fa fa-minus-circle fa-lg" aria-hidden="true"></i></td>
                            @endif
                            @if(!is_null($renting->returned_at))
                            <td class=" ">&nbsp;&nbsp;&nbsp;<i class="fa fa-check fa-lg" style="color: #49ea49;"></i></td>
                            @else
                            <td class=" ">&nbsp;&nbsp;&nbsp;<i class="fa fa-minus-circle fa-lg" aria-hidden="true"></i></td>
                            @endif
                            @if(!is_null($renting->delivered_at))
                            <td class=" ">{{$renting->delivered_at}}</td>
                            @else
                            <td class=" ">---</td>
                            @endif
                            @if(!is_null($renting->returned_at))
                            <td class=" ">{{$renting->returned_at}}</td>
                            @else
                            <td class=" ">---</td>
                            @endif
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
  $(document).ready(function() {
    $(":input").inputmask();
  });
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
$(document).ready(function() {
    $('#dtTableInOut').DataTable({
        "language": {
            "url": "{{asset('json/spanishDataTable.json')}}"
        }
    });
} );

</script>


@endpush

