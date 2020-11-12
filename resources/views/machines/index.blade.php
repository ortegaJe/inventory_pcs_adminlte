@extends('adminlte::page')

@section('title', 'Lista de equipos')

@section('content')

<section class="content">
  <div class="container-fluid">
    @include('machines.info_box')
    <!--datatable-->
    <div class="row">
      <div class="col-12">
        <div class="card card-primary card-outline">
          <div class="card-header border">
            <h3 class="card-title" style="font-weight: 500; font-size:28px">Lista de equipos registrados
            </h3>
            <a href="{{'machines/create'}}">
              <button type="button" class="btn bg-info float-left btn-sm ml-2">
                <i class="fa fa-plus"></i> Agregar equipo</button>
            </a>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
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
      <div class="col-md-6">
        <div class="card card-danger">
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

@push('js')
<!--<script>
  $(document).ready(function(){
    $.ajax({
    url: {{ url('machines.charts')}},
    method: 'POST',
    data:{
      id:1
      _token:$('input[name="_token"]').val();
    }
  }).done(function(res){
    alert(res);
  });
});
</script>-->
@endpush