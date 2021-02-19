@extends('adminlte::page')

@section('title', 'Realizar reporte')

@section('content')

<div class="col-12">
  <div class="card card-primary card-outline">
    <div class="card-header border-0">
      <h3 class="card-title" style="font-weight: 500; font-size:28px">{{$name_reports[0]->code_report}} -
        {{$name_reports[0]->name}}
      </h3>
      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

          <div class="input-group-append">
            <button type="submit" class="btn btn-default">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <table class="table table-head-fixed table-hover text-nowrap">
        <thead>
          <tr>
            <th>ID</th>
            <th>TYPE</th>
            <th>SERIAL</th>
            <th>IP</th>
            <th>MAC</th>
            <th>SEDE</th>
            <th>ESTADO</th>
            <th>REPORTE</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach($machines as $machine)
            <td>{{$machine->id}}</td>
            <td>{{$machine->name}}</td>
            <td>{{$machine->serial}}</td>
            <td>{{$machine->ip_range}}</td>
            <td>{{$machine->mac_address}}</td>
            <td>{{$machine->campu_name}}</td>
            <td>{{$machine->description}}</td>
            <td>
              <button type="button" class="btn btn-primary float-left btn-create-report" style="margin-right: 5px;"
                onclick="window.location=" data-toggle="modal" data-target="#AddCancelReport">
                <i class="fas fa-file-alt"></i> Generar
              </button>
              <a href="{{ route('cancelFormatReportsPcById.data', $machine->id) }}" class="btn-link text-secondary"><i
                  class="far fa-fw fa-file-pdf"></i>
                INFORME TECNICO PARA BAJA ACTIVOS FIJOS.pdf
              </a>
            </td>
            @endforeach
          </tr>
      </table>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <ul class="pagination pagination-xl m-0 float-right">
      </ul>
    </div>
    <!-- /.card-footer -->
  </div>

  <div class="col-12">
    <div class="card card-primary card-outline">
      <div class="card-header border-0">
        <h3 class="card-title" style="font-weight: 500; font-size:28px">{{$name_reports[1]->code_report}} -
          {{$name_reports[1]->name}}
        </h3>
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-head-fixed table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>TYPE</th>
              <th>SERIAL</th>
              <th>IP</th>
              <th>MAC</th>
              <th>SEDE</th>
              <th>ESTADO</th>
              <th>REPORTE</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach($machines as $machine)
              <td>{{$machine->id}}</td>
              <td>{{$machine->name}}</td>
              <td>{{$machine->serial}}</td>
              <td>{{$machine->ip_range}}</td>
              <td>{{$machine->mac_address}}</td>
              <td>{{$machine->campu_name}}</td>
              <td>{{$machine->description}}</td>
              <td>
                <button type="button" class="btn btn-primary float-left btn-create-report" style="margin-right: 5px;"
                  onclick="window.location=">
                  <i class="fas fa-file-alt"></i> Generar
                </button>
                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i>
                  UAT.pdf
                </a>
                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i>
                  UAT.pdf
                </a>
              </td>
              @endforeach
            </tr>
          </tbody>
        </table>
        <!-- /.table-responsive -->
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <ul class="pagination pagination-xl m-0 float-right">
        </ul>
      </div>
      <!-- /.card-footer -->
    </div>

    <div class="col-12">
      <div class="card card-primary card-outline">
        <div class="card-header border-0">
          <h3 class="card-title" style="font-weight: 500; font-size:28px">{{$name_reports[2]->code_report}} -
            {{$name_reports[2]->name}}
          </h3>
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-head-fixed table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>TYPE</th>
                <th>SERIAL</th>
                <th>IP</th>
                <th>MAC</th>
                <th>SEDE</th>
                <th>ESTADO</th>
                <th>REPORTE</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach($machines as $machine)
                <td>{{$machine->id}}</td>
                <td>{{$machine->name}}</td>
                <td>{{$machine->serial}}</td>
                <td>{{$machine->ip_range}}</td>
                <td>{{$machine->mac_address}}</td>
                <td>{{$machine->campu_name}}</td>
                <td>{{$machine->description}}</td>
                <td>
                  <button type="button" class="btn btn-primary float-left btn-create-report" style="margin-right: 5px;"
                    onclick="window.location=">
                    <i class="fas fa-file-alt"></i> Generar
                  </button>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i>
                    UAT.pdf
                  </a>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i>
                    UAT.pdf
                  </a>
                </td>
                @endforeach
              </tr>
            </tbody>
          </table>
          <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <ul class="pagination pagination-xl m-0 float-right">
          </ul>
        </div>
        <!-- /.card-footer -->
      </div>
    </div>

    @include('machines.reportes.modal-create')

    @endsection

    @push('js')

    <script>
      $('.alert').slideDown();
setTimeout(function(){ $('.alert').slideUp(); }, 10000);
    </script>

    @endpush