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
          <h3>Nuevo Rol</h3>
        </div>


      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Nuevo Rol de Usuario <i class="fa fa-shield"></i></h2>
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
              <form id="demo-form2" method="POST" action="{{url('roles/'.$role->id.'/edit')}}" data-parsley-validate class="form-horizontal form-label-left">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_name">Nombre de rol <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="role_name" name="role_name" required="required" class="form-control col-md-7 col-xs-12" readonly="true" value="{{$role->name}}">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="permisos">Permisos:</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <p style="padding: 5px;">
                        @foreach($permissions as $permission)
                        @if($role->hasPermissionTo($permission->name))
                          <input type="checkbox" name="permission{{$permission->id}}" checked="true" id="permission{{$permission->id}}" value="{{$permission->name}}" data-parsley-mincheck="2" class="flat" /> {{$permission->name}}
                          <br />
                        @else
                          <input type="checkbox" name="permission{{$permission->id}}" id="permission{{$permission->id}}" value="{{$permission->name}}" data-parsley-mincheck="2" class="flat" /> {{$permission->name}}
                          <br />
                        @endif
                        @endforeach
                      <p>
                  </div>
                </div>
                

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="{{url('/roles')}}" class="btn btn-primary" type="button">Cancelar</a>
                    <button class="btn btn-primary" type="reset">Resetear</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
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