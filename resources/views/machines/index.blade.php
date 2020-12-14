@extends('adminlte::page')

@section('title', 'Lista de equipos')

@section('content')
<div class="content-header">
  @include('machines.info_box')
</div>
<div class="row">
  <div class="col-12">
    <div class="card card-primary card-outline">
      <div class="card-header border">
        <h3 class="card-title" style="font-weight: 500; font-size:28px">Lista de equipos registrados
        </h3>
        <a href="{{'machines/create'}}">
          <button type="button" class="btn bg-primary float-left btn-sm ml-2">
            <i class="fa fa-plus"></i> Agregar equipo</button>
        </a>
        <div class="card-tools">
          <a href="{{ url('/inventor/export_excel') }}">
            <button type="button" class="btn btn-tool" title="Exportar Excel">
              <i class="fas fa-file-excel"></i></button>
          </a>
          <a href="{{ url('/inventor/export_pdf') }}">
            <button type="button" class="btn btn-tool" title="Exportar PDF">
              <i class="fas fa-file-pdf"></i></button>
          </a>
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-bars"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0" style="display: block;">
        <div class="table-responsive p-2">
          @include('machines.table')
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">

      </div>
      <!-- /.card-footer -->
    </div>
  </div>
</div>
<!--charts-->
<div class="row">
  <div class="col-md-10">
    <div class="card card-maroon card-outline">
      <div class="card-header border">
        <h3 class="card-title" style="font-weight: 500; font-size:28px">Informes
        </h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0" style="display: block;">
        <div>
          @include('machines.charts_info')
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">

      </div>
      <!-- /.card-footer -->
    </div>
  </div>
  <div class="col-md-2">
    <div class="card card-indigo card-outline">
      <div class="card-header border">
        <h3 class="card-title" style="font-weight: 500; font-size:28px">Datos
        </h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0" style="display: block;">
        <div>
          @include('machines.info_box_mini')
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>

@endsection

@include('machines.footer')

@push('js')

<script>
  $('.alert').slideDown();
    setTimeout(function(){ $('.alert').slideUp(); }, 10000);
</script>

@if(Session::has('machine_created'))
<script>
  Swal.fire(
'Creado con Exito!',
'{!! Session::get('machine_created') !!}',
'success'
)
</script>
@endif

@if(Session::has('machine_update'))
<script>
  Swal.fire(
  'Actualizado con Exito!',
  '{!! Session::get('machine_update') !!}',
  'success'
  )
</script>
@endif

@if(Session::has('machine_deleted'))
<script>
  Swal.fire(
'Eliminado con Exito!',
'{!! Session::get('machine_deleted') !!}',
'warning'

)
</script>
@endif

@endpush