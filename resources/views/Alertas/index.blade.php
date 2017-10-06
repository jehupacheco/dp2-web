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
                <h3>Alertas</h3>
              </div>
              <div class="clearfix"></div>
    		  <div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12">
			              <div class="x_panel">
			                <div class="x_title">
			                  <h2>Recientes Alertas <small>Autos</small></h2>
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
			                            <p class="excerpt">El auto tuvo un choque frontal con algún objeto y debe ser llevado a revisión por precausión...<a>Leer&nbsp;Más</a>
			                            </p>
			                          </div>
			                        </div>
			                      </li>
			                      <li>
			                        <div class="block">
			                          <div class="block_content">
			                            <h2 class="title">
			                                              <a>¡Precausión! Peso excedido de la maletera del auto</a>
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
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Usuarios de autos<small>detalle</small></h2>
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
                    <p class="text-muted font-13 m-b-30">
                      Se muestra una lista de usuarios que utilizan los autos eléctricos autónomos para poder visualizar las alertas de dichos autos.
                    </p>
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Edad</th>
                          <th>Perfil</th>
                          <th>Placa de auto</th>
                          <th>Fecha de inicio</th>
                          <th>N° de Alertas</th>
                          <th>Teléfono Celular</th>
                          <th>E-mail</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Tiger</td>
                          <td>Nixon</td>
                          <td>22</td>
                          <td>Edinburgh</td>
                          <td>61</td>
                          <td>2011/04/25</td>
                          <td>4</td>
                          <td>5421</td>
                          <td>t.nixon@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Garrett</td>
                          <td>Winters</td>
                          <td>24</td>
                          <td>Tokyo</td>
                          <td>63</td>
                          <td>2011/07/25</td>
                          <td>3</td>
                          <td>8422</td>
                          <td>g.winters@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Ashton</td>
                          <td>Cox</td>
                          <td>31</td>
                          <td>San Francisco</td>
                          <td>66</td>
                          <td>2009/01/12</td>
                          <td>3</td>
                          <td>1562</td>
                          <td>a.cox@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Cedric</td>
                          <td>Kelly</td>
                          <td>22</td>
                          <td>Edinburgh</td>
                          <td>22</td>
                          <td>2012/03/29</td>
                          <td>2</td>
                          <td>6224</td>
                          <td>c.kelly@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Airi</td>
                          <td>Satou</td>
                          <td>30</td>
                          <td>Tokyo</td>
                          <td>33</td>
                          <td>2008/11/28</td>
                          <td>1</td>
                          <td>5407</td>
                          <td>a.satou@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Brielle</td>
                          <td>Williamson</td>
                          <td>31</td>
                          <td>New York</td>
                          <td>61</td>
                          <td>2012/12/02</td>
                          <td>2</td>
                          <td>4804</td>
                          <td>b.williamson@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Herrod</td>
                          <td>Chandler</td>
                          <td>40</td>
                          <td>San Francisco</td>
                          <td>59</td>
                          <td>2012/08/06</td>
                          <td>3</td>
                          <td>9608</td>
                          <td>h.chandler@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Rhona</td>
                          <td>Davidson</td>
                          <td>29</td>
                          <td>Tokyo</td>
                          <td>55</td>
                          <td>2010/10/14</td>
                          <td>5</td>
                          <td>6200</td>
                          <td>r.davidson@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Colleen</td>
                          <td>Hurst</td>
                          <td>30</td>
                          <td>San Francisco</td>
                          <td>39</td>
                          <td>2009/09/15</td>
                          <td>9</td>
                          <td>2360</td>
                          <td>c.hurst@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Sonya</td>
                          <td>Frost</td>
                          <td>28</td>
                          <td>Edinburgh</td>
                          <td>23</td>
                          <td>2008/12/13</td>
                          <td>11</td>
                          <td>1667</td>
                          <td>s.frost@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Jena</td>
                          <td>Gaines</td>
                          <td>23</td>
                          <td>London</td>
                          <td>30</td>
                          <td>2008/12/19</td>
                          <td>6</td>
                          <td>3814</td>
                          <td>j.gaines@datatables.net</td>
                        </tr>
             
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
					</div>
				</div>
			  </div>
			</div>
	    </div>
	</div>
    <!-- /page content -->
@endsection