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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Placa Auto<span class="required">*</span>
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="text" id="first-name" required="required" class="form-control col-md-3 col-xs-12">
                      </div>
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo Auto</label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input id="middle-name" class="form-control col-md-3 col-xs-12" type="text" name="middle-name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Costo Por Hora mayor a<span class="required">*</span>
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="text" id="first-name" required="required" class="form-control col-md-3 col-xs-12">
                      </div>
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Costo por hora menor a</label>
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

                    <p>Seleccionar un auto de la siguiente lista por favor</p>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                            </th>
                            <th class="column-title" style="display: table-cell;">Placa </th>
                            <th class="column-title" style="display: table-cell;">Tipo de Auto </th>
                            <th class="column-title" style="display: table-cell;">Nivel Bateria Maximo</th>
                            <th class="column-title" style="display: table-cell;">Disponible</th>
                            <th class="column-title" style="display: table-cell;">Estado  </th>
                            <th class="column-title" style="display: table-cell;">Costo Hora </th>
                            
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
                            <td class=" ">121000040</td>
                            <td class=" ">Cardiopatía</td>
                            <td class=" ">1250 Watts<i class="success fa fa-long-arrow-up"></i></td>
                            <td class=" ">No</td>
                            <td class=" ">En reparacion</td>
                            <td class="a-right a-right ">S/. 30</td>
                            </td>
                          </tr>

                          <tr class="even pointer">
                            <td class="a-center ">
                              <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                            </td>
                            <td class=" ">121000041</td>
                            <td class=" ">Jardineria</td>
                            <td class=" ">1250 Watts<i class="success fa fa-long-arrow-up"></i></td>
                            <td class=" ">No</td>
                            <td class=" ">Malogrado</td>
                            <td class="a-right a-right ">S/. 30</td>
                            </td>
                          </tr>

                          <tr class="even pointer">
                            <td class="a-center ">
                              <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                            </td>
                            <td class=" ">121000042</td>
                            <td class=" ">Cardiopatía</td>
                            <td class=" ">1250 Watts<i class="success fa fa-long-arrow-up"></i></td>
                            <td class=" ">Si</td>
                            <td class=" ">Listo</td>
                            <td class="a-right a-right ">S/. 30</td>
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





