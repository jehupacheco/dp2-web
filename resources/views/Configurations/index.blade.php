@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')
  <div class="right_col" role="main">
    <div class="">

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
      <div class=""> 
        @if ($errors->any())
            <ul class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
        @endif
      </div>
      <div class="page-title">
        <div class="title_left">
          <h3>Configurar negocio</h3>
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
              <h2>Parámetros Generales <i class="fa fa-bus"></i></h2>
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
              <form id="demo-form2" method="POST" action="{{url('/configuracion/actualizar')}}" data-parsley-validate class="form-horizontal form-label-left">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="plate">Valor <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="vel_max" name="vel_max" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="organization-id" class="control-label col-md-3 col-sm-3 col-xs-12">Organización</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select  id="org_id" name="org_id" class="form-control">

                      @foreach($all_organizations as $org)
                        @if($org->id == 1)
                        <option value="{{$org->id}}" selected="selected">{{$org->name}}</option>
                        @else
                        <option value="{{$org->id}}">{{$org->name}}</option>   
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="{{url('/vehiculos/1/lista')}}" class="btn btn-primary" type="button">Cancel</a>
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
@push('scripts')
<!-- jquery.inputmask -->
    <script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>
<!-- /jquery.inputmask -->
@endpush