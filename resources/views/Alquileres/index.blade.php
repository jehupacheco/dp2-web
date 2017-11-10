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
                    <h3> <small>Alquileres de Vehículos</small></h3>
                  </div>

                  
                </div>

          </div>
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                  <ul class="pagination pagination-split">
                    <!-- <li><a href="#">Todos los Clientes</a></li> -->
                    <li><a href="{{url('/alquileres/nuevo')}}">Nuevo Alquiler <i class="fa fa-plus" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
            </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Alquileres <small>Filtrado de alquileres</small></h2>
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" readonly="true">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <!-- <button type="submit" class="btn btn-success">Buscar</button> -->
                        <a href="#" class="btn btn-success"><i class="fa fa-search"></i></a>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Placa de auto</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" readonly="true">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <!-- <button type="submit" class="btn btn-success">Buscar</button> -->
                        <a href="#" class="btn btn-success"><i class="fa fa-search"></i></a>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de vehículo</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control">
                          <option>Elija una opción</option>
                          <option>Jardinería</option>
                          <option>Uso diario</option>
                          <option>Cardiopatía</option>
                          <option>Ventas</option>
                          <option>Paramédico</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Alquiler</label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                      </div>
                      
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                        <!-- <button type="submit" class="btn btn-success">Buscar</button> -->
                        <a href="{{url('/ubicaciones/buscar/usuarios')}}" class="btn btn-success">Buscar</a>
                        <a href="{{url('/')}}" class="btn btn-success">Regresar</a>
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





