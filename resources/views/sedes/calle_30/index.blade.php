@extends('adminlte::page')

@section('title', 'Calle 30')

@section('content')

<section class="content">
  <div class="container-fluid">
    @include('sedes/calle_30.info_box')
    <!--datatable-->
    <div class="row">
      <div class="col-12">
        <div class="card card-primary card-outline">
          <div class="card-header border">
            <?php $c30_campu = DB::table('campus')->get();?>
            <h3 class="card-title" style="font-weight: 500; font-size:28px">Lista de equipos |
              {{$c30_campu[1]->campu_name}}
            </h3>
            <a href="{{'calle_30/create'}}">
              <button type="button" class="btn bg-primary float-right btn-sm">
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
              @include('sedes/calle_30.table')
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

@include('machines.footer')