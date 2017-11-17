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
                <h3>Datos del vehículo <small>(Identificador: {{$vehiculo->plate}})</small></h3>
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
					<a href="{{url('/vehiculos/'.$vehiculo->id.'/ubicacion')}}">
						<img src="/img/mapa.jpg" alt="Ubicación" class="img-circle profile_img">
					</a>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4">
					<a href="{{url('/sensores/'.$vehiculo->id.'')}}">
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
					<label for="">Ver en tiempo real donde se encuentra ubicado el vehículo seleccionado</label>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 text-center">
					<label for="">Ver la última lectura de los sensores del vehículo</label>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 text-center">
					<label for="">Ver las alertas generadas para el vehículo</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-4">
					<a href="{{url('/vehiculos/'.$vehiculo->id.'/deshabilitar')}}">
						<img src="/img/deshabilitar.jpg" alt="Ubicación" class="img-circle profile_img">
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-4 text-center">
					<h3 for="">Inhabilitar</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-4 text-center">
					<label for="">Inhabilitar el vehículo para que no se pueda usar</label>
				</div>
			</div>
		</div>
    </div>
    <!-- /page content -->
@endsection
