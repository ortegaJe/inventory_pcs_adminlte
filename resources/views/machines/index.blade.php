@extends('layouts.app')

@section('title', 'Lista de equipos')

@section('content')

<section class="content">

  <div class="container-fluid">
    <!--<h2>Lista de equipos registrados
      <a href="{{'machines/create'}}">
        <button type="button" class="btn bg-info float-right btn-sm">
          <i class="fa fa-plus"></i> Agregar equipo</button></a>-->
    </h2>
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
                    <th scope="col">IP</th>
                    <th scope="col">MAC</th>
                    <th scope="col"><img src="{{ asset('png/anydesk.png') }}" width="32px" height="32px"
                        alt="{{ asset('png/anydesk.png') }}">
                    </th>
                    <th scope="col">CAMPUS</th>
                    <th scope="col" width="100px">ACTIONS</th>
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
        ajax: "{{ route('machines.index')}}",
        columns: [
          { data: 'id', name: 'machines.id', visible: false },
          { data: 'name', name: 'types.name' },
          { data: 'ip_range', name: 'machines.ip_range' },
          { data: 'mac_address', name: 'machines.mac_address'},
          { data: 'anydesk', name: 'machines.anydesk'},
          { data: 'campu_name', name: 'campus.campu_name'},
          { data: 'action', orderable: false, searchable: false},
        ]
      });
    });
  </script>

  @endpush

  @endsection