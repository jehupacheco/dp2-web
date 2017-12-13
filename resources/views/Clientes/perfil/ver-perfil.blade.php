@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Perfil de Cliente</h3>
              </div>


            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Reporte de cliente <small>reporte de actividad</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="{{ $cliente->profile_img_url }}" alt="Avatar" title="Change the avatar" style="height: 150px;">
                        </div>
                      </div>
                      <h3>{{$cliente->name}} {{$cliente->lastname}}</h3>

                      <ul class="list-unstyled user_data">
                        

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> {{$cliente->getOrgName()}}
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-envelope-o" aria-hidden="true"></i> {{$cliente->email}}
                        </li>
                        
                        <li><i class="fa fa-phone" aria-hidden="true"></i> {{$cliente->phone}}
                        </li>

                        <li>
                          <p class="ratings">
                            <a>{{$cliente->rating}}.0</a>
                            @for ($i = 0; $i < $cliente->rating; $i++)
                                <a href="#"><span class="fa fa-star"></span></a>
                            @endfor

                          </p>
                        </li>
                        
                      </ul>

                      <a class="btn btn-success" href="{{url('/clientes/'.$cliente->id.'/edit')}}"><i class="fa fa-edit m-right-xs"></i>Editar Perfil</a>
                      <br />

                      <!-- start skills -->
                      <!-- <h4>Reporte de actividad del usuario</h4>
                      <ul class="list-unstyled user_data">
                        <li>
                          <p>Recorrido en la semana</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                          </div>
                        </li>
                        <li>
                          <p>Nivel de Logros</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                          </div>
                        </li>
                        <li>
                          <p>Uso del estacionamiento en la semana</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                          </div>
                        </li>
                      </ul> -->
                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Alquiler de vehículos</h2>
                        </div>
                        <div class="col-md-6">
                          <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            @if($rentings->count()!=0)
                            <span>{{$rentings[0]->created_at}} - {{$rentings[$rentings->count()-1]->created_at}}</span>
                            @else
                            <span>No hay datos que mostrar</span>
                            @endif
                          </div>
                        </div>
                      </div>
                      <!-- start of user-activity-graph -->
                      <canvas id="lineChart" style="width: 636px; height: 218px;" width="636" height="218"></canvas>
                      <!-- end of user-activity-graph -->

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" role="home-tab" id="profile-tab" data-toggle="tab" aria-expanded="true">Datos de los últimos alquileres</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab1" data-toggle="tab" aria-expanded="false">Datos de los vehículos alquilados</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Vehículo (Placa)</th>
                                  <th>Organización</th>
                                  <th>Costo Unit.(S/.)</th>
                                  <th class="hidden-phone">Horas de alquiler</th>
                                  <th>Costo Total(S/.)</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $cont = 1; ?>
                                @foreach($rentings as $renting)
                                <tr>
                                  <td>{{$cont}}</td>
                                  <td>{{$renting->getPlateById($renting->vehicle_id)}}</td>
                                  <td>{{$renting->getOrgNameById($renting->vehicle_id)}}</td>
                                  <td>S/.{{$renting->getCostUnitById($renting->vehicle_id)}}</td>
                                  <td>{{$renting->getNHours()}}</td>
                                  <td>S/.{{$renting->getTotalCost()}}</td>
                                </tr>
                                <?php $cont = $cont + 1; ?>
                                @endforeach
                              </tbody>
                            </table>
                            <!-- end user projects -->
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Vehículo (Placa)</th>
                                  <th>Organización</th>
                                  <th>Entregado</th>
                                  <th>Devuelto</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $cont = 1; ?>
                                @foreach($rentings as $renting)
                                <tr>
                                  <td>{{$cont}}</td>
                                  <td>{{$renting->getPlateById($renting->vehicle_id)}}</td>
                                  <td>{{$renting->getOrgNameById($renting->vehicle_id)}}</td>
                                  @if(!is_null($renting->delivered_at))
                                  <td class=" " title="{{$renting->delivered_at}}">&nbsp;&nbsp;&nbsp;<i class="fa fa-check fa-lg" style="color: #49ea49;"></i></td> 
                                  @else
                              
                                  <td class=" " title="Debe ser entregado al cliente en {{$renting->starts_at}}">&nbsp;&nbsp;&nbsp;<i class="fa fa-minus-circle fa-lg" aria-hidden="true"></i></td>
                                  @endif
                                  @if(!is_null($renting->returned_at))
                                  <td class=" " title="{{$renting->returned_at}}">&nbsp;&nbsp;&nbsp;<i class="fa fa-check fa-lg" style="color: #49ea49;"></i></td>
                                  @else
                                  <td class=" " title="Se debe devolver el {{$renting->finishes_at}}">&nbsp;&nbsp;&nbsp;<i class="fa fa-minus-circle fa-lg" aria-hidden="true"></i></td>
                                  @endif

                                </tr>
                                <?php $cont = $cont + 1; ?>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
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

      Chart.defaults.global.legend = {
        enabled: false
      };
      var rentingsData = <?php echo json_encode($rentings); ?>;
      var labels = [],dataAux=[];
      for (var i = 0; i < rentingsData.length; i++) {
          labels.push(rentingsData[i].created_at);
          dataAux.push(rentingsData[i].totalCost);
      }
      var ctx = document.getElementById("lineChart");
      var lineChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
            label: "Costo total en Nuevos Soles",
            backgroundColor: "rgba(38, 185, 154, 0.31)",
            borderColor: "rgba(38, 185, 154, 0.7)",
            pointBorderColor: "rgba(38, 185, 154, 0.7)",
            pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointBorderWidth: 1,
            data: dataAux
          }]
        },
      });

    </script>

@endpush