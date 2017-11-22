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
                  <div class="alert alert-danger fade in"> {{session('delete')}}  </div>               
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
                <h3>Editar Organización</h3>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Organización {{$organization->name}} </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <form method="POST" action="{{route('organizations.update', $organization->id)}}" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" value="{{$organization->name}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Dirección
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="address" name="address" class="form-control col-md-7 col-xs-12" value="{{$organization->address}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Telefono
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="phone" name="phone" class="form-control col-md-7 col-xs-12" value="{{$organization->phone}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="is_parking">
                        Tipo
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="is_parking" name="is_parking" class="form-control col-md-7 col-xs-12">
                          <option {{!$organization['is_parking'] ? 'selected': ''}} value="false">Auto</option>
                          <option {{$organization['is_parking'] ? 'selected': ''}} value="true">Estacionamiento</option>
                        </select> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sensors[]">
                        Sensores
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="sensors" name="sensors[]" class="form-control col-md-7 col-xs-12" multiple="multiple">
                          @foreach($sensors as $sensor)
                            <option value="{{$sensor->id}}" {{$orgSensors->contains($sensor->id) ? 'selected' : ''}}>
                              {{$sensor->description}}
                            </option>
                          @endforeach
                        </select> 
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                        <button href="" type="submit" class="btn btn-success">Aceptar</button>
                        <a href="{{route('organizations.index')}}" class="btn btn-success">Regresar</a>
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
@push('scripts')
<script>
  $('#sensors').select2();
</script>
@endpush

