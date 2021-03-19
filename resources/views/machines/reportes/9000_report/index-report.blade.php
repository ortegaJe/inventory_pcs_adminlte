@extends('adminlte::page')

@section('title', 'Reportes')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card card-primary card-outline" style="height: 725px;">
      <div class="card-header border-0">
        <h3 class="card-title" style="font-weight: 500; font-size:28px">Reportes de equipos
        </h3>
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 300px;">
        <table class="table table-head-fixed table-hover table-bordered text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>TYPE</th>
              <th>SERIAL</th>
              <th>IP</th>
              <th>MAC</th>
              <th>SEDE</th>
              <th>ESTADO</th>
              <th class="text-center">ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            @foreach($machines as $machine)
            <tr>
              <td>{{$machine->repoID}}</td>
              <td>{{$machine->name}}</td>
              <td>{{$machine->serial}}</td>
              <td>{{$machine->ip_range}}</td>
              <td>{{$machine->mac_address}}</td>
              <td>{{$machine->campu_name}}</td>
              @if($machine->EstadoPc == 'RENDIMIENTO OPTIMO')
              <td class="text-center"><span class="badge bg-success">{{$machine->EstadoPc}}</span></td>
              @endif
              @if($machine->EstadoPc == 'RENDIMIENTO BAJO')
              <td class="text-center"><span class="badge bg-warning">{{$machine->EstadoPc}}</span></td>
              @endif
              @if($machine->EstadoPc == 'HURTADO')
              <td class="text-center"><span class="badge bg-orange">{{$machine->EstadoPc}}</span></td>
              @endif
              @if($machine->EstadoPc == 'DADO DE BAJA')
              <td class="text-center"><span class="badge bg-secondary">{{$machine->EstadoPc}}</span></td>
              @endif
              @if($machine->EstadoPc == '')
              <td class="text-center"><span class="badge bg-info">NO REGISTRA ESTADO</span></td>
              @endif
              <td class="text-center inline">
                <button type="button" class="btn btn-primary btn-create-report" style="margin-right: 5px;"
                  onclick="window.location='{{ route('create.report.pc', [$machine->repoID, $machine->serial]) }}'">
                  <i class="fas fa-pen"></i> Crear reporte
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!-- /.table-responsive -->
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <ul class="pagination pagination-xl m-0 float-right">
          {{ $machines->links() }}
        </ul>
      </div>
      <!-- /.card-footer -->
    </div>
  </div>
</div>

@endsection