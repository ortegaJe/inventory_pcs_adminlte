@extends('adminlte::page')

@section('title', 'Generar reporte')

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card card-primary card-outline">
      <div class="card-header border-0">
        <h3 class="card-title" style="font-weight: 500; font-size:28px">{{$name_reports[0]->code_report}} -
          {{$name_reports[0]->name}}
        </h3>
        <button type="button" class="btn btn-primary btn-create-report ml-3" style="margin-right: 5px;"
          data-toggle="modal" data-target="#AddCancelReport">
          <i class="fas fa-plus"></i> Nuevo
        </button>
        @include('machines.reportes.9000_report.modal-create')
        <div class="card-tools">
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table id="repoTable" class="table table-head-fixed table-hover text-nowrap">
          <thead>
            <tr>
              <th>FECHA DE CREACIÓN</th>
              <th>REPORTE</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            @foreach($repos_cancel as $repo_cancel)
            <tr>
              <td class="text-muted">{{ \Carbon\Carbon::parse($repo_cancel->FechaCreacion)->format('d-m-Y h:i:s A') }}
              </td>
              <td>
                <a href="{{ route('generated.report.pc', [$repo_cancel->BajaRepoID, $repo_cancel->NombreRepo900, $repo_cancel->Serial ])}}"
                  target="_blank" class="btn-link text-secondary">
                  <i class="far fa-fw fa-file-pdf text-danger"></i>
                  {{$repo_cancel->NameRepoID = 'FORMATO INFORME TECNICO DE EQUIPOS'}}-{{ $repo_cancel->Serial}}.pdf
                </a>
              </td>
              <td>
                <button type="button" class="btn btn-success btn-update-report" data-toggle="modal"
                  data-target="#UpCancelReport">
                  <i class="fas fa-edit"></i> Editar
                </button>
                {{--@include('machines.reportes.9000_report.modal-update')--}}
              </td>
            </tr>
            @endforeach
        </table>
        <!-- /.table-responsive -->
      </div>
      <!-- /.card-body -->
      <div class=" card-footer clearfix">
        <ul class="pagination pagination-xl m-0 float-right">
          {{ $repos_cancel->links() }}
        </ul>
      </div>
      <!-- /.card-footer -->
    </div>
  </div>

  <div class="col-sm-12">
    <div class="card card-primary card-outline">
      <div class="card-header border-0">
        <h3 class="card-title" style="font-weight: 500; font-size:28px">{{$name_reports[1]->code_report}} -
          {{$name_reports[1]->name}}
        </h3>
        <button type="button" class="btn btn-primary btn-create-report ml-3" style="margin-right: 5px;"
          data-toggle="modal" data-target="#AddDeliveryReport">
          <i class="fas fa-plus"></i> Nuevo
        </button>
        @include('machines.reportes.9001_report.modal-create')
        <div class="card-tools">
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table id="repoTable" class="table table-head-fixed table-hover text-nowrap">
          <thead>
            <tr>
              <th>FECHA DE CREACIÓN</th>
              <th>REPORTE</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            @foreach($delivery_repos as $delivery_repo)
            <tr>
              <td class="text-muted">{{ \Carbon\Carbon::parse($delivery_repo->FechaCreacion)->format('d-m-Y h:i:s A') }}
              </td>
              <td>
                <a href="{{ route('generated.report.acta.entrega.pc', $delivery_repo->DeliveryRepoID)}}" target="_blank"
                  class="btn-link text-secondary">
                  <i class="far fa-fw fa-file-pdf text-danger"></i>
                  {{$repo_cancel->NameRepoID = 'ACTA DE ENTREGA DE EQUIPOS COMPUTACIONALES'}}-{{ $delivery_repo->Serial}}.pdf
                </a>
              </td>
              <td>
                <button type="button" class="btn btn-success btn-update-report" data-toggle="modal"
                  data-target="#UpCancelReport">
                  <i class="fas fa-edit"></i> Editar
                </button>
                {{--@include('machines.reportes.9000_report.modal-update')--}}
              </td>
            </tr>
            @endforeach
        </table>
        <!-- /.table-responsive -->
      </div>
      <!-- /.card-body -->
      <div class=" card-footer clearfix">
        <ul class="pagination pagination-xl m-0 float-right">
          {{ $delivery_repos->links() }}
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
</div>

@endsection

@push('js')
<script>
  $('.alert').slideDown();
  setTimeout(function(){ $('.alert').slideUp(); }, 10000);
</script>

@if(Session::has('report_created'))
<script>
  Swal.fire(
'Creado con Exito!',
'{!! Session::get('report_created') !!}',
'success'
)
</script>
@endif

<script>
  $(document).ready(function(){
    @if($message = Session::get('message'))
    $('#AddCancelReport').modal('show');
    @endif
  })
</script>
@endpush