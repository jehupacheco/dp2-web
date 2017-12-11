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
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form id="myform" method="POST" action="{{url('roles/'.$role->id.'/edit')}}" data-parsley-validate class="form-horizontal form-label-left">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_name">Nombre de rol <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="role_name" name="role_name" required="required" class="form-control col-md-7 col-xs-12" value="{{$role->name}}">
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
    <script>
      $(document).ready(function(){
        if($('#permission5').attr('checked')){
          $('#permission4').iCheck('check');
          $('#permission4').iCheck('disable');
          $('#permission6').iCheck('check');
          $('#permission6').iCheck('disable');
          $('#permission7').iCheck('check');
          $('#permission7').iCheck('disable');
          $('#permission8').iCheck('check');
          $('#permission8').iCheck('disable');
          $('#permission9').iCheck('check');
          $('#permission9').iCheck('disable');
          $('#permission10').iCheck('check');
          $('#permission10').iCheck('disable');
          $('#permission11').iCheck('check');
          $('#permission11').iCheck('disable');
        }
      });

      $(document).ready(function(){
        $('#permission5').on('ifChecked', function(event){
          $('#permission4').iCheck('check');
          $('#permission4').iCheck('disable');
          $('#permission6').iCheck('check');
          $('#permission6').iCheck('disable');
          $('#permission7').iCheck('check');
          $('#permission7').iCheck('disable');
          $('#permission8').iCheck('check');
          $('#permission8').iCheck('disable');
          $('#permission9').iCheck('check');
          $('#permission9').iCheck('disable');
          $('#permission10').iCheck('check');
          $('#permission10').iCheck('disable');
          $('#permission11').iCheck('check');
          $('#permission11').iCheck('disable');
         });

        $('#permission5').on('ifUnchecked', function(event){
          $('#permission4').iCheck('enable');
          $('#permission4').iCheck('uncheck');
          $('#permission6').iCheck('enable');
          $('#permission6').iCheck('uncheck');
          $('#permission7').iCheck('enable');
          $('#permission7').iCheck('uncheck');
          $('#permission8').iCheck('enable');
          $('#permission8').iCheck('uncheck');
          $('#permission9').iCheck('enable');
          $('#permission9').iCheck('uncheck');
          $('#permission10').iCheck('enable');
          $('#permission10').iCheck('uncheck');
          $('#permission11').iCheck('enable');
          $('#permission11').iCheck('uncheck');
        });
      });

      $('#myform').submit(function() {
          $("input:checkbox").prop('disabled', false);
          return true; // return false to cancel form action
      });
    </script>
@endpush