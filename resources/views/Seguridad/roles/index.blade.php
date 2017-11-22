@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

    <!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
              <div class="x_title">
                <h2>Roles <small>Lista de Roles de Usuarios</small></h2>
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

                <p>Seleccionar una fila para ver su detalle</p>

                <div class="table-responsive">
                  <table id="dtTableRenting" class="table table-striped jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                        <th>
                          <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                        </th>
                        <th class="column-title" style="display: table-cell;">Nombre </th>
                        <th class="column-title" style="display: table-cell;">Cantidad de Permisos </th>
                        <th class="column-title" style="display: table-cell;">Acciones </th>
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
                        <td class=" ">sss</td>
                        <td class=" ">sss</td>
                        <td><a href="#" class="btn btn-info btn-xs fa fa-pencil"></a><a href="{{url('/')}}" class="btn btn-danger btn-xs fa fa-trash"></a></td>
                      </tr>

                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection




@push('scripts')

@endpush
