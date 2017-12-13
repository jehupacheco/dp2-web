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
                                          <strong>{{$renting->getOrgNameById($renting->vehicle_id)}} SAC.</strong>
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
                                          <strong>{{$renting->getClient()->name}} {{$renting->getClient()->lastname}}</strong>
                                          <br>Organización: {{$renting->getOrgNameById($renting->vehicle_id)}}
                                          <br>Celular: {{$renting->getClient()->phone}}
                                          <br>Email: {{$renting->getClient()->email}}
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          <b>Factura #{{$renting->id}}</b>
                          <br>
                          <br>
                          <b>Orden ID:</b> {{$renting->id}}
                          <br>
                          <b>Fecha de pago:</b> {{$renting->returned_at}}
                          <br>
                          <b>Cuenta:</b> 968-34567
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
                                <th class="column-title" style="display: table-cell;">Placa </th>
                                <th class="column-title" style="display: table-cell;">Organización </th>
                                <th class="column-title" style="display: table-cell;">Fecha Inicio  </th>
                                <th class="column-title" style="display: table-cell;">Fecha Fin </th>
                                <th class="column-title" style="display: table-cell;">Costo x Hora </th>
                                <th class="column-title" style="display: table-cell;">SubTotal</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td class=" ">{{$renting->getPlateById($renting->vehicle_id)}}</td>
	                            <td class=" ">{{$renting->getOrgNameById($renting->vehicle_id)}}</td>
	                            <td class=" ">{{$renting->starts_at}}</td>
	                            <td class=" ">{{$renting->finishes_at}}</td>
	                            <td class="a-right a-right ">S/. {{$renting->getCostUnitById($renting->vehicle_id)}}</td>
	                            <td class="a-right a-right ">S/. {{$renting->getTotalCost()}}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">
                          <p class="lead">Métodos de Pago:</p>
                          <img src="{{asset('images/visa.png')}}" alt="Visa">
                          <img src="{{asset('images/mastercard.png')}}" alt="Mastercard">
                          <img src="{{asset('images/american-express.png')}}" alt="American Express">
                          <img src="{{asset('images/paypal.png')}}" alt="Paypal">
                          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                            En {{$renting->getOrgNameById($renting->vehicle_id)}} SAC. se puede usar estas tarjetas de crédito y débito como métodos de pago: Visa, MasterCard, American Express y Paypal.
                          </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-6">
                          <p class="lead">Monto adeudado</p>
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th style="width:50%">Subtotal:</th>
                                  <td>S/.{{$renting->getTotalCost()}}</td>
                                </tr>
                                <tr>
                                  <th>IGV (18%)</th>
                                  <?php $igv =  $renting->getTotalCost()*0.18 ?>
                                  <td>S/.{{$igv}}</td>
                                </tr>
                                <tr>
                                  <th>Total:</th>
                                  <td>S/.{{$renting->getTotalCost() + $igv}}</td>
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