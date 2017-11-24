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
$(document).ready(function() {
    $('#dtTableVehicle').DataTable({
        "language": {
            "url": "{{asset('json/spanishDataTable.json')}}"
        }
    });
} );

</script>


@endpush

