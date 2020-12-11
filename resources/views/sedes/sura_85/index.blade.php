@extends('adminlte::page')

@section('title', 'Sura 85')

@section('content')

<section class="content-fluid">

  <div class="content-header">
    @include('/sedes/sura_85.info_box')
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-danger card-outline">
          <div class="card-header border">
            <h3 class="card-title" style="font-weight: 500; font-size:28px">Lista de equipos |
              {{$name_campu_table_index[5]->campu_name}}
            </h3>
            <a href="{{'sura_85/create'}}">
              <button type="button" class="btn bg-danger float-left btn-sm ml-2">
                <i class="fa fa-plus"></i> Agregar equipo</button>
            </a>
            <div class="card-tools">
              <a href="{{ url('/sura_85/export_excel') }}">
                <button type="button" class="btn btn-tool" title="Exportar Excel">
                  <i class="fas fa-file-excel"></i></button>
              </a>
              <a href="{{ url('/sura_85/export_pdf') }}">
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
              @include('/sedes/sura_85.table')
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
  </div>

  @endsection

  @include('machines.footer')