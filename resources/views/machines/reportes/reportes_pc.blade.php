@extends('adminlte::page')

@section('title', 'Reportes')

@section('content')

<div class="row">
  @include('machines.modal-choose-reports')
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
        <table class="table table-head-fixed table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>TYPE</th>
              <th>SERIAL</th>
              <th>IP</th>
              <th>MAC</th>
              <th>SEDE</th>
              <th class="text-center">GENERAR REPORTE</th>
            </tr>
          </thead>
          <tbody>
            @foreach($machines as $machine)
            <tr id="{{$machine->id}}">
              <td>{{$machine->id}}</td>
              <td>{{$machine->name}}</td>
              <td>{{$machine->serial}}</td>
              <td>{{$machine->ip_range}}</td>
              <td>{{$machine->mac_address}}</td>
              <td>{{$machine->campu_name}}</td>
              <td>
                <button type="button" class="btn btn-primary btn-block float-left btn-create-report"
                  style="margin-right: 5px;"
                  onclick="window.location='{{ route('createFormatReportPcById.data', $machine->id) }}'">
                  <i class="fas fa-pen"></i>
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

@section('js')
<script>
  function getIdMachine(id)
{
  $.get('reportes_pc/',+id, function(){
      $("#id").val(id);
      $("#serial").val(serial);
      $("#AddReports").modal("toggle");
  })
}
</script>
@endsection