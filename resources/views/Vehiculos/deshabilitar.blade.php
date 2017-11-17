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
              <form id="demo-form2" method="POST" action="{{url('/vehiculos/{$id}/deshabilitarPut')}}" data-parsley-validate class="form-horizontal form-label-left">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="plate">Placa vehículo <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="vel_max" name="vel_max" required="required" class="form-control col-md-7 col-xs-12" readonly="true" value = {{$id}}>
                  </div>
                </div>
                
                <div class="form-group">
                      <label for="reportrange" class="control-label col-md-3 col-sm-3 col-xs-12">Periodo</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div id="reportrange" name="reportrange"  style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                          <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                          <span>December 30, 2017 - January 28, 2017</span> <b class="caret"></b>
                        </div>
                      </div>
                      <input id="start_date" name="start_date" type="text" style="display: none;">
                      <input id="end_date" name="end_date" type="text" style="display: none;">
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


    <script>
      <!-- bootstrap-daterangepicker -->
          $(document).ready(function() {

            var cb = function(start, end, label) {
              console.log(start.toISOString(), end.toISOString(), label);
              $('#reportrange span').html(start.format('MMMM D HH:mm:ss, YYYY') + ' - ' + end.format('MMMM D HH:mm:ss, YYYY'));
            };

            var optionSet1 = {
              
              startDate: moment(),
              endDate: moment().add(24, 'hours'),
              minDate: moment(),
              maxDate: '12/31/2018',
              dateLimit: {
                days: 60
              },
              showDropdowns: true,
              showWeekNumbers: true,
              timePicker: true,
              timePickerIncrement: 30,
              timePicker12Hour: true,
              ranges: {
                'Un día': [moment(), moment().add(1, 'days')],
                'Una semana': [moment(), moment().add(6, 'days')],
                'Un mes': [moment(), moment().add(1, 'months')],
                'Un Año': [moment(), moment().add(12, 'months')],
              },
              opens: 'right',
              buttonClasses: ['btn btn-default'],
              applyClass: 'btn-small btn-primary',
              cancelClass: 'btn-small',
              format: 'DD/MM/YYYY',
              separator: ' a ',
              locale: {
                applyLabel: 'Aplicar',
                cancelLabel: 'Cancelar',
                fromLabel: 'De',
                toLabel: 'hasta',
                customRangeLabel: 'Seleccionar',
                daysOfWeek: ['Do', 'Lu', 'Ma', 'Mie', 'Jue', 'Vie', 'Sab'],
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                firstDay: 1
              }
            };
            $('#reportrange span').html(moment().format('MMMM D HH:mm:ss, YYYY') + ' - ' + moment().add(24, 'hours').format('MMMM D HH:mm:ss, YYYY'));
            $('#reportrange').daterangepicker(optionSet1, cb);
            $('#reportrange').on('show.daterangepicker', function() {
              // console.log("show event fired");
            });
            $('#reportrange').on('hide.daterangepicker', function() {
              console.log("hide event fired");
            });
            $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
              console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D HH:mm:ss, YYYY') + " to " + picker.endDate.format('MMMM D HH:mm:ss, YYYY'));
              document.getElementById('start_date').value = picker.startDate.format('YYYY/MM/DD HH:mm:ss');
              document.getElementById('end_date').value = picker.endDate.format('YYYY/MM/DD HH:mm:ss');

            });
            $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
              console.log("cancel event fired");
            });
            $('#options1').click(function() {
              $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
            });
            $('#options2').click(function() {
              $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
            });
            $('#destroy').click(function() {
              $('#reportrange').data('daterangepicker').remove();
            });
          });
        <!-- /bootstrap-daterangepicker -->

    </script>
@endpush