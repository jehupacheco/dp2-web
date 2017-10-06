@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
		<div>
			<div class="page-title">
              <div class="title_left">
                <h3>Página de Inicio</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Escriba algo...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Buscar</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
			<div class="clearfix"></div>
			<br><br><br>
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-4">
					<a href="{{url('/ubicaciones/buscar_usuario')}}">
						<img src="/img/mapa.jpg" alt="Ubicación" class="img-circle profile_img">
					</a>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4">
					<a href="{{url('/sensores')}}">
						<img src="/img/sensores.png" alt="Avatar of {{ Auth::user()->name }}" class="img-circle profile_img">
					</a>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4">
					<a href="{{url('/alertas')}}">
						<img src="/img/alertas.png" alt="Avatar of {{ Auth::user()->name }}" class="img-circle profile_img" >
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-4 text-center">
					<h3 for="">Ubicación</h3>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 text-center">
					<h3 for="">Sensores</h3>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 text-center">
					<h3 for="">Alertas</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-4 text-center">
					<label for="">Ver en tienpo real donde se encuentran ubicados los autos asginados al usuario</label>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 text-center">
					<label for="">Ver la lectura de los sensores generadas por los autos que se encuentran asignados al usuario </label>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 text-center">
					<label for="">Ver las alertas más importantes generadas por los autos que se encuentran asignados al usuario</label>
				</div>
			</div>
			
		</div>
    </div>
    <!-- /page content -->
@endsection