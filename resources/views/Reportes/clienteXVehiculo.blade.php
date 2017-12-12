@extends('layouts.blank')



@push('stylesheets')

@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
      <div>
          <div class="page-title">
              <div class="title_left">
                <h3> <small>Reporte de Recorrido</small></h3>
              </div>
          </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_content">
              <div class="row">
                

                <!-- Descripción del viaje -->
                
                  <div class="row">
                  
                  <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Datos Generales</h2>
                      
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>

                      <div class="clearfix"></div>

                    </div>
                    <div class="x_content">
                      <p>Kilómetros recorridos: {{$travel->total_distance}}</p>
                      <p>Costo Total: S/. {{$horas_alquiler}}</p>
                      <p>Costo por hora: S/. {{$vehicle->price}} </p>
                      <p>Velocidad Promedio: 50 km/h</p>
                      <p>Energía consumida: 50</p>
                    </div>
                  </div>
                  </div>

                  <!-- Descripción de infracciones -->
                  <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Detalles del viaje</h2>
                      
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul> 

                      <div class="clearfix"></div>

                    </div>
                    <div class="x_content">

                      

                      <p>Total de infracciones cometidas: {{$num_papeletas[0]->total}}</p>

                      <p>Fecha de inicio del viaje: </p>
                      <p>. {{$travel->started_at}}</p>

                      <p>Fecha de fin del viaje:  </p>
                      <p>. {{$travel->ended_at}}</p>

                    </div>
                  </div>
                </div>
                  </div>
                  <p>. </p>
                  <p>. </p>



              <div class="x_panel">
                  <div class="x_title">
                    <h2>Viajes <small>Filtrado de viajes</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <p>Seleccionar una fila para ver su detalle</p>

                    <div class="table-responsive">
                      <table id="dtTableRenting" class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                            </th>
                            <th class="column-title" style="display: table-cell;">Vehículo(placa) </th>
                            <th class="column-title" style="display: table-cell;">Latitud </th>
                            <th class="column-title" style="display: table-cell;">Longitud</th>
                            <th class="column-title" style="display: table-cell;">Fecha </th>
                            
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($positions as $position)
                          <tr class="even pointer">
                            <td class="a-center ">
                              <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                            </td>
                            <td class=" ">{{$position->vehicle_id}}</td>
                            <td class=" ">{{$position->latitude}}</td>
                            <td class=" ">{{$position->longitude}}</td>
                            <td class=" ">{{$position->created_at}}</td>                            
                            
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                  <div class="row">
            
            

            <div class="x_panel">
            <div class="col-md-12 col-sm-8 col-xs-12">

              <form id="demo-form2"  method="POST" action="{{url('/reportes/'.$travel->id.'/vehiculo/'.$vehicle->id.'/clienteXvehiculoPostMet')}}" data-parsley-validate class="form-horizontal form-label-left">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                  <div class="col-md-6 col-sm-3 col-xs-12">
                    <select id="sensor_id" name="sensor_id" class="form-control">
                      <option>Elija una opción</option>
                      @foreach($sensors as $sensor)
                        @if ($sensor->slug!="infraction")
                        <option value="{{$sensor->id}}">{{$sensor->description}}</option>
                        @endif
                      @endforeach
                    </select>
                    <button type="submit"  class="btn btn-success">Buscar</button>
                  </div>
                  
                

                </div>
                    
            <div class="col-md-12 col-sm-8 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                    <h2>Sensor de {{$sensorselected->description}}<small>.</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                    <canvas id="lineChart" style="width: 636px; height: 318px;" width="636" height="318"></canvas>
                  </div>
                </div>
          </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Infracciones<small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">

                    <ul class="list-unstyled timeline widget">
                      
                      @foreach ($papeletas as $infraccion)
                      
                        @if($infraccion->sensor_id == 11)
                        <li>
                        <div class="block">                          
                          <div class="block_content">
                            <h2 class="title">
                                              <a></a>
                                          </h2>
                            <div class="byline">
                              <span>{{$infraccion->created_at}}</span> tipo <a>Infraccion</a>
                            </div>
                            <p class="excerpt">{{$infraccion->description}}</p>
                            <!--a>Leer&nbsp;Mas</a-->
                          </div>
                        </div>
                      </li>                                        
                        @endif
                      @endforeach                      
                      
                    </ul>
                  </div>
                </div>
              </div>
            </div>

          </div>

                  
                </div>

                

                

                <div class="clearfix"></div>



              
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
  </div>
    <!-- /page content -->
@endsection



@push('scripts')

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

<!-- Flot -->
    <script>
      $(document).ready(function() {
        var data1 = [
          [gd(2012, 1, 1), 17],
          [gd(2012, 1, 2), 74],
          [gd(2012, 1, 3), 6],
          [gd(2012, 1, 4), 39],
          [gd(2012, 1, 5), 20],
          [gd(2012, 1, 6), 85],
          [gd(2012, 1, 7), 7]
        ];



        var data2 = [
          [gd(2012, 1, 1), 82],
          [gd(2012, 1, 2), 23],
          [gd(2012, 1, 3), 66],
          [gd(2012, 1, 4), 9],
          [gd(2012, 1, 5), 119],
          [gd(2012, 1, 6), 6],
          [gd(2012, 1, 7), 9]
        ];
        $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
          data1, data2
        ], {
          series: {
            lines: {
              show: false,
              fill: true
            },
            splines: {
              show: true,
              tension: 0.4,
              lineWidth: 1,
              fill: 0.4
            },
            points: {
              radius: 0,
              show: true
            },
            shadowSize: 2
          },
          grid: {
            verticalLines: true,
            hoverable: true,
            clickable: true,
            tickColor: "#d5d5d5",
            borderWidth: 1,
            color: '#fff'
          },
          colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
          xaxis: {
            tickColor: "rgba(51, 51, 51, 0.06)",
            mode: "time",
            tickSize: [1, "day"],
            //tickLength: 10,
            axisLabel: "Date",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10
          },
          yaxis: {
            ticks: 8,
            tickColor: "rgba(51, 51, 51, 0.06)",
          },
          tooltip: false
        });

        function gd(year, month, day) {
          return new Date(year, month - 1, day).getTime();
        }
      });
    </script>
    <!-- /Flot -->

    <script>
      Chart.defaults.global.legend = {
        enabled: false
      };
      var readinglist = <?php echo json_encode($readinglist); ?>;
      var sensor = <?php echo json_encode($sensorselected); ?>;
      // Line chart
      //console.log(readinglist);
      var labels = [],data=[];
      for (var i = 0; i < readinglist.length; i++) {
          labels.push(readinglist[i].dia);
          data.push(readinglist[i].value);
      }
      var ctx = document.getElementById("lineChart");
      var lineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
            label: sensor.description,
            backgroundColor: "rgba(38, 185, 154, 0.31)",
            borderColor: "rgba(38, 185, 154, 0.7)",
            pointBorderColor: "rgba(38, 185, 154, 0.7)",
            pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointBorderWidth: 1,
            data: data
          }]
        },
      });

    </script>

    @endpush