<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>

<head>

  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <title>InventoryPC | Reporte generado</title>
  <meta name="generator" content="https://conversiontools.io" />
  <meta name="author" content="juansanc" />
  <meta name="created" content="2008-01-11T14:36:53" />
  <meta name="changedby" content="Jefferson Javier Ortega Pacheco" />
  <meta name="changed" content="2021-03-17T20:39:46" />
  <meta name="AppVersion" content="16.0300" />
  <meta name="Company" content="UNAP" />
  <meta name="DocSecurity" content="0" />
  <meta name="HyperlinksChanged" content="false" />
  <meta name="LinksUpToDate" content="false" />
  <meta name="ScaleCrop" content="false" />
  <meta name="ShareDoc" content="false" />

  <style type="text/css">
    body,
    div,
    table,
    thead,
    tbody,
    tfoot,
    tr,
    th,
    td,
    p {
      font-family: "Arial";
      font-size: x-small
    }

    a.comment-indicator:hover+comment {
      background: #ffd;
      position: absolute;
      display: block;
      border: 1px solid black;
      padding: 0.5em;
    }

    a.comment-indicator {
      background: red;
      display: inline-block;
      border: 1px solid black;
      width: 0.5em;
      height: 0.5em;
    }

    comment {
      display: none;
    }
  </style>

</head>

