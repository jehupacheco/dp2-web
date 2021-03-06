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
			                  <h2>Información de sensores <small>Vehículo: {{$vehiculo->plate}}</small></h2>
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
			                	@foreach ($sensors as $sensor)
			                	@if($sensor->sensor_id == '1')
			                	@if(!is_null($sensorPeso))
			                	<br>
			                	<img src="{{asset('images/weightsensor.png')}}" alt="" class="" height="25" width="25">     {{$sensorPeso->value}} g
			                	<br><br>
			                	@else
			                	<br>
			                	<img src="{{asset('images/weightsensor.png')}}" alt="" class="" height="25" width="25">     --<small><B><FONT COLOR="red"> (No hay datos)</FONT></small>
			                	<br><br>
			                	@endif
			                	@endif
			                	@endforeach
			                	@foreach ($sensors as $sensor)
			                	@if($sensor->sensor_id == '2')
			                	@if(!is_null($sensoRitmoCardio))
			                	<img src="{{asset('images/corazonsensor.png')}}" alt="" class="" height="25" width="45">    {{$sensoRitmoCardio->value}} lpm 
			                	<br><br>
			                	@else
			                	<img src="{{asset('images/corazonsensor.png')}}" alt="" class="" height="25" width="45">    --<small><B><FONT COLOR="red"> (No hay datos)</FONT></small>
			                	<br><br>
			                	@endif
			                	@endif
			                	@endforeach
			                	@foreach ($sensors as $sensor)
			                	@if($sensor->sensor_id == '3')
			                	@if(!is_null($sensorProximidad))
			                	<img src="{{asset('images/nearnesssensor.png')}}" alt="" class="" height="30" width="45">    {{$sensorProximidad->value}} km  
			                	<br><br>
			                	@else
			                	<img src="{{asset('images/nearnesssensor.png')}}" alt="" class="" height="30" width="45">    --<small><B><FONT COLOR="red"> (No hay datos)</FONT></small>
			                	<br><br>
			                	@endif
			                	@endif
			                	@endforeach
			                	@foreach ($sensors as $sensor)
			                	@if($sensor->sensor_id == '4')
			                	@if(!is_null($sensorTemperatura))
			                	<img src="{{asset('images/temperaturesensor.png')}}" alt="" class="" height="35" width="35">   {{$sensorTemperatura->value}} °C     
			                	<br><br>
			                	@else
			                	<img src="{{asset('images/temperaturesensor.png')}}" alt="" class="" height="35" width="35">  --<small><B><FONT COLOR="red"> (No hay datos)</FONT></small>
			                	<br><br>
			                	@endif
			                	@endif
			                	@endforeach
			                	@foreach ($sensors as $sensor)
			                	@if($sensor->sensor_id == '5')
			                	@if(!is_null($sensorVelocidad))
			                	<img src="{{asset('images/speedsensor.png')}}" alt="" class="" height="30" width="45">   {{$sensorVelocidad->value}} kmh
			                	<br><br>
			                	@else
			                	<img src="{{asset('images/speedsensor.png')}}" alt="" class="" height="30" width="45">   --<small><B><FONT COLOR="red"> (No hay datos)</FONT></small>
			                	<br><br>
			                	@endif
			                	@endif
			                	@endforeach
			                	@foreach ($sensors as $sensor)
			                	@if($sensor->sensor_id == '6')
			                	@if(!is_null($sensorBateria))
			                	<img src="{{asset('images/baterysensor.png')}}" alt="" class="" height="30" width="45">  {{$sensorBateria->value}} %      
			                	<br><br>
			                	@else
			                	<img src="{{asset('images/baterysensor.png')}}" alt="" class="" height="30" width="45">  --<small><B><FONT COLOR="red"> (No hay datos)</FONT></small>
			                	<br><br>
			                	@endif
			                	@endif
			                	@endforeach
			                	@foreach ($sensors as $sensor)
			                	@if($sensor->sensor_id == '7')
			                	@if(!is_null($sensorHumedad))
			                	<img src="{{asset('images/humiditysensor.png')}}" alt="" class="" height="30" width="45">  {{$sensorHumedad->value}} %
			                	<br><br>
			                	@else
			                	<img src="{{asset('images/humiditysensor.png')}}" alt="" class="" height="30" width="45">  --<small><B><FONT COLOR="red"> (No hay datos)</FONT></small>
			                	<br><br>
			                	@endif
			                	@endif
			                	@endforeach
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