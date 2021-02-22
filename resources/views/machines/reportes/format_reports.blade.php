@extends('adminlte::page')

@section('title', 'Realizar reporte')

@section('content')

<div class="col-12">
  <div class="card card-primary card-outline">
    <div class="card-header border-0">
      <h3 class="card-title" style="font-weight: 500; font-size:28px">{{$name_reports[0]->code_report}} -
        {{$name_reports[0]->name}}
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
    <div class="card-body table-responsive p-0">
      <table class="table table-head-fixed table-hover table-bordered text-nowrap">
        <thead>
          <tr>
            <th>REPORTE</th>
            <th>FECHA DE CREACIÓN</th>
            <th>ACCIONES</th>
          </tr>
        </thead>
        <tbody>
          @foreach($machines as $machine)
          <tr>
            <td>
              <a href="{{ route('cancelFormatReportsPcById.data', $machine->machine_id) }}"
                class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i>
                INFORME TECNICO PARA BAJA ACTIVOS FIJOS - {{ $machine->serial }}.pdf
              </a>
            </td>
            <td></td>
            <td>
              <button type="button" class="btn btn-primary float-left btn-create-report ml-2" style="margin-right: 5px;"
                data-toggle="modal" data-target="#AddCancelReport">
                <i class="fas fa-file-alt"></i> Generar reporte
              </button>
              <button type="button" class="btn btn-success float-left btn-create-report" style="margin-right: 5px;"
                data-toggle="modal" data-target="#AddCancelReport">
                <i class="fas fa-file-alt"></i> Editar
              </button>
            </td>
          </tr>
          @endforeach
      </table>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class=" card-footer clearfix">
      <ul class="pagination pagination-xl m-0 float-right">
      </ul>
    </div>
    <!-- /.card-footer -->
  </div>
</div>

<div class="col-12">
  <div class="card card-primary card-outline">
    <div class="card-header border-0">
      <h3 class="card-title" style="font-weight: 500; font-size:28px">{{$name_reports[1]->code_report}} -
        {{$name_reports[1]->name}}
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
    <div class="card-body table-responsive p-0">
      <table class="table table-head-fixed table-hover text-nowrap">
        <thead>
          <tr>
            <th>REPORTE</th>
            <th>FECHA DE CREACIÓN</th>
            <th>ACCIONES</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i>
                ACTA DE ENTREGA DE EQUIPOS COMPUTACIONALES.pdf
              </a>
            </td>
            <td></td>
            <td>
              <button type="button" class="btn btn-primary float-left btn-create-report" style="margin-right: 5px;"
                onclick="window.location=" data-toggle="modal" data-target="#AddCancelReport">
                <i class="fas fa-file-alt"></i> Generar
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <ul class="pagination pagination-xl m-0 float-right">
      </ul>
    </div>
    <!-- /.card-footer -->
  </div>
</div>

<div class="col-12">
  <div class="card card-primary card-outline">
    <div class="card-header border-0">
      <h3 class="card-title" style="font-weight: 500; font-size:28px">{{$name_reports[2]->code_report}} -
        {{$name_reports[2]->name}}
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
    <div class="card-body table-responsive p-0">
      <table class="table table-head-fixed table-hover text-nowrap">
        <thead>
          <tr>
            <th>REPORTE</th>
            <th>FECHA DE CREACIÓN</th>
            <th>ACCIONES</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i>
                HOJA DE VIDA DE EQUIPOS DE CÓMPUTO.pdf
              </a>
            </td>
            <td></td>
            <td>
              <button type="button" class="btn btn-primary float-left btn-create-report" style="margin-right: 5px;"
                onclick="window.location=" data-toggle="modal" data-target="#AddCancelReport">
                <i class="fas fa-file-alt"></i> Generar
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <ul class="pagination pagination-xl m-0 float-right">
      </ul>
    </div>
    <!-- /.card-footer -->
  </div>
</div>

@include('machines.reportes.modal-create')

@endsection

@push('js')

<script>
  $('.alert').slideDown();
setTimeout(function(){ $('.alert').slideUp(); }, 10000);
</script>

@endpush