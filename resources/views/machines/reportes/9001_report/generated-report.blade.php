<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>InventoryPC | Reporte generado</title>
</head>

<body>
  <table style="border-collapse: collapse; width: 100%;">
    <tbody>
      <tr>
        <td style="width: 100%; border-style: hidden;">
          <table style="height: 273px; width: 100%; border-collapse: collapse;" border="1">
            <tbody>
              <tr style="height: 10px;">
                <td style="width: 21.0318%; height: 20px;" rowspan="2" align="middle" valign="top">
                  <p style="text-align: center;"><img style="display: block; margin: auto;"
                      src="https://viva1a.com.co/wp-content/uploads/2019/03/img-logo-p.png" alt="" width="159"
                      height="55" hspace="10" vspace="13" /></p>
                </td>
                <td style="width: 57.0634%; height: 10px;">
                  <p style="text-align: center;"><strong>Centro Tecnolog&iacute;a Inteligencia </strong></p>
                  <p style="text-align: center;"><strong>Innovaci&oacute;n (CETII)</strong></p>
                </td>
                <td style="width: 13.7412%; height: 10px; text-align: center;"><strong>Proceso:
                    <br /></strong>Tecnolog&iacute;a</td>
              </tr>
              <tr style="height: 10px;">
                <td style="width: 57.0634%; height: 10px; text-align: center;"><strong>Actas De Entrega De Entrega
                    Equipos
                    TI<br /></strong>VERSION ENT 001-1</td>
                <td style="width: 13.7412%; height: 10px; text-align: center;"><strong>Fecha: 25-01-2018</strong></td>
              </tr>
              @foreach($generated_report_pc as $deliveryRepo)
              <tr>
                <td style="width: 91.8364%;" colspan="3">
                  <p style="text-align: center;"><strong>Acta de Entrega de Equipos Computacionales</strong></p>
                  <p style="text-align: justify; font-size: 14px">Hoy {{$deliveryRepo->DiaReporte}} del mes de
                    <?php $dt = \Carbon\Carbon::parse($deliveryRepo->MesReporte); setlocale(LC_TIME, 'Spanish');
                    echo $dt->localeMonth;?> de {{$deliveryRepo->AnioReporte}}, mediante el presente documento se
                    realiza la entrega formal de los equipos computacionales que se indican el punto 2.-&nbsp;
                    EQUIPOS COMPUTACIONALES ASIGNADOS para el cumplimiento de las actividades laborales del
                    FUNCIONARIO RESPONSABLE, qui&eacute;n declara recepci&oacute;n de los mismos en buen estado y se
                    compromete a cuidar de los recursos y hacer uso de ellos para los fines establecidos.</p>
                  <table
                    style="height: 37px; width: 98.175%; border-collapse: collapse; margin-left: auto; margin-right: auto; font-size: 14px"
                    border="1">
                    <caption>
                      <p style="text-align: left; font-size: 14px"><strong>1.- FUNCIONARIO RESPONSABLE</strong></p>
                    </caption>
                    <tbody>
                      <tr style="height: 19px;">
                        <td style="width: 50.5989%; height: 19px; text-align: left;">Nombres, Apellidos</td>
                        <td style="width: 67.2216%; height: 19px;">{{$deliveryRepo->ResposibleOfficer}}</td>
                      </tr>
                      <tr style="height: 18px;">
                        <td style="width: 50.5989%; height: 18px;">Cargo</td>
                        <td style="width: 67.2216%; height: 18px;">{{$deliveryRepo->PositionOfficer}}</td>
                      </tr>
                    </tbody>
                  </table>
                  <br />
                  <table
                    style="width: 98.175%; border-collapse: collapse; margin-left: auto; margin-right: auto; font-size: 14px"
                    border="1">
                    <caption>
                      <p style="text-align: left; font-size: 14px"><strong>2.- EQUIPOS COMPUTACIONALES
                          ASIGNADOS</strong></p>
                    </caption>
                    <tbody>
                      <tr>
                        <td style="width: 50%;">MODELO DEL EQUIPO</td>
                        <td style="width: 47.9791%;">{{$deliveryRepo->PcModel}}</td>
                      </tr>
                      <tr>
                        <td style="width: 50%;">NUMERO DE SERIE</td>
                        <td style="width: 47.9791%;">{{$deliveryRepo->PcSerial}}</td>
                      </tr>
                      <tr>
                        <td style="width: 50%;">NUMERO DE INVENTARIO</td>
                        <td style="width: 47.9791%;">N/A</td>
                      </tr>
                    </tbody>
                  </table>
                  <p>&nbsp;</p>
                  <table
                    style="height: 270px; width: 98.175%; border-collapse: collapse; margin-left: auto; margin-right: auto; font-size: 14px"
                    border="1">
                    <tbody>
                      <tr style="height: 18px;">
                        <td style="width: 16.2227%; height: 18px; text-align: center;">
                          <strong>Descripci&oacute;n</strong>
                        </td>
                        <td style="width: 17.8131%; height: 18px; text-align: center;"><strong>Marca</strong></td>
                        <td style="width: 21.479%; height: 18px; text-align: center;"><strong>Referencia</strong></td>
                        <td style="width: 21.479%;; height: 18px; text-align: center;"><strong>Caracteristicas</strong>
                        </td>
                        <td style="width: 23.0815%; height: 18px; text-align: center;"><strong>Serial</strong></td>
                      </tr>
                      <tr style="height: 18px;">
                        <td style="width: 16.2227%; height: 18px;">Procesador</td>
                        <td style="width: 17.8131%; height: 18px;">{{$deliveryRepo->CpuBrand}}</td>
                        <td style="width: 23.479%; height: 18px;">{{$deliveryRepo->CpuReference}}</td>
                        <td style="width: 19.4037%; height: 18px;">{{$deliveryRepo->CpuGhz}}</td>
                        <td style="width: 23.0815%; height: 18px;">&nbsp;</td>
                      </tr>
                      <tr style="height: 18px;">
                        <td style="width: 16.2227%; height: 18px;">Disco Duro</td>
                        <td style="width: 17.8131%; height: 18px;">&nbsp;</td>
                        <td style="width: 23.479%; height: 18px;">{{$deliveryRepo->HddType}}</td>
                        <td style="width: 19.4037%; height: 18px;">{{$deliveryRepo->HddSize}}</td>
                        <td style="width: 23.0815%; height: 18px;">&nbsp;</td>
                      </tr>
                      <tr style="height: 18px;">
                        <td style="width: 16.2227%; height: 18px;">Memoria RAM</td>
                        <td style="width: 17.8131%; height: 18px;">&nbsp;</td>
                        <td style="width: 23.479%; height: 18px; font-size: 12px">{{$deliveryRepo->RamReference}}</td>
                        <td style="width: 19.4037%; height: 18px;font-size: 12px">{{$deliveryRepo->RamCharacteristics}}
                        </td>
                        <td style="width: 23.0815%; height: 18px;">&nbsp;</td>
                      </tr>
                      <tr style="height: 18px;">
                        <td style="width: 16.2227%; height: 18px;">Teclado</td>
                        <td style="width: 17.8131%; height: 18px;">&nbsp;</td>
                        <td style="width: 23.479%; height: 18px;">&nbsp;</td>
                        <td style="width: 19.4037%; height: 18px;">{{$deliveryRepo->TieneTeclado}}</td>
                        <td style="width: 23.0815%; height: 18px;">{{$deliveryRepo->SerialTeclado}}</td>
                      </tr>
                      <tr style="height: 18px;">
                        <td style="width: 16.2227%; height: 18px;">Monitor</td>
                        <td style="width: 17.8131%; height: 18px;">&nbsp;</td>
                        <td style="width: 23.479%; height: 18px;">&nbsp;</td>
                        <td style="width: 19.4037%; height: 18px;">&nbsp;</td>
                        <td style="width: 23.0815%; height: 18px;">{{$deliveryRepo->SerialMonitor}}</td>
                      </tr>
                      <tr style="height: 18px;">
                        <td style="width: 16.2227%; height: 18px;">SO</td>
                        <td style="width: 17.8131%; height: 18px;">&nbsp;</td>
                        <td style="width: 23.479%; height: 18px;">&nbsp;</td>
                        <td style="width: 19.4037%; height: 18px;">{{$deliveryRepo->SistemaOperativo}}</td>
                        <td style="width: 23.0815%; height: 18px;">&nbsp;</td>
                      </tr>
                      <tr style="height: 18px;">
                        <td style="width: 16.2227%; height: 18px;">WIFI</td>
                        <td style="width: 17.8131%; height: 18px;">&nbsp;</td>
                        <td style="width: 23.479%; height: 18px;">&nbsp;</td>
                        <td style="width: 19.4037%; height: 18px;">{{$deliveryRepo->TieneWifi}}</td>
                        <td style="width: 23.0815%; height: 18px;">&nbsp;</td>
                      </tr>
                      <tr style="height: 18px;">
                        <td style="width: 16.2227%; height: 18px;">Web Cam</td>
                        <td style="width: 17.8131%; height: 18px;">&nbsp;</td>
                        <td style="width: 23.479%; height: 18px;">&nbsp;</td>
                        <td style="width: 19.4037%; height: 18px;">{{$deliveryRepo->TieneWebCam}}</td>
                        <td style="width: 23.0815%; height: 18px;">&nbsp;</td>
                      </tr>
                      <tr style="height: 18px;">
                        <td style="width: 16.2227%; height: 18px;">Accesorios:</td>
                        <td style="width: 17.8131%; height: 18px;">&nbsp;</td>
                        <td style="width: 23.479%; height: 18px;">&nbsp;</td>
                        <td style="width: 19.4037%; height: 18px;">{{$deliveryRepo->Accesorios}}</td>
                        <td style="width: 23.0815%; height: 18px;">&nbsp;</td>
                      </tr>
                      <tr style="height: 18px;">
                        <td style="width: 16.2227%; height: 18px;">Funda</td>
                        <td style="width: 17.8131%; height: 18px;">&nbsp;</td>
                        <td style="width: 23.479%; height: 18px;">&nbsp;</td>
                        <td style="width: 19.4037%; height: 18px;">{{$deliveryRepo->TieneFunda}}</td>
                        <td style="width: 23.0815%; height: 18px;">&nbsp;</td>
                      </tr>
                      <tr style="height: 18px;">
                        <td style="width: 16.2227%; height: 18px;">Malet&iacute;n</td>
                        <td style="width: 17.8131%; height: 18px;">&nbsp;</td>
                        <td style="width: 23.479%; height: 18px;">&nbsp;</td>
                        <td style="width: 19.4037%; height: 18px;">{{$deliveryRepo->TieneMaletin}}</td>
                        <td style="width: 23.0815%; height: 18px;">&nbsp;</td>
                      </tr>
                      <tr style="height: 18px;">
                        <td style="width: 16.2227%; height: 18px;">Mouse</td>
                        <td style="width: 17.8131%; height: 18px;">&nbsp;</td>
                        <td style="width: 23.479%; height: 18px;">&nbsp;</td>
                        <td style="width: 19.4037%; height: 18px;">{{$deliveryRepo->TieneMouse}}</td>
                        <td style="width: 23.0815%; height: 18px;">{{$deliveryRepo->SerialMouse}}</td>
                      </tr>
                      <tr style="height: 18px;">
                        <td style="width: 16.2227%; height: 18px;">Adaptador</td>
                        <td style="width: 17.8131%; height: 18px;">&nbsp;</td>
                        <td style="width: 23.479%; height: 18px;">&nbsp;</td>
                        <td style="width: 19.4037%; height: 18px;">{{$deliveryRepo->TieneCargadorCorriente}}</td>
                        <td style="width: 23.0815%; height: 18px;">{{$deliveryRepo->SerialCargador}}</td>
                      </tr>
                      <tr style="height: 18px;">
                        <td style="width: 16.2227%; height: 18px;">Candado</td>
                        <td style="width: 17.8131%; height: 18px;">&nbsp;</td>
                        <td style="width: 23.479%; height: 18px;">&nbsp;</td>
                        <td style="width: 19.4037%; height: 18px;">{{$deliveryRepo->TieneCandado}}</td>
                        <td style="width: 23.0815%; height: 18px;">&nbsp;</td>
                      </tr>
                    </tbody>
                  </table>
                  <p>&nbsp;</p>
                  <table style="width: 98.175%; border-collapse: collapse; margin-left: auto; margin-right: auto;"
                    valign=bottom>
                    <tbody style="font-size: 12px;">
                      <tr>
                        <td style="width: 63.5915%;"><strong>{{$deliveryRepo->InfoTecnico}}</strong></td>
                        <td style="width: 36.4085%; text-align: right;">
                          <strong>{{$deliveryRepo->ResposibleOfficer}}</strong></td>
                      </tr>
                      <tr>
                        <td style="width: 63.5915%;"><strong>{{$deliveryRepo->CargoTecnico}}
                            {{$deliveryRepo->Sede}}</strong></td>
                        <td style="width: 36.4085%; text-align: right;">
                          <strong>{{$deliveryRepo->PositionOfficer}}</strong></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</body>

</html>