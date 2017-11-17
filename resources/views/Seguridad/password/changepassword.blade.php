@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')
  <div class="right_col" role="main">
      <div class="row">
            @if(Session::has('message-error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {{Session::get('message-error')}}
            </div>
            @endif
            @if (session('stored'))
                <script>$("#modalSuccess").modal("show");</script>
                
                <div class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>¡Éxito!</strong> {{session('stored')}}
                </div>
            @endif

            @if (session('delete'))
                <script>$("#modalError").modal("show");</script>         
                <div class="alert alert-danger fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{session('delete')}}
                </div>                        
            @endif
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
          </div>
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Cambiar Contraseña</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Cambio de contraseña de usuario </h2>
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
              <form id="demo-form2" method="POST" action="{{url('/cambiar/password/save')}}" data-parsley-validate class="form-horizontal form-label-left">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <label for="password_current" class="control-label col-md-3 col-sm-3 col-xs-12" >Contraseña Antigua<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="password" id="password_current" class="form-control col-md-7 col-xs-12" type="text" name="password_current" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12" >Contraseña Nueva<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="password" id="password" class="form-control col-md-7 col-xs-12" type="text" name="password" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="password_confirmation" class="control-label col-md-3 col-sm-3 col-xs-12">Repetir contraseña<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="password" id="password_confirmation" class="form-control col-md-7 col-xs-12" type="text" name="password_confirmation" >
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="{{url('/')}}" class="btn btn-primary" type="button">Cancel</a>
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
