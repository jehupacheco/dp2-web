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
                <h3>Sensores</h3>
              </div>
              <div class="clearfix"></div>
    		  <div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
			              <div class="x_panel">
			                <div class="x_title">
			                  <h2>Información de sensores <small>Vehículo</small></h2>
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
			                <div class="text-center">
			                	<br>
			                	<i class="fa fa-truck"></i> 250 gramos de 500 permitidos
			                	<br><br>
			                	<i class="fa fa-heart"></i> Frecuencia cardiaca
			                	<br><br>
			                	<i class="fa fa-road"></i> Cercanía
			                	<br><br>
			                	<i class="fa fa-cloud"></i> 25°C de temperatura
			                	<br><br>
			                	<i class="fa fa-car"></i> Velocidad de 35 kmh
			                	<br><br>
			                	<i class="fa fa-flash"></i> 30% de batería
			                	<br><br>
			                	<i class="fa fa-cloud"></i> Humedad de 84%
			                	<br><br>
			                	<i class="fa fa-road"></i> Ubicación: -12,0689 Latitud y -77,0802 longitud
			                </div>
			              </div>
			    </div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
              </div>
					</div>
				</div>
			  </div>
			</div>
	    </div>
	</div>
    <!-- /page content -->
@endsection