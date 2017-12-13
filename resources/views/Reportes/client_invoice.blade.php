@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Factura <small>Detalle de factura del alquiler</small></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                                          <i class="fa fa-bus"></i> AutómataPucp.
                                          <?php $date=date('d/m/Y');; ?>
                                          <small class="pull-right">Fecha: {{$date}}</small>
                                      </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          De:
                          <address>
                                          <strong>{{$client->getOrgName()}} SAC.</strong>
                                          <br>Av. Universitaria 1801, San Miguel 
                                          <br>Lima-32 PERU 
                                          <br>Telf. (511) 6262000
                                          <br>Email: utsystem.pucp@gmail.com
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          Para:
                          <address>
                                          <strong>{{$client->name}} {{$client->lastname}}</strong>
                                          <br>Organización: {{$client->getOrgName()}}
                                          <br>Celular: {{$client->phone}}
                                          <br>Email: {{$client->email}}
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          <b>Factura #18123</b>
                          <br>
                          <br>
                          <b>Orden ID:</b> 18123
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th class="column-title" style="display: table-cell;">Vahículo (Placa) </th>
                                <th class="column-title" style="display: table-cell;">Organización </th>
                                <th class="column-title" style="display: table-cell;">Fecha Inicio  </th>
                                <th class="column-title" style="display: table-cell;">Fecha Fin </th>
                                <th class="column-title" style="display: table-cell;">Costo x Hora </th>
                                <th class="column-title" style="display: table-cell;">SubTotal</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $cant = 1; ?>
                              @foreach($rentings as $renting)
                              <tr>
                                <td>{{$cant}}</td>
                                <td class=" ">{{$renting->getPlateById($renting->vehicle_id)}}</td>
	                            <td class=" ">{{$renting->getOrgNameById($renting->vehicle_id)}}</td>
	                            <td class=" ">{{$renting->starts_at}}</td>
	                            <td class=" ">{{$renting->finishes_at}}</td>
	                            <td class="a-right a-right ">S/. {{$renting->getCostUnitById($renting->vehicle_id)}}</td>
	                            <td class="a-right a-right ">S/. {{$renting->getTotalCost()}}</td>
                              </tr>
                              <?php $cant = $cant + 1; ?>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">

                        <div class="col-xs-6 col-xs-offset-6">
                          <p class="lead">Monto adeudado</p>
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th style="width:50%">Subtotal:</th>
                                  <?php 
                                  $costoTotal=0.0;
                                  foreach ($rentings as $renting) {
                                    $costoTotal = $costoTotal+ $renting->getTotalCost();
                                  } 

                                  ?>
                                  <td>S/.{{$costoTotal}}</td>
                                </tr>
                                <tr>
                                  <th>IGV (18%)</th>
                                  <?php $igv =  $costoTotal*0.18 ?>
                                  <td>S/.{{$igv}}</td>
                                </tr>
                                <tr>
                                  <th>Total:</th>
                                  <td>S/.{{$costoTotal + $igv}}</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-xs-12">
                          <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Imprimir</button>
                          
                          <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


@endsection




@push('scripts')

@endpush