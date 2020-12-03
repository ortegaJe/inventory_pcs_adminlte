@extends('adminlte::page')

@section('title', 'Cienaga')

@section('content')

<section class="content-fluid">

  <div class="content-header">
    @include('/sedes/cienaga.info_box')
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-navy card-outline">
          <div class="card-header border">
            <h3 class="card-title" style="font-weight: 500; font-size:28px">Lista de equipos |
              {{$name_campu_table_index[10]->campu_name}}
            </h3>
            <a href="/santa_marta/sedes/cienaga/create">
              <button type="button" class="btn bg-navy float-right btn-sm">
                <i class="fa fa-plus"></i> Agregar equipo</button>
            </a>
            <div class="card-tools">
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0" style="display: block;">
            <div class="table-responsive p-2">
              @include('/sedes/cienaga.table')
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