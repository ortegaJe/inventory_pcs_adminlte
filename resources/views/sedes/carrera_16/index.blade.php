@extends('adminlte::page')

@section('title', 'Carrera 16')

@section('content')

<section class="content">
  <div class="container-fluid">
    @include('sedes/carrera_16.info_box')
    <!--datatable-->
    <div class="row">
      <div class="col-12">
        <div class="card card-info card-outline">
          <div class="card-header border">
            <?php $c16_campu = DB::table('campus')->get();?>
            <h3 class="card-title" style="font-weight: 500; font-size:28px">Lista de equipos |
              {{$c16_campu[2]->campu_name}}
            </h3>
            <a href="{{'carrera_16/create'}}">
              <button type="button" class="btn bg-info float-right btn-sm">
                <i class="fa fa-plus"></i> Agregar equipo</button>
            </a>

            <!--<div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
          </div>-->
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0" style="display: block;">
            <div class="table-responsive p-2">
              @include('sedes/carrera_16.table')
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
</section>

@endsection

@section('footer')
<!-- footer -->
<footer class="main-footer">
  <strong>Inventor Machines Project
    <div class="float-left d-none d-sm-inline-block" style="margin-right: 0.2em">
      <a href="https://laravel.com/" target="_blank" rel="noopener noreferrer"><img
          src="{{ asset('dist/img/svg/laravel.svg') }}" alt="larevel-icon" width="25px"></a>
    </div>
    <div class="float-left d-none d-sm-inline-block" style="margin-right: 0.2em">
      <a href="https://github.com/ortegaJe/laravelnventor" target="_blank" rel="noopener noreferrer"><img
          src="{{ asset('dist/img/svg/github-icon.svg') }}" alt="" width="25px"></a>
    </div>

    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.2
    </div>
</footer>
@endsection