@extends('adminlte::page')

@section('title', 'Sura San Jose')

@section('content')

<section class="content-fluid">

  <div class="content-header">

    @include('/sedes/sura_san_jose.info_box')
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-warning card-outline">
          <div class="card-header border">
            <?php $ssj_campu = DB::table('campus')->get();?>
            <h3 class="card-title" style="font-weight: 500; font-size:28px">Lista de equipos |
              {{$ssj_campu[4]->campu_name}}
            </h3>
            <a href="{{'sura_san_jose/create'}}">
              <button type="button" class="btn bg-warning float-right btn-sm">
                <i class="fa fa-plus"></i> Agregar equipo</button>
            </a>
            <div class="card-tools">
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0" style="display: block;">
            <div class="table-responsive p-2">
              @include('/sedes/sura_san_jose.table')
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