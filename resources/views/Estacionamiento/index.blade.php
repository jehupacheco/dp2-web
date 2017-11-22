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
                <h3>Estacionamiento</h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Buscar</button>
                          </span>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
              <div class="x_panel">
                  <div class="x_title">
                    <h2>Modo</h2>
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
                    
                    <p class="text-muted">Modo de Funcionamiento de las persianas</p>
                    <div class="row">
                      <div class="btn-group">
                        <button class="btn btn-default" type="button">Manual</button>
                        <button class="btn btn-danger" type="button">Automático</button>
                      </div>
                    </div>

					<div class="sidebar-widget">
                        <h4>Ángulo de Depresión</h4>
                        <canvas id="chart_gauge_01" class="" style="width: 300px; height: 150px;"></canvas>
                        <div class="goal-wrapper">
                          <span id="gauge-text" class="gauge-value gauge-chart pull-left">0</span>
                          <span class="gauge-value pull-left">°</span>
                          <span id="goal-text" class="goal-value pull-right">90°</span>
                        </div>
                      </div>
                      <div class="col-md-12 text-center">
                      	<div class="btn-group">
                        	<button class="btn btn-default" type="button">-</button>
                        	<button class="btn btn-default" type="button">+</button>
                      	</div>
                  	  </div>

                  </div>
                </div>
            </div>

              	<!-- start of weather widget -->
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>El Clima Hoy </h2>
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
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="temperature"><b>{{$today}}</b>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="weather-icon">
                          <span>
                                              <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                                          </span>

                        </div>
                      </div>
                      <div class="col-sm-8">
                        <div class="weather-text">
                          <h2>{{$clima_de_hoy->name}}, Perú
                          </h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="weather-text pull-right">
                        <h3 class="degrees">{{$clima_de_hoy->main->temp}}<b>C°</b></h3>
                      </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="row weather-days">
                      <div class="col-sm-2">
                        <div class="daily-weather">
                          <h2 class="day">Lun</h2>
                          <h3 class="degrees">16</h3>
                          <span>
                                                  <canvas id="clear-day" width="32" height="32">
                                                  </canvas>

                                          </span>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="daily-weather">
                          <h2 class="day">Mar</h2>
                          <h3 class="degrees">18</h3>
                          <canvas height="32" width="32" id="rain"></canvas>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="daily-weather">
                          <h2 class="day">Mie</h2>
                          <h3 class="degrees">17</h3>
                          <canvas height="32" width="32" id="snow"></canvas>
                          </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="daily-weather">
                          <h2 class="day">Jue</h2>
                          <h3 class="degrees">18</h3>
                          <canvas height="32" width="32" id="sleet"></canvas>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="daily-weather">
                          <h2 class="day">Vie</h2>
                          <h3 class="degrees">16</h3>
                          <canvas height="32" width="32" id="wind"></canvas>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="daily-weather">
                          <h2 class="day">Sab</h2>
                          <h3 class="degrees">18</h3>
                          <canvas height="32" width="32" id="cloudy"></canvas>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>

              </div>
              <!-- end of weather widget -->

				<div class="col-md-4 col-sm-6 col-xs-12">
                	<div class="x_panel">
                  		<div class="x_title">
		                    <h2>Luminosidad </h2>
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

		                <div class="col-md-12 text-center">
                      		<h1>660 LUX</h1>
                          <hr>
                          <img src="{{asset('images/luminosidad.png')}}" alt="" class="img-circle img-responsive">
                      </div>
                  	</div>

                </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="x_panel">
                      <div class="x_title">
                        <h2>Radiación UV </h2>
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

                    <div class="col-md-12 text-center">
                          <h1>Índice UV: 5</h1>
                          <hr>
                          <img src="{{asset('images/uv.png')}}" alt="" class="img-responsive">
                      </div>
                    </div>

                </div>
                            

			</div>
	    </div>
	</div>
	<!-- /page content -->
@endsection

@push('scripts')
<!-- gauge.js -->
<script>
  var opts = {
      lines: 12,
      angle: 0,
      lineWidth: 0.4,
      pointer: {
          length: 0.75,
          strokeWidth: 0.042,
          color: '#1D212A'
      },
      limitMax: 'false',
      colorStart: '#1ABC9C',
      colorStop: '#1ABC9C',
      strokeColor: '#F0F3F3',
      generateGradient: true
  };
  var target = document.getElementById('chart_gauge_01'),
      gauge = new Gauge(target).setOptions(opts);

  gauge.maxValue = 90;
  gauge.animationSpeed = 32;
  gauge.set(45);
  gauge.setTextField(document.getElementById("gauge-text"));
</script>
<!-- /gauge.js -->
<!-- Skycons -->
<script>
  var icons = new Skycons({
      "color": "#73879C"
    }),
    list = [
      "clear-day", "clear-night", "partly-cloudy-day",
      "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
      "fog"
    ],
    i;

  for (i = list.length; i--;)
    icons.set(list[i], list[i]);

  icons.play();
</script>
<!-- /Skycons --
@endpush
