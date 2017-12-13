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


      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Parámetros Generales <i class="fa fa-cog"></i></h2>
              
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
                    <input type="number" id="value" name="value" required="required" class="form-control col-md-7 col-xs-12 mask">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="organization-id" class="control-label col-md-3 col-sm-3 col-xs-12">Parámetro </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select  id="type" name="type" class="form-control">
                        <option value="1" selected="selected">Número de días para que el usuario deba cambiar su constraseña</option>   
                        <option value="2">Cantidad de kilómetros recorridos para dar mantenimiento a Vehículo</option> 
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="organization-id" class="control-label col-md-3 col-sm-3 col-xs-12">Organización</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select  id="org_id" name="org_id" class="form-control">

                      @foreach($organizations as $org)
                        @if($loop->first)
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
                    <a href="{{url('/vehiculos/1/lista')}}" class="btn btn-primary" type="button">Cancelar</a>
                    <button class="btn btn-primary" type="reset">Resetear</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6 col-md-offset-3">
          <div class="x_panel">
            <div class="x_title">
              <h2>Parámetros Generales de las organizaciones <i class="fa fa-cog"></i></h2>
              
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              @foreach($organizations as $org)
              <h2>Vehículo {{$org->name}}</h2>
              <li>Número de días para que el usuario deba cambiar su constraseña: <b>{{$config->getParameterByOrgIdAndType($org->id,1)}} días</b></li>
              <li>Cantidad de kilómetros recorridos para dar mantenimiento a Vehículo: <b>{{$config->getParameterByOrgIdAndType($org->id,2)}} kilómetros</b></li>
              @endforeach
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
        $(".mask").inputmask('Regex', {regex: "^[0-9]{1,6}(\\.\\d{1,2})?$"});
      });

      $(document).ready(function() {
        $("#type").on('change', function() {
            if ($(this).val() == 1){
                $("#value").attr('type','number');
            } else {
                $("#value").attr('type','text');
                
            }
            $(".mask").inputmask('Regex', {regex: "^[0-9]{1,6}(\\.\\d{1,2})?$"});
        });

      });
    </script>
<!-- /jquery.inputmask -->
@endpush