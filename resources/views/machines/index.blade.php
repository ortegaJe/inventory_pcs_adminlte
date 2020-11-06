@extends('adminlte::page')

@section('title', 'Lista de equipos')

@section('content')

<section class="content-fluid">

  <div class="content-header">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-danger elevation-1"><img src="{{asset('/svg/noun_raspberry.svg')}}"
              alt="atril.svg" width="50"></span>
          <div class="info-box-content">
            <span class="info-box-text">TV RASPERRY PI</span>
            <?php $berry_count = DB::table('machines')->where('type_id', '=', [4])->count(); ?>
            <span class="info-box-number">
              {{ $berry_count ?? '0' }}
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-info elevation-1"><img src="{{asset('/svg/atril.svg')}}" alt="atril.svg"
              width="50"></span>

          <div class="info-box-content">
            <span class="info-box-text">ATRIL</span>
            <?php $atril_count = DB::table('machines')->where('type_id', '=', [2])->count(); ?>
            <span class="info-box-number">{{ $atril_count ?? '0' }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-desktop"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">PC</span>
            <?php $pc_count = DB::table('machines')->where('type_id', '=', [1])->count(); ?>
            <span class="info-box-number">{{ $pc_count ?? '0' }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><img src="{{asset('/svg/laptop-solid.svg')}}"
              alt="atril.svg" width="42"></span>

          <div class="info-box-content">
            <span class="info-box-text">LAPTOP</span>
            <?php $laptop_count = DB::table('machines')->where('type_id', '=', [3])->count(); ?>
            <span class="info-box-number">{{ $laptop_count ?? '0' }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary card-outline">
          <div class="card-header border">
            <h3 class="card-title" style="font-weight: 500; font-size:28px">Lista de equipos registrados
            </h3>
            <a href="{{'machines/create'}}">
              <button type="button" class="btn bg-info float-right btn-sm">
                <i class="fa fa-plus"></i> Agregar equipo</button>
            </a>

            <div class="card-tools">
              <!--<button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>-->
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0" style="display: block;">
            <div class="table-responsive p-2">
              <table class="table table-sm table-bordered table-hover text-center" id="data-table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">TYPE</th>
                    <th scope="col">SERIAL</th>
                    <th scope="col">MANUFACTURER</th>
                    <th scope="col">MODEL</th>
                    <th scope="col">CPU</th>
                    <th scope="col">IP</th>
                    <th scope="col">MAC</th>
                    <th scope="col"><span class="img-fluid"><img
                          src="https://anydesk.com/_static/img/favicon/anydesk_icon.png" width="32px" height="32px"
                          alt="{{ asset('png/anydesk.png') }}"></span>
                    </th>
                    <th scope="col"><span class="img-fluid"><img
                          src="https://www.flaticon.com/svg/static/icons/svg/732/732225.svg" width="32px" height="32px"
                          alt="os_windows.svg"></span>
                    </th>
                    <th scope="col">CAMPUS</th>
                    <th scope="col">LOCATION</th>
                    <th scope="col">COMMENT</th>
                    <th scope="col">ACTIONS</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>

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

@section('js')
<script>
  $(function (){
      var table = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        //responsive: true,
        autoWidth: true,
        lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
        ajax: "{{ route('machines.index')}}",
        columns: [
          { data: 'id', name: 'machines.id', visible: false },
          { data: 'name', name: 'types.name', orderable: true, searchable: true },
          { data: 'serial', name: 'serial', visible: false, orderable: true, searchable: true},
          { data: 'manufacturer', name: 'manufacturer', orderable: true, searchable: true},
          { data: 'model', name: 'model', orderable: true, searchable: true},
          { data: 'cpu', name: 'cpu', visible: false, orderable: true, searchable: true},
          { data: 'ip_range', name: 'machines.ip_range', orderable: true, searchable: true },
          { data: 'mac_address', name: 'machines.mac_address', orderable: true, searchable: true},
          { data: 'anydesk', name: 'machines.anydesk', orderable: true, searchable: true},
          { data: 'os', name: 'os', visible: true, orderable: true, searchable: true},
          { data: 'campu_name', name: 'campus.campu_name', orderable: true, searchable: true},
          { data: 'location', name: 'location', visible: false, orderable: true, searchable: true},
          { data: 'comment', name: 'comment', visible: false, orderable: true, searchable: true},
          { data: 'action', orderable: false, searchable: false},
        ]
      });
    });
</script>
@stop

@endsection