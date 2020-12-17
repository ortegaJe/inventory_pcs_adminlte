<html>

<head>
  <style>
    @page {
      margin: 0cm 0cm;
      font-family: Arial;
      font-size: 10px
    }

    body {
      margin: 1cm 1cm 1cm;
    }

    table,
    td,
    th {
      border: 1px solid black;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      table-layout: fixed;
    }

    th {
      background-color: #28a745;
      color: white;
      height: 1cm;
      text-align: center;
    }

    header {
      position: fixed;
      top: 0cm;
      left: 0cm;
      right: 0cm;
      height: 1cm;
      /*background-color: #999;*/
      text-align: center;
      line-height: 10px;
    }

    footer {
      position: fixed;
      bottom: 0cm;
      left: 0cm;
      right: 0cm;
      height: 1cm;
      /*background-color: #999;*/
      text-align: center;
      line-height: 10px;
      font-size: 10px
    }
  </style>
  <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">-->
</head>

<body>
  <header>
    <h1></h1>
  </header>

  <main>
    <h1></h1>
    <div style="overflow-x:auto;">
      <table class="table">
        <thead>
          <tr>
            <th style="width:7%;">TYPE</th>
            <th style="width:10%;">MANUFACTURER</th>
            <th style="width:8%;">MODEL</th>
            <th style="width:6%;">RAM SLOT 1</th>
            <th style="width:6%;">RAM SLOT 2</th>
            <th style="width:6%;">HARD DRIVE</th>
            <th style="width:10%;">CPU</th>
            <th style="width:6%;">NAME PC</th>
            <th style="width:7%;">SERIAL</th>
            <th style="width:6%;">MONITOR</th>
            <th style="width:8%;">IP</th>
            <th style="width:10%;">MAC</th>
            <th style="width:6%;">ANYDESK</th>
            <th style="width:6%;">OS</th>
            <th style="width:10%;">LOCATION</th>
            <th style="width:8%;">CAMPUS</th>
            <th style="width:7%;">FECHA DE CREACION</th>
          </tr>
        </thead>
        <tbody>
          @foreach($machines as $machine)
          <tr style="text-align: center;">
            <td>{{ $machine->name }}</td>
            <td>{{ $machine->manufacturer }}</td>
            <td>{{ $machine->model }}</td>
            <td>{{ $machine->r0 }}</td>
            <td>{{ $machine->r1 }}</td>
            <td>{{ $machine->size }} {{ $machine->type }}</td>
            <td>{{ $machine->cpu }}</td>
            <td>{{ $machine->name_pc }}</td>
            <td>{{ $machine->serial }}</td>
            <td>{{ $machine->serial_monitor }}</td>
            <td>{{ $machine->ip_range }}</td>
            <td>{{ $machine->mac_address }}</td>
            <td>{{ $machine->anydesk }}</td>
            <td>{{ $machine->os }}</td>
            <td>{{ $machine->location }}</td>
            <td>{{ $machine->campu_name }}</td>
            <td>{{ \Carbon\Carbon::parse($machine->created_at)->toFormattedDateString() }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </main>

  <footer>
    <?php $dt = now(); ?>
    <h3>Generado: <?php echo $dt->toDayDateTimeString();?></h3>
  </footer>
</body>

</html>