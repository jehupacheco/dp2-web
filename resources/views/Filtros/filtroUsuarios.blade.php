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
                    <h3> <small>Alquiler de Vehículos</small></h3>
                  </div>

                  
                </div>

          </div>

          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Seleccionar cliente <small>Filtrado de clientes</small></h2>
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre cliente
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="text" id="first-name" required="required" class="form-control col-md-3 col-xs-12">
                      </div>
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido cliente</label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input id="middle-name" class="form-control col-md-3 col-xs-12" type="text" name="middle-name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">dni
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="text" id="first-name" required="required" class="form-control col-md-3 col-xs-12">
                      </div>
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">correo</label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input id="middle-name" class="form-control col-md-3 col-xs-12" type="text" name="middle-name">
                      </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                        <!-- <button type="submit" class="btn btn-success">Buscar</button> -->
                        <a href="{{url('/ubicaciones/buscar/usuarios')}}" class="btn btn-success">Buscar</a>
                        <a href="{{url('/alquileres/index')}}" class="btn btn-success">Regresar</a>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    

                    <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Autos <small></small></h2>
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

                    <p>Seleccionar un usuario de la siguiente lista por favor</p>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                            </th>
                            <th class="column-title" style="display: table-cell;">Nombre </th>
                            <th class="column-title" style="display: table-cell;">Apellido</th>
                            <th class="column-title" style="display: table-cell;">correo</th>
                            <th class="column-title" style="display: table-cell;">dni</th>
                            <th class="column-title" style="display: table-cell;">Estado</th>
                            <th class="column-title" style="display: table-cell;">Edad</th>
                            <th class="column-title no-link last" style="display: table-cell;"><span class="nobr">Detalle</span>
                            </th>
                            <th class="bulk-actions" colspan="7" style="display: none;">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt">1 Records Selected</span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                            </td>
                            <td class=" ">Mario</td>
                            <td class=" ">Padilla</td>
                            <td class=" ">mPadilla@google.com<i class="success fa fa-long-arrow-up"></i></td>
                            <td class=" ">74125842</td>
                            <td class=" ">Deshabilitado</td>
                            <td class="a-right a-right ">30</td>
                            <td class=" last"><a href="/usuarios/1/perfil">View</a>
                            </td>
                            </td>
                          </tr>

                          <tr class="even pointer">
                            <td class="a-center ">
                              <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                            </td>
                            <td class=" ">Anacleto</td>
                            <td class=" ">Apolinado</td>
                            <td class=" ">aApolinado@google.com<i class="success fa fa-long-arrow-up"></i></td>
                            <td class=" ">12127442</td>
                            <td class=" ">Activo</td>
                            <td class="a-right a-right ">35</td>
                            <td class=" last"><a href="/usuarios/1/perfil">View</a>
                            </td>
                            </td>
                          </tr>

                          <tr class="even pointer">
                            <td class="a-center ">
                              <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                            </td>
                            <td class=" ">Cris</td>
                            <td class=" ">Solange</td>
                            <td class=" ">cSolange@google.com<i class="success fa fa-long-arrow-up"></i></td>
                            <td class=" ">74898789</td>
                            <td class=" ">Activo</td>
                            <td class="a-right a-right ">40</td>
                            <td class=" last"><a href="/usuarios/1/perfil">View</a>
                            </td>
                            </td>
                          </tr>
                          
                        </tbody>
                      </table>
                    </div>

                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                        <!-- <button type="submit" class="btn btn-success">Buscar</button> -->
                        <a href="{{url('/alquileres/index')}}" class="btn btn-success">Aceptar</a>
                        <a href="{{url('/alquileres/index')}}" class="btn btn-success">Cancelar</a>
                      </div>
                    </div>
              
            
                  </div>
                </div>
              </div>


                    
                  </form>
                </div>
              </div>
            </div>
          </div>

        
    </div>
    <!-- /page content -->
@endsection





