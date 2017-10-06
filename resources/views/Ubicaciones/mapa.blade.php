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
                <h3>Mapa del usuario Juan Perez</h3>
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
          <div class="row">
          		<div class="col-md-6 col-sm-6 col-xs-6 col-md-offset-1">
					<a href="#">
						<img src="/img/mapa1.png" alt="Ubicación" class="img profile_img" style="height: 500px;width: 1000px;">
					</a>
				</div>
				
          </div>
          <div class="ln_solid"></div>
	        <div class="form-group">
	          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
	            <a href="{{url('/ubicaciones/buscar/usuarios')}}" class="btn btn-success">Regresar</a>
	          </div>
	        </div>
        </div>     
    </div>
    <!-- /page content -->
@endsection