<body>
  <table cellspacing="0" border="0">
    <colgroup width="20"></colgroup>
    <colgroup width="103"></colgroup>
    <colgroup width="227"></colgroup>
    <colgroup width="109"></colgroup>
    <colgroup width="84"></colgroup>
    <colgroup width="153"></colgroup>
    <colgroup width="30"></colgroup>
    <tr>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        colspan=2 rowspan=4 height="72" align="center">
        <font size=1><br><img src="https://viva1a.com.co/wp-content/uploads/2019/03/img-logo-p.png" width=159 height=55
            hspace=10 vspace=13>
        </font>
      </td>
      <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        colspan=5 rowspan=2 align="center"><b>INFORME TECNICO PARA BAJA ACTIVOS FIJOS</b></td>
    </tr>
    <tr>
    </tr>
    <tr>
      <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        colspan=5 rowspan=2 align="justify" valign=top>
        <b>
          <font size=2>Finalidad:</font>
        </b>
        <font size="1">Certificar el estado de funcionamiento en que se encuentran los bienes revisados, baja
          de activos fijos inventariables, seg&uacute;n corresponda al pronuncionamiento del t&eacute;cnico.</font>
      </td>
    </tr>
    <tr>
    </tr>
    <tr>
      <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" colspan=3 rowspan=2 height="20"
        align="left" valign=middle><b>
          @foreach($generated_report_pc as $date_repo_pc)
          <font size=1>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            FECHA: {{\Carbon\Carbon::parse($date_repo_pc->fechaCreacion)->format('d/m/Y')}}</font>
          @endforeach
        </b></td>
      <td style="border-top: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=2 align="right"
        valign=middle><b>
          <font size=1> FOLIO:
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
        </b></td>
    </tr>
    <tr>
    </tr>
    <tr>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        colspan=7 rowspan=2 height="12" align="left" valign=bottom><b>
          <font size=1>1) IDENTIFICACION RESPONSABLE DEL INFORME</font>
        </b></td>
    </tr>
    <tr>
    </tr>
    @foreach($generated_report_pc as $repo_pc)
    <tr>
      <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 height="17" align="left"
        valign=middle>
        <font size=1>NOMBRE: {{$repo_pc->tecNombreApellido}}</font>
      </td>
    </tr>
    <tr>
      <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 height="17" align="left"
        valign=middle>
        <font size=1>CARGO: {{$repo_pc->tecCargo}}</font>
      </td>
    </tr>
    <tr>
      <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 height="17" align="left"
        valign=middle>
        <font size=1>SEDE: {{$repo_pc->tecSede}}</font>
      </td>
    </tr>
    <tr>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        colspan=7 height=15 align="left" valign=bottom><b>
          <font size=1>2) DETALLE DEL ACTIVO FIJO</font>
        </b></td>
    </tr>
    <tr>
      <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        colspan=7 rowspan=2 height="20" align="center"><b>
          <font size=1>ALTERNATIVAS PARA SOLUCION TECNICA</font>
        </b></td>
    </tr>
    <tr>
    </tr>
    <tr>
      <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 rowspan=2 height="10"
        align="center">
        <font size=1>1) REPARACION NO RENTABLE 2) COMPRAR REPUESTOS PARA REPARACION 3) ENVIAR A SERVICIO TECNICO
          ESPECIALIZADO</font>
      </td>
    </tr>
    <tr>
    </tr>
    <tr>
      <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        colspan=7 rowspan=2 height="10" align="center">
        <font size=1>4) REEMPLAZAR POR OBSOLETO 5) REASIGNAR, BIENES EN BUEN ESTADO 6) OTROS (Especificar en recudro
          &quot;Observaciones&quot;)</font>
      </td>
    </tr>
    <tr>
    </tr>
    <tr>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        rowspan=2 height="40" align="center" valign=middle><b>
          <font size=2>N&deg;</font>
        </b></td>
      <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle><b>
          <font size=1>CODIGO</font>
        </b></td>
      <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle><b>
          <font size=1>DESCRIPCION DEL BIEN</font>
        </b></td>
      <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle><b>
          <font size=1>NUMERO DE</font>
        </b></td>
      <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle><b>
          <font size=1>CUSTODIO</font>
        </b></td>
      <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle><b>
          <font size=1>NOMBRE DE LA</font>
        </b></td>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        rowspan=2 align="center" valign=middle><b>
          <font size=3>S.T</font>
        </b></td>
    </tr>
    <tr>
      <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle><b>
          <font size=1>INVENTARIO</font>
        </b></td>
      <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle><b>
          <font size=1>(Tipo, Marca, Modelo, Color, Etc.)</font>
        </b></td>
      <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle><b>
          <font size=1>SERIE</font>
        </b></td>
      <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle><b>
          <font size=1>TITULAR</font>
        </b></td>
      <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle><b>
          <font size=1>DEPENDENCIA</font>
        </b></td>
    </tr>
    <tr>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        rowspan=2 height="96" align="center" valign=middle sdval="1" sdnum="1033;0;00"><b>
          <font size=2>01</font>
        </b></td>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        align="center" valign=top sdval="635" sdnum="1033;0;000000">{{$repo_pc->activoFijo}}</td>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        align="center" valign=top sdnum="1033;0;000000">
        <font size=1>{{$repo_pc->descriptionComputer}}</font>
      </td>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        align="center" valign=top>
        <font size=1>{{$repo_pc->serialComputer}}</font>
      </td>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        align="center" valign=top sdnum="1033;0;000000000">
        <font size=1>{{$repo_pc->location}}</font>
      </td>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        align="center" valign=top bgcolor="#FFFFFF">
        <font size=1>{{$repo_pc->nameDependency}}</font>
      </td>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        rowspan=2 align="center" valign=middle sdval="1" sdnum="1033;"><b>
          <font size=4>{{$repo_pc->ST}}</font>
        </b></td>
    </tr>
    <tr>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        align="center" valign=middle sdnum="1033;0;00"><b>
          <font size=1>DIAGN&Oacute;STICO 01</font>
        </b></td>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        colspan=4 align="left" valign=top sdnum="1033;0;000000">
        {{-- DIAGNOSTICO 01 --}}
        {{$repo_pc->diagnostic}}
      </td>
    </tr>
    <tr>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        rowspan=2 height="96" align="center" valign=middle sdval="2" sdnum="1033;0;00"><b>
          <font size=2>02</font>
        </b></td>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        align="center" valign=top sdnum="1033;0;000000"><br></td>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        align="left" valign=top sdnum="1033;0;000000">
        <font size=1><br></font>
      </td>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        align="left" valign=top>
        <font size=1><br></font>
      </td>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        align="center" valign=top sdnum="1033;0;000000000">
        <font size=1><br></font>
      </td>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        align="left" valign=top bgcolor="#FFFFFF">
        <font size=1><br></font>
      </td>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        rowspan=2 align="center" valign=middle><b>
          <font size=4><br></font>
        </b></td>
    </tr>
    <tr>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        align="center" valign=middle sdnum="1033;0;00"><b>
          <font size=1>DIAGN&Oacute;STICO 02</font>
        </b></td>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        colspan=4 align="left" valign=top sdnum="1033;0;000000"><br>
        {{-- DIAGNOSTICO 02 --}}
      </td>
    </tr>
    <tr>
      <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        colspan=7 rowspan=3 height="10" align="left" valign=bottom><b>
          <font size=1>3) OBSERVACIONES</font>
        </b></td>
    </tr>
    <tr>
    </tr>
    <tr>
    </tr>
    <tr>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        colspan=7 rowspan=5 height="60" align="left" valign=top><br>
        {{$repo_pc->observation}}
      </td>
    </tr>
    <tr>
    </tr>
    <tr>
    </tr>
    <tr>
    </tr>
    <tr>
    </tr>
    <tr>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        colspan=7 height="15" align="left" valign=bottom><b>
          <font size=1>RESPONSABLE DEL INFORME: {{$repo_pc->tecNombreApellido}}</font>
        </b></td>
    </tr>
    <tr>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        colspan=7 height="15" align="left" valign=bottom><b>
          <font size=1>CARGO: {{$repo_pc->tecCargo}} {{$repo_pc->tecSede}}</font>
        </b></td>
    </tr>
    @endforeach
    <tr>
      <td
        style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
        colspan=7 height="80" align="center" valign=bottom><b> FIRMA </b></td>
    </tr>
  </table>
</body>

</html>