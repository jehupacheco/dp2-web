@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Asignar Vehiculo a Cliente</h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Asignar horario de Alquiler </h2>
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
                  <label for="organization-id" class="control-label col-md-3 col-sm-3 col-xs-12">Cliente<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select  id="org_id" name="org_id" class="form-control">
                      <option>Elige un cliente</option>
                      <option>Cliente1</option>
                      <option>Cliente2</option>
                      <option>Cliente3</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label for="date" class="control-label col-md-3 col-sm-3 col-xs-12" >Fecha<span class="required">*</span></label>
                      <fieldset>
                        <div class="control-group col-md-8 col-sm-12 col-xs-12">
                          <div class="controls">
                            <div class="input-prepend input-group">
                              <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                              <input type="text" name="reservation-time" id="reservation-time" class="form-control" value="01/01/2016 - 01/25/2016" />
                            </div>
                          </div>
                        </div>
                      </fieldset>
                  </div>
                <div class="form-group">
                  <label for="horas" class="control-label col-md-3 col-sm-3 col-xs-12" >Horas<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="horas" name="horas" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label for="costo" class="control-label col-md-3 col-sm-3 col-xs-12" >Costo</label>
                  <div class="col-md-6 col-sm-6 col-xs-12" disabled>
                    <input type="number" id="costo" name="costo" required="required" class="form-control col-md-7 col-xs-12" placeholder="345.50" disabled=""></input>
                  </div>
                </div>
                 
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="button">Cancel</button>
        <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->

    
@endsection
