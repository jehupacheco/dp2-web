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
          <h3>Actualizar datos de Vehículo</h3>
        </div>

      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Editar Vehículo <i class="fa fa-bus"></i></h2>
              
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form id="demo-form2" method="POST" action="{{url('/vehiculos/'.$vehicle->id.'/edit')}}" data-parsley-validate class="form-horizontal form-label-left">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="plate">Identificador <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="plate" name="plate" required="required" class="form-control col-md-7 col-xs-12" value="{{$vehicle->plate}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Descripción <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea required="required" class="form-control col-md-7 col-xs-12" rows="3" name="description" id="description" >{{$vehicle->description}}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Precio x Hora (S/.) <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" step="0.1" id="price" name="price" required="required" class="form-control col-md-7 col-xs-12" value="{{$vehicle->price}}">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mac"> Mac Address <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="mac" name="mac" required="required" value="{{$vehicle->mac}}" class="form-control col-md-7 col-xs-12" data-inputmask="'mask' : '**:**:**:**:**:**'" >
                  </div>

                </div>
                
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="max_weight">Peso Máximo(Kg.) <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" step="0.01" min="1" max="999999.99" id="max_weight" name="max_weight" required="required" class="form-control col-md-7 col-xs-12" value="{{$vehicle->max_weight}}">
                  </div>
                </div>


                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="{{url('/vehiculos/'.$tipo_id.'/lista')}}" class="btn btn-primary" type="button">Cancelar</a>
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