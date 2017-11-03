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
                <h3> <small>Clientes de autos</small></h3>
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
                    <!-- <li><a href="#">Todos los Clientes</a></li> -->
                    <li><a href="{{url('/clientes/nuevo')}}">Nuevo Cliente <i class="fa fa-plus" aria-hidden="true"></i></a></li>
                  </ul>
                </div>

                <div class="clearfix"></div>
                

                @foreach($clientes as $cliente)

                  <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                    <div class="well profile_view">
                      <div class="col-sm-12">
                        <h4 class="brief"><i>Cliente de vehículo</i></h4>
                        <div class="left col-xs-7">
                          <h2>{{$cliente->name}} {{$cliente->lastname}}</h2>
                          <p><strong>Tipo de vehículo: </strong> Vehículo {{$cliente->organization->name}} </p>
                          <ul class="list-unstyled">
                            <li><i class="fa fa-building"></i> Email: {{$cliente->email}}</li>
                            <li><i class="fa fa-phone"></i> Teléfono Celular #: {{$cliente->phone}}</li>
                          </ul>
                        </div>
                        <div class="right col-xs-5 text-center">
                          <img src="{{ Gravatar::src($cliente->email) }}" alt="" class="img-circle img-responsive">
                        </div>
                      </div>
                      <div class="col-xs-12 bottom text-center">
                        <div class="col-xs-12 col-sm-6 emphasis">
                          <p class="ratings">
                            <a>{{$cliente->rating}}.0</a>
                            @for ($i = 0; $i < $cliente->rating; $i++)
                                <a href="#"><span class="fa fa-star"></span></a>
                            @endfor

                          </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 emphasis">
                          <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                            </i> <i class="fa fa-comments-o"></i> </button>
                          <a type="button" class="btn btn-primary btn-xs" href="{{url('/clientes/'.$cliente->id.'/perfil')}}">
                            <i class="fa fa-user"> </i> Ver Usuario
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                @endforeach
                @if($clientes->count()==0)
                <div class="text-center">
                    <h3>No hay resultados</h3>
                </div>
                @endif
              </div>
            </div>
          </div>
          <div class="text-center">
              {{$clientes->links()}}
          </div>
        </div>
      </div>
	    </div>
	</div>
    <!-- /page content -->
@endsection