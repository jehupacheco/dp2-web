@extends('layouts.blank')

<!-- Bootstrap -->
    <script async="" data-rocketsrc="https://www.google-analytics.com/analytics.js" data-rocketoptimized="true"></script><script type="text/javascript">
//<![CDATA[
window.__cfRocketOptions = {byc:0,p:1508690442,petok:"42319e3ea318aad72b4aa824463dfc51ccb9d961-1509668416-1800"};
//]]>
</script>
<script type="text/javascript" src="https://ajax.cloudflare.com/cdn-cgi/scripts/78d64697/cloudflare-static/rocket.min.js"></script>

@push('stylesheets')
    <link href=" <link href="{{ asset("vendors/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("vendors/nprogress/nprogress.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("vendors/iCheck/skins/flat/green.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/google-code-prettify/bin/prettify.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/select2/dist/css/select2.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/switchery/dist/switchery.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/starrr/dist/starrr.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/bootstrap-daterangepicker/daterangepicker.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/build/css/custom.min.css") }}" rel="stylesheet">

    
    <link href=" <link href="{{ asset("/vendors/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/nprogress/nprogress.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/jqvmap/dist/jqvmap.min.css") }}" rel="stylesheet">

    <!--para manejar Tablas-->
    <link href=" <link href="{{ asset("/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css") }}" rel="stylesheet">
    <link href=" <link href="{{ asset("vendors/nprogress/nprogress.css") }}" rel="stylesheet">

    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
      <div>
          <div class="page-title">
              <div class="title_left">
                <h3> <small>Reporte de Usuarios por vehículo</small></h3>
              </div>
          </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_content">
              <div class="row">
                

                <!-- Descripción del viaje -->
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Filtros de reporte <!--small>different form elements</small--></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <!--ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul-->
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left input_mask">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nombre">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess3" placeholder="Apellido">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Correo">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess5" placeholder="Telefono">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Placa del vehiculo</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Placa">
                        </div>
                      </div>
                      <!--div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Disabled Input </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" disabled="disabled" placeholder="Disabled Input">
                        </div>
                      </div-->
                      <!--div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Read-Only Input</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" readonly="readonly" placeholder="Read-Only Input">
                        </div>
                      </div-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Inicio <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Hora de Inicio <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Hora Fin <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Fin <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>
                      <!--RESULTADOS DE LA BÚSQUEDA-->
                      <div class="col-md-12 col-sm-12 col-xs-12">
                
                  <div class="x_title">
                    <p>.</p>
                    <h2>Resultado de búsqueda</h2>
                    <!--ul class="nav navbar-right panel_toolbox">
                      <!--li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li-->
                      <!--li class="dropdown">
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
                    </ul-->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!--p class="text-muted font-13 m-b-30">
                      DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                    </p-->
                    <div id="datatable-checkbox_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable-checkbox_length"><label>Show <select name="datatable-checkbox_length" aria-controls="datatable-checkbox" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="datatable-checkbox_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable-checkbox"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="datatable-checkbox" class="table table-striped table-bordered bulk_action dataTable no-footer" role="grid" aria-describedby="datatable-checkbox_info">
                      <thead>
                        <tr role="row"><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="
               " style="width: 4px;">
               </th><th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 36px;"><div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></th><th class="sorting_desc" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 122px;" aria-sort="descending">Nombre Cliente</th><th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 207px;">Apellido Cliente</th><th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 90px;">Placa Vehículo</th><th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 42px;">Fecha Inicio de Viaje</th><th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 87px;">Fecha Fin de Viaje</th><th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 68px;">Costo del viaje</th></tr>
                      </thead>


                      <tbody>
                        
                      <tr role="row" class="odd">
                          <td>
               </td><th class=""><div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></th>
              
                          <td class="sorting_1">Zorita</td>
                          <td>Serrano</td>
                          <td>AC1587-58</td>
                          <td>2012/06/01 05:00 pm</td>
                          <td>2012/06/01 07:00 pm</td>
                          <td>$115,000</td>
                        </tr><tr role="row" class="even">
                          <td>
               </td><th class=""><div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></th>
              
                          <td class="sorting_1">Zorita</td>
                          <td>Serrano</td>
                          <td>AC1587-58</td>
                          <td>2012/06/01 05:00 pm</td>
                          <td>2012/06/01 07:00 pm</td>
                          <td>$115,000</td>
                        </tr><tr role="row" class="odd">
                          <td>
               </td><th class=""><div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></th>
              
                          <td class="sorting_1">Zorita</td>
                          <td>Serrano</td>
                          <td>AC1587-58</td>
                          <td>2012/06/01 05:00 pm</td>
                          <td>2012/06/01 07:00 pm</td>
                          <td>$115,000</td>
                        </tr><tr role="row" class="even">
                          <td>
               </td><th class=""><div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></th>
              
                          <td class="sorting_1">Zorita</td>
                          <td>Serrano</td>
                          <td>AC1587-58</td>
                          <td>2012/06/01 05:00 pm</td>
                          <td>2012/06/01 07:00 pm</td>
                          <td>$115,000</td>
                        </tr><tr role="row" class="odd">
                          <td>
               </td><th class=""><div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></th>
              
                          <td class="sorting_1">Zorita</td>
                          <td>Serrano</td>
                          <td>AC1587-58</td>
                          <td>2012/06/01 05:00 pm</td>
                          <td>2012/06/01 07:00 pm</td>
                          <td>$115,000</td>
                        </tr><tr role="row" class="even">
                          <td>
               </td><th class=""><div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></th>
              
                          <td class="sorting_1">Zorita</td>
                          <td>Serrano</td>
                          <td>AC1587-58</td>
                          <td>2012/06/01 05:00 pm</td>
                          <td>2012/06/01 07:00 pm</td>
                          <td>$115,000</td>
                        </tr><tr role="row" class="odd">
                          <td>
               </td><th class=""><div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></th>
              
                          <td class="sorting_1">Zorita</td>
                          <td>Serrano</td>
                          <td>AC1587-58</td>
                          <td>2012/06/01 05:00 pm</td>
                          <td>2012/06/01 07:00 pm</td>
                          <td>$115,000</td>
                        </tr><tr role="row" class="even">
                          <td>
               </td><th class=""><div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></th>
              
                          <td class="sorting_1">Zorita</td>
                          <td>Serrano</td>
                          <td>AC1587-58</td>
                          <td>2012/06/01 05:00 pm</td>
                          <td>2012/06/01 07:00 pm</td>
                          <td>$115,000</td>
                        </tr><tr role="row" class="odd">
                          <td>
               </td><th class=""><div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></th>
              
                          <td class="sorting_1">Zorita</td>
                          <td>Serrano</td>
                          <td>AC1587-58</td>
                          <td>2012/06/01 05:00 pm</td>
                          <td>2012/06/01 07:00 pm</td>
                          <td>$115,000</td>
                        </tr><tr role="row" class="even">
                          <td>
               </td><th class=""><div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></th>
              
                          <td class="sorting_1">Zorita</td>
                          <td>Serrano</td>
                          <td>AC1587-58</td>
                          <td>2012/06/01 05:00 pm</td>
                          <td>2012/06/01 07:00 pm</td>
                          <td>$115,000</td>
                        </tr></tbody>
                    </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable-checkbox_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable-checkbox_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable-checkbox_previous"><a href="#" aria-controls="datatable-checkbox" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable-checkbox" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-checkbox" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-checkbox" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-checkbox" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-checkbox" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-checkbox" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable-checkbox_next"><a href="#" aria-controls="datatable-checkbox" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
                  </div>
                
              </div>
              <!--FIN DE RESULTADOS DE LA BÚSQUEDA-->
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="button" class="btn btn-primary" href="{{url('/reportes/clienteXvehiculo')}}">Aceptar</button>
                          <!--<button type="submit" class="btn btn-success">Submit</button>-->
                        </div>
                      </div>

                    </form>
                  </div>
                </div>



                <div class="clearfix"></div>



              
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
  </div>
    <!-- /page content -->
@endsection

<!-- jQuery -->
    <script data-rocketsrc="../vendors/jquery/dist/jquery.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Bootstrap -->
    <script data-rocketsrc="../vendors/bootstrap/dist/js/bootstrap.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- FastClick -->
    <script data-rocketsrc="../vendors/fastclick/lib/fastclick.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- NProgress -->
    <script data-rocketsrc="../vendors/nprogress/nprogress.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- bootstrap-progressbar -->
    <script data-rocketsrc="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- iCheck -->
    <script data-rocketsrc="../vendors/iCheck/icheck.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- bootstrap-daterangepicker -->
    <script data-rocketsrc="../vendors/moment/min/moment.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/bootstrap-daterangepicker/daterangepicker.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- bootstrap-wysiwyg -->
    <script data-rocketsrc="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/jquery.hotkeys/jquery.hotkeys.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/google-code-prettify/src/prettify.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- jQuery Tags Input -->
    <script data-rocketsrc="../vendors/jquery.tagsinput/src/jquery.tagsinput.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Switchery -->
    <script data-rocketsrc="../vendors/switchery/dist/switchery.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Select2 -->
    <script data-rocketsrc="../vendors/select2/dist/js/select2.full.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Parsley -->
    <script data-rocketsrc="../vendors/parsleyjs/dist/parsley.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Autosize -->
    <script data-rocketsrc="../vendors/autosize/dist/autosize.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- jQuery autocomplete -->
    <script data-rocketsrc="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- starrr -->
    <script data-rocketsrc="../vendors/starrr/dist/starrr.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Custom Theme Scripts -->
    <script data-rocketsrc="../build/js/custom.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>

<!-- jQuery -->
    <script data-rocketsrc="../vendors/jquery/dist/jquery.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Bootstrap -->
    <script data-rocketsrc="../vendors/bootstrap/dist/js/bootstrap.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- FastClick -->
    <script data-rocketsrc="../vendors/fastclick/lib/fastclick.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- NProgress -->
    <script data-rocketsrc="../vendors/nprogress/nprogress.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Chart.js -->
    <script data-rocketsrc="../vendors/Chart.js/dist/Chart.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- gauge.js -->
    <script data-rocketsrc="../vendors/gauge.js/dist/gauge.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- bootstrap-progressbar -->
    <script data-rocketsrc="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- iCheck -->
    <script data-rocketsrc="../vendors/iCheck/icheck.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Skycons -->
    <script data-rocketsrc="../vendors/skycons/skycons.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Flot -->
    <script data-rocketsrc="../vendors/Flot/jquery.flot.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/Flot/jquery.flot.pie.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/Flot/jquery.flot.time.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/Flot/jquery.flot.stack.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/Flot/jquery.flot.resize.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Flot plugins -->
    <script data-rocketsrc="../vendors/flot.orderbars/js/jquery.flot.orderBars.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/flot-spline/js/jquery.flot.spline.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/flot.curvedlines/curvedLines.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- DateJS -->
    <script data-rocketsrc="../vendors/DateJS/build/date.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- JQVMap -->
    <script data-rocketsrc="../vendors/jqvmap/dist/jquery.vmap.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/jqvmap/dist/maps/jquery.vmap.world.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- bootstrap-daterangepicker -->
    <script data-rocketsrc="../vendors/moment/min/moment.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/bootstrap-daterangepicker/daterangepicker.js" type="text/rocketscript" data-rocketoptimized="true"></script>

    <!-- Custom Theme Scripts -->
    <script data-rocketsrc="../build/js/custom.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
<!-- Google Analytics -->
<script type="text/rocketscript" data-rocketoptimized="true">
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-23581568-13', 'auto');
ga('send', 'pageview');

</script>

<!-- jQuery -->
    <script src="/cdn-cgi/scripts/78d64697/cloudflare-static/email-decode.min.js"></script><script data-rocketsrc="../vendors/jquery/dist/jquery.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Bootstrap -->
    <script data-rocketsrc="../vendors/bootstrap/dist/js/bootstrap.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- FastClick -->
    <script data-rocketsrc="../vendors/fastclick/lib/fastclick.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- NProgress -->
    <script data-rocketsrc="../vendors/nprogress/nprogress.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- iCheck -->
    <script data-rocketsrc="../vendors/iCheck/icheck.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <!-- Datatables -->
    <script data-rocketsrc="../vendors/datatables.net/js/jquery.dataTables.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-buttons/js/buttons.flash.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-buttons/js/buttons.html5.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-buttons/js/buttons.print.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/jszip/dist/jszip.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/pdfmake/build/pdfmake.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
    <script data-rocketsrc="../vendors/pdfmake/build/vfs_fonts.js" type="text/rocketscript" data-rocketoptimized="true"></script>

    <!-- Custom Theme Scripts -->
    <script data-rocketsrc="../build/js/custom.min.js" type="text/rocketscript" data-rocketoptimized="true"></script>
<!-- Google Analytics -->
<script type="text/rocketscript" data-rocketoptimized="true">
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-23581568-13', 'auto');
ga('send', 'pageview');

</script>