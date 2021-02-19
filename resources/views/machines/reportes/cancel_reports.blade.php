@extends('adminlte::page')

@section('title', 'Reportes de equipos')

@section('content')

<table style="border-collapse: collapse; width: 97.3806%; height: 684px;" border="1">
  <tbody>
    <tr style="height: 62px;">
      <td style="text-align: center; height: 10px; width: 21.4114%;" colspan="2">
        <h5><strong><img style="vertical-align: top; display: block; margin-left: auto; margin-right: auto;"
              src="https://viva1a.com.co/wp-content/uploads/2019/03/img-logo-p.png" alt="" width="247"
              height="80" /></strong></h5>
      </td>
      <td style="text-align: center; height: 10px; width: 78.5085%;" colspan="5">
        <p>
          <h4><strong>
              <p>{{$name_reports[0]->name}}</p>
            </strong>
          </h4>
        </p>
        <h5>
          <p style="text-align: left;">
            <strong>Finalidad:</strong> Certificar el estado de funcionamiento en que se
            encuentran los bienes revisados, baja de activos fijos inventariables, seg&uacute;n corresponda al
            pronuncionamiento del t&eacute;cnico.
          </p>
        </h5>
      </td>
    </tr>
    <tr style="height: 30px;">
      <td style="text-align: center; height: 30px; width: 99.9199%;" colspan="7">
        <table style="border-collapse: collapse; width: 98.2301%; height: 18px;" border="1">
          <tbody>
            <tr style="height: 18px;">
              <td style="width: 6.88423%; height: 18px; border-style: hidden;">&nbsp;</td>
              <td style="width: 5.99936%; height: 18px; text-align: left; border-style: hidden;">
                <h5><strong>FECHA:</strong>
                </h5>
              </td>
              <td style="width: 26.1539%; height: 18px; text-align: left; border-style: hidden;">
                <h5>{{\Carbon\Carbon::now()->toDayDateTimeString()}}</h5>
              </td>
              <td style="width: 18.1053%; height: 18px; border-style: hidden;">&nbsp;</td>
              <td style="width: 22.9671%; height: 18px; border-style: hidden;">&nbsp;</td>
              <td style="width: 5.19479%; height: 18px; text-align: left; border-style: hidden;"><strong></strong>
              </td>
              <td style="width: 12.9253%; height: 18px; border-style: hidden;"></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
    @foreach($cancel_report_by_pc as $machine)
    <tr style="height: 10px;">
      <td style="height: 10px; text-align: left; width: 99.9199%;" colspan="7">
        <h5><strong>1) IDENTIFICACION RESPONSABLE DEL
            INFORME</strong></h5>
      </td>
    </tr>
    <tr style="height: 18px;">
      <td style="height: 18px; width: 99.9199%; text-align: left;" colspan="7">
        <p>
          <h5><strong>&nbsp;NOMBRE:</strong> {{$machine->tecNombreApellido}}</h5>
        </p>
        <p>
          <h5><strong>&nbsp;CARGO:</strong> {{$machine->tecCargo}}</h5>
        </p>
        <p>
          <h5><strong>&nbsp;SEDE:</strong> {{$machine->tecSede}}</h5>
        </p>
      </td>
    </tr>
    <tr style="height: 13px;">
      <td style="text-align: left; height: 13px; width: 99.9199%;" colspan="7">
        <p><strong>2) DETLLE DEL ACTIVO FIJO</strong></p>
        <p style="text-align: center;"><strong>ALTERNATIVAS PARA SOLUCION TECNICA</strong></p>
      </td>
    </tr>
    <tr style="height: 78px;">
      <td style="width: 99.9199%; text-align: left; height: 78px;" colspan="7">
        <p style="text-align: center;">&nbsp;<strong>1)</strong> REPARACION NO RENTABLE <strong>2)</strong> COMPRAR
          REPUESTOS PARA REPARACION <strong>3)</strong> ENVIAR A SERVICIO TECNICO ESPECIALIZADO</p>
        <p style="text-align: center;">&nbsp;<strong>4)</strong> REEMPLAZAR POR OBSOLETO <strong>5)</strong> REASIGNAR,
          BIENES EN BUEN ESTADO <strong>6)</strong> OTROS (Especificar en recudro "Observaciones")</p>
      </td>
    </tr>
    <tr style="height: 10px; text-align: center;">
      <td style="width: 2.80058%; height: 10px; text-align: center;">
        <h5><strong>N&deg;</strong></h5>
      </td>
      <td style="width: 19.0858%; height: 10px; text-align: center;">
        <h5><strong>CODIGO </strong><strong>INVENTARIO</strong></h5>
      </td>
      <td style="width: 20.6897%; height: 10px; text-align: center;">
        <div><strong>DESCRIPCION DEL BIEN</strong></div>
        <div><strong>(Tipo, Marca, Modelo, Color, Etc.)</strong></div>
      </td>
      <td style="width: 11.0666%; height: 10px; text-align: center;">
        <h5><strong>NUMERO DE SERIE</strong></h5>
      </td>
      <td style="width: 10.9864%; height: 10px; text-align: center;">
        <h5><strong>CUSTODIO </strong><strong>TITULAR</strong></h5>
      </td>
      <td style="width: 30.4731%; height: 10px; text-align: center;">
        <h5><strong>NOMBRE DE LA </strong><strong>DEPENDENCIA</strong></h5>
      </td>
      <td style="width: 5.2927%; text-align: center; height: 10px;">
        <h5><strong>S.T</strong></h5>
      </td>
    </tr>
    <tr style="height: 63px;">
      <td style="width: 2.32558%; height: 117px; text-align: center;" rowspan="2">
        <h5><strong>01</strong></h5>
      </td>
      <td style="width: 19.0858%; text-align: center; height: 63px;" width="97">
        <p>{{$machine->activoFijo}}</p>
      </td>
      <td style="width: 20.6897%; height: 63px; text-align: center;">
        <p>{{$machine->descriptionComputer}}</p>
      </td>
      <td style="width: 11.0666%; text-align: center; height: 63px;" width="103">
        <p>{{$machine->serialComputer}}</p>
      </td>
      <td style="width: 10.9864%; text-align: center; height: 63px;" width="79">
        <p>{{$machine->location}}</p>
      </td>
      <td style="width: 30.4731%; text-align: center; height: 63px;" width="145">
        <p>{{$machine->nameDependency}}</p>
      </td>
      <td style="width: 5.2927%; text-align: center; height: 117px;" rowspan="2">
        <h2>
          <p><strong>{{$machine->ST}}</strong></p>
        </h2>
      </td>
    </tr>
    <tr style="height: 150px;">
      <td style="width: 19.0858%; height: 54px;" width="97"><strong>DIAGN&Oacute;STICO</strong></td>
      <td style="width: 73.2158%; height: 54px;" colspan="4" width="542">
        <textarea class="form-control" maxlength="200" id="" name="obs" style="height: 150px;"
          aria-label="With textarea" disabled>{{$machine->diagnostic}}</textarea>
      </td>
    </tr>
    <tr style="height: 30px;">
      <td style="text-align: left; height: 18px; width: 99.9199%;" colspan="7"><strong>&nbsp;3) OBSERVACIONES</strong>
      </td>
    </tr>
    <tr style="height: 150px;">
      <td style="text-align: left; height: 83px; width: 99.9199%;" colspan="7">
        <textarea class="form-control" maxlength="200" id="" name="obs" style="height: 150px;"
          aria-label="With textarea" disabled>{{$machine->observation}}</textarea>
      </td>
    </tr>
    <tr style="height: 30px;">
      <td style="text-align: left; height: 24px; width: 99.9199%;" colspan="7">
        RESPONSABLE DEL INFORME: {{$machine->tecNombreApellido}}
      </td>
    </tr>
    <tr style="height: 30px;">
      <td style="text-align: left; height: 20px; width: 99.9199%;" colspan="7">
        CARGO: {{$machine->tecCargo}} {{$machine->tecSede}}
      </td>
    </tr>
    <tr style="height: 120px;">
      <td style="width: 99.9199%; text-align: left; height: 51px;" colspan="7">
        <p style="text-align: center;">&nbsp;</p>
        <p style="text-align: center;">FIRMA</p>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection

@push('js')
<script>
  window.addEventListener("load", window.print());
</script>
@endpush