@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
		<div>
			<div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Seleccionar auto <small>Filtrado de autos</small></h2>
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
                  <br />
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Usuario <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">DNI <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Placa de auto</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de auto</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control">
                          <option>Elija una opción</option>
                          <option>Mercedes</option>
                          <option>Murciélago aventador</option>
                          <option>Toyota NX-5000</option>
                          <option>Nissa 578-A</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de uso</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control">
                          <option>Elija una opción</option>
                          <option>Jardinería</option>
                          <option>Uso diario - jovenes</option>
                          <option>Uso diario - adultos</option>
                          <option>Ventas</option>
                          <option>Paramédico</option>
                        </select>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                        <!-- <button type="submit" class="btn btn-success">Buscar</button> -->
                        <a href="{{url('/ubicaciones/buscar/usuarios')}}" class="btn btn-success">Buscar</a>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
	                <div class="x_panel">
	                  <div class="x_title">
	                    <h2>Usuarios de autos<small>resultado de busqueda 4 registros</small></h2>
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
	                      Se muestra una lista de usuarios que utilizan los autos eléctricos autónomos para poder visualizar su ubicación y recorrido.
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
	             
	                      </tbody>
	                    </table>
						
						
	                  </div>
	                </div>
	              </div>
	              <div class="ln_solid"></div>
			            <div class="form-group">
			              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
			                <!-- <button type="submit" class="btn btn-success">Buscar</button> -->
			                <a href="{{url('/ubicaciones/buscar_usuario')}}" class="btn btn-success">Regresar</a>
			              </div>
			            </div>
						</div>
						
				</div>
			</div>
			
		</div>
    </div>
    <!-- /page content -->
@endsection