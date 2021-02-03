@extends('adminlte::page')

@section('title', 'Reportes de equipos')

@section('content')
<h1>Informe tecnico para baja de activos fijos</h1>
<div class='row'>
    <div class="col-12">
        <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Finalidad:</h5>
            Certificar el estado de funcionamiento en que se encuentran los bienes revisados, baja de activos fijos
            inventariables,
            según corresponda al pronuncionamiento del técnico.
        </div>


        <!-- Main content -->
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    @foreach($machines as $machine)
                    <h4>
                        <i class="fas fa-user"></i> IDENTIFICACIÓN RESPONSABLE DEL INFORME:
                        <small class="float-right">Fecha: {{\Carbon\Carbon::now()->toDayDateTimeString()}}</small>
                    </h4>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <address>
                        Nombres y apellidos: <strong>{{$machine->tecNombreApellido}}</strong><br>
                        Cargo: {{$machine->tecCargo}}<br>
                        Sede: {{$machine->tecSede}}<br>
                        Direccion de la sede: <br>
                        Telefono: {{$machine->tecPhone}}<br>
                        Email: {{$machine->tecEmail}}
                    </address>
                </div>
            </div>
            @endforeach
            <!-- /.row -->
            <!-- /.col 
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>John Doe</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (555) 539-1037<br>
                        Email: john.doe@example.com
                    </address>
                </div>
                /.col
                <div class="col-sm-4 invoice-col">
                    <b>Invoice #007612</b><br>
                    <br>
                    <b>Order ID:</b> 4F3S8J<br>
                    <b>Payment Due:</b> 2/22/2014<br>
                    <b>Account:</b> 968-34567
                </div>
                /.col -->

            <div class="row">
                <div class="col-12">
                    <p class="lead"><strong>DETALLE DEL ACTIVO FIJO</strong></p>

                    <div class="table-responsive mb-2">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>1)</th>
                                    <td>REPARACION NO RENTABLE</td>
                                    <th>2)</th>
                                    <td>COMPRAR RESPUESTOS PARA REPARACION</td>
                                    <th>3)</th>
                                    <td>ENVIAR A SERVICIO TECNICO ESPECIALIZADO</td>
                                </tr>
                                <tr>
                                    <th>4)</th>
                                    <td>REMPLAZAR POR OBSOLETOS</td>
                                    <th>5)</th>
                                    <td>REASINGNAR, BIENES EN BUEN ESTADO</td>
                                    <th>6)</th>
                                    <td>OTROS (Especificar en recudro "Observaciones")</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th rowspan="3">N°</th>
                                <th>CODIGO <br>
                                    INVENTARIO
                                </th>
                                <th>DESCRIPCION DEL BIEN<br>
                                    (Tipo, Marca, Modelo, Color, Etc.)
                                </th>
                                <th>NUMERO DE <br>
                                    SERIE
                                </th>
                                <th>CUSTODIO<br>
                                    TITULAR
                                </th>
                                <th>NOMBRE DE LA<br>
                                    DEPENDENCIA
                                </th>
                                <th>S.T</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="0">1</td>
                                <td><input type="text" name="cod-inv" maxlength="10"></td>
                                <td>{{$machine->descriptionComputer}}</td>
                                <td>{{$machine->serialComputer}}</td>
                                <td>{{$machine->location}}</td>
                                <td><input type="text" name="name-dependency" maxlength="25"></td>
                                <td><input type="phone" name="s-t" maxlength="1"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-12">
                    <a href="{{ route('invoce-print.data')}}" rel="noopener" target="_blank" class="btn btn-default"><i
                            class="fas fa-print"></i> Print</a>
                    <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                        Payment
                    </button>
                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                        <i class="fas fa-download"></i> Generate PDF
                    </button>
                </div>
            </div>
        </div>
        <!-- /.invoice -->
    </div>
</div>

@endsection