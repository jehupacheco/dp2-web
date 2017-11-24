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
                    <h3> <small>Organizaciones</small></h3>
                  </div>

                  
                </div>

          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                    <h2>Organizaciones</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <p>Seleccionar una fila para ver su detalle</p>

                    <div class="table-responsive">
                      <table id="dtTableRenting" class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title" style="display: table-cell;">Nombre</th>
                            <th class="column-title" style="display: table-cell;">Dirección</th>
                            <th class="column-title" style="display: table-cell;">Telefono</th>
                            <th class="column-title" style="display: table-cell;">Tipo</th>
                            <th class="column-title" style="display: table-cell;">Acciones</th>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($organizations as $organization)
                          <tr class="even pointer">
                            <td>
                              {{$organization->name}}
                            </td>
                            <td>
                              {{$organization->address}}
                            </td>
                            <td>
                              {{$organization->phone}}
                            </td>
                            <td>
                              {{$organization['is_parking'] ? 'Estacionamiento' : 'Auto' }}
                            </td>
                            <td>
                              <a href="{{route('organizations.edit', $organization->id)}}" class="btn btn-info btn-xs fa fa-pencil"></a>
                              {{--  <a href="{{route('organizations.destroy', $organization->id)}}" class="btn btn-danger btn-xs fa fa-trash"></a>  --}}
                            </td>
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
      $('#dtTableRenting').DataTable({
          "language": {
              "url": "{{asset('json/spanishDataTable.json')}}"
          }
      });
  } );
</script>
@endpush


