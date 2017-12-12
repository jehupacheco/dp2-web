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
                
                @if($org->name=="Eco-amigable")
                <h3> <small>Vehículos {{$org->name}}s</small></h3>
                @else
                <h3> <small>Vehículos para {{$org->name}}</small></h3>
                @endif
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Escribe algo...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Buscar</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_content">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                  <ul class="pagination pagination-split">
                    <li><a href="{{url('/vehiculos/'.$org->id.'/nuevo')}}">Nuevo Vehículo <i class="fa fa-plus" aria-hidden="true"></i></a></li>
                    <li><a href="" data-toggle="modal" data-target="#myModal">Configurar Parámetros <i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                  
                  

                  </ul>
                </div>
                <div class="clearfix"></div>
                @foreach($vehiculos as $vehiculo)
                <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                  <div class="well profile_view">
                    <div class="col-sm-12">
                      <div class="col-xs-11 col-sm-11 col-ms-11">
                        <h4 class="brief"><i>Vehículo {{$org->name}}</i></h4>
                      </div>
                      <div class="col-xs-1 col-sm-1 col-md-1 text-right" style="padding-right: 0px !important;">
                        <a type="button" class="btn btn-xs boton-edit" style="background-color: #d9dcde;" href="{{url('/vehiculos/'.$vehiculo->id.'/edit')}}">
                          <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                      </div>
                      <div class="left col-xs-7">
                        <h2><strong>Identificador:</strong> {{$vehiculo->plate}}</h2>
                        
                        <p><strong>Descripción: </strong> {{$vehiculo->description}}</p>
                        <ul class="list-unstyled">
                          <li><strong># Dirección Mac:</strong> {{$vehiculo->mac}}</li>
                          @if($vehiculo->is_rented())
                          <li style="color:#743030;"><strong>Estado:</strong>Alquilado</li>                         
                          @else
                          <li style="color:green;"><strong>Estado:</strong>Disponible</li>
                          @endif
                          
                        </ul>
                      </div>
                      <div class="right col-xs-5 text-center">
                        @if($org->slug == 'garden')
                          <img src="{{asset('images/autosjardinero.png')}}" alt="" class="img-circle img-responsive">
                        @elseif($org->slug == 'health')
                          <img src="{{asset('images/autoscardio.png')}}" alt="" class="img-circle img-responsive">
                        @elseif($org->slug == 'sales') 
                          <img src="{{asset('images/autosventas.png')}}" alt="" class="img-circle img-responsive">
                        @elseif($org->slug == 'eco')
                          <img src="{{asset('images/autosecologico.png')}}" alt="" class="img-circle img-responsive">
                        @elseif($org->slug == 'transport1')
                          <img src="{{asset('images/autosurban1.png')}}" alt="" class="img-circle img-responsive">
                        @elseif($org->slug == 'transport2') 
                          <img src="{{asset('images/autosurban2.png')}}" alt="" class="img-circle img-responsive">
                        @endif
                        
                      </div>
                    </div>
                    <div class="col-xs-12 bottom text-center">
                      <div class="col-xs-12 col-sm-6 emphasis">
                        <p class="ratings">
                          <a> Precio/hora: {{$vehiculo->price}} soles</a>
                        </p>
                      </div>
                      <div class="col-xs-12 col-sm-6 emphasis">
                        <a type="button" class="btn btn-success btn-xs" href="{{url('/asignarauto')}}"> <i class="fa fa-user">
                          </i> <i class="fa fa-comments-o"></i> </a>
                        <a type="button" class="btn btn-primary btn-xs" href="{{url('/vehiculos/'.$vehiculo->id.'/ver')}}">
                          <i class="fa fa-automobile"> </i> Ver Vehiculo
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                @if($vehiculos->count()==0)
                <div class="text-center">
                    <h3>No hay resultados</h3>
                </div>
                @endif
              </div>
            </div>
          </div>
          <div class="text-center">
              {{$vehiculos->links()}}
          </div>
        </div>
      </div>
      </div>
  </div>
    <!-- /page content -->

<!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Configuración de la Velocidad Máxima</h4>
          </div>
            <form method="POST" action="{{url('/vehiculos/put/configuracion')}}" class="form-horizontal form-border">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <br>
                <div class="form-group required">
                    <label for="nombre" class="control-label col-md-3">Velocidad Máxima: </label>
                    <div class=" input-group col-md-8">
                        <input type="number" step='0.01' id="max_vel" name="max_vel" required="required" class="form-control col-md-7 col-xs-12" value="{{$org->vel_max}}">
                    </div> 
                </div>  
                <div class="form-group required">
                    <label for="nombre" class="control-label col-md-3">Organización: </label>
                    <div class=" input-group col-md-8">
                        <input type="text"  class="form-control col-md-7 col-xs-12" value="{{$org->name}}" readonly="true">
                        <input type="hidden" id="org_id" name="org_id" class="form-control col-md-7 col-xs-12" value="{{$org->id}}">
                    </div> 
                </div>                             
                <div class="btn-inline modal-footer">
                    <!-- <div class="btn-group col-sm-4"></div> -->
                    
                    <div class="btn-group col-md-offset-4 col-md-2">
                        <input class="btn btn-primary" type="submit" value="Guardar">
                    </div>
                    <div class="btn-group col-md-2">
                        <a  data-dismiss="modal" class="btn btn-info">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>

      </div>
    </div>
@endsection

@push('scripts')
<script>
  $('#myModal').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
</script>
@endpush