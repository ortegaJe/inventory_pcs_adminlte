@extends('layouts.app')

@section('title', 'Sede Carrera 16')

@section('content')

<section class="content">

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary card-outline">
          <div class="card-header border">
            <?php $c16_campu = DB::table('campus')->get();?>
            <h3 class="card-title" style="font-weight: 500; font-size:28px">Lista de equipos |
              {{$c16_campu[2]->campu_name}}
            </h3>
            <a href="{{'carrera_16/create'}}">
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
                    <th scope="col"><img src="{{ asset('png/anydesk.png') }}" width="32px" height="32px"
                        alt="{{ asset('png/anydesk.png') }}">
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

  @push('scripts')
  <script>
    $(function (){
      var table = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        //responsive: true,
        autoWidth: true,
        lengthMenu: [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
        ajax: "{{ route('carrera_16.index')}}",
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
          { data: 'action', orderable: false, searchable: false},        ]
      });
    });
  </script>

  @endpush

  @endsection