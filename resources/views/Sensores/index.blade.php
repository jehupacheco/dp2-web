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
				<div class="col-md-4 col-sm-4 col-xs-12">
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
			                <div class="x_content">
			                  <div class="dashboard-widget-content">

			                    <ul class="list-unstyled timeline widget">
			                      <li>
			                        <div class="block">
			                          <div class="block_content">
			                            <h2 class="title">
			                                              <a>¡Advertencia! El Auto se quedó sin batería</a>
			                                          </h2>
			                            <div class="byline">
			                              <span>hace 13 horas</span> por <a>Cesar Aguilera</a>
			                            </div>
			                            <p class="excerpt">El auto se quedó sin batería y debe ser cargado durante 6 horas continuas sin interrupciones... <a>Leer&nbsp;Más</a>
			                            </p>
			                          </div>
			                        </div>
			                      </li>
			                      <li>
			                        <div class="block">
			                          <div class="block_content">
			                            <h2 class="title">
			                                              <a>¡Cuidado! El auto tuvo un choque frontal</a>
			                                          </h2>
			                            <div class="byline">
			                              <span>Hace 1 día</span> por <a>Juan Perez</a>
			                            </div>
			                            <p class="excerpt">El auto tuvo un choque frontal con algún objeto y debe ser llevado a revisión por precaución...<a>Leer&nbsp;Más</a>
			                            </p>
			                          </div>
			                        </div>
			                      </li>
			                      <li>
			                        <div class="block">
			                          <div class="block_content">
			                            <h2 class="title">
			                                              <a>¡Precaución! Peso excedido de la maletera del auto</a>
			                                          </h2>
			                            <div class="byline">
			                              <span>Hace 2 días</span> por <a>Jardinero Felíz</a>
			                            </div>
			                            <p class="excerpt">El auto lleva un peso que excedió los límites que puede cargar la maletera. El auto podría tener complicaciones futuras con su funcionamiento por este motivo… <a>Leer&nbsp;Más</a>
			                            </p>
			                          </div>
			                        </div>
			                      </li>
			                      <li>
			                        <div class="block">
			                          <div class="block_content">
			                            <h2 class="title">
			                                              <a>¡Urgente! El auto fue reportado como robado</a>
			                                          </h2>
			                            <div class="byline">
			                              <span>Hace 1 semana</span> por <a>Roberto Hurtado</a>
			                            </div>
			                            <p class="excerpt">El auto fue reportado como robado en la dirección Av. Universitaria 1802 San Miguel. Rastrear la ubicación y dar aviso a las autoridades. El auto dejará de funcionar automáticamente… <a>Leer&nbsp;Más</a>
			                            </p>
			                          </div>
			                        </div>
			                      </li>
			                    </ul>
			                  </div>
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