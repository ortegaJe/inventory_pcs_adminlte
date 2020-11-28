@extends('adminlte::page')

@section('title', 'Hardware')

@section('content')

<div class="container-fluid">
  <div class="row">
    <!--type table-->
    <div class="col-md-6">
      <div class="card card-primary card-outline">
        <div class="card-header border-transparent">
          <h3 class="card-title">Tipos de equipos</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0" style="display: block;">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
                <tr>
                  <th scope="col" class="text-center">
                    <i class="fas fa-desktop"></i>
                  </th>
                  <th scope="col" class="text-center">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  @foreach ($types as $type)
                <tr>
                  <th>
                    <h6>{{ $type->name }}
                  </th>
                  </h6>
                  <th class="text-center">
                    <form action="" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm btn-sm"><i
                          class="fas fa-trash-alt"></i></button>
                    </form>
                  </th>
                </tr>
                @endforeach
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
            {{ $types->appends(['hdds' => $hdds->currentPage(1)])->links() }}
          </ul>
        </div>
        <!-- /.card-footer -->
      </div>
    </div>
    <!--end type table-->
    <!--os table-->
    <div class="col-md-6 mx-auto">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <div class="card-title">
            <h2 style="font-weight: 700">Sistemas Operativos</h2>
          </div>
          <div class="card-body pad">
            <table class="table table-hover table-bordered">
              <thead class="thead-light">
                <tr>
                  <th hidden scope="col">ID</th>
                  <th scope="col" class="text-center">
                    <i class="fab fa-windows"></i>
                  </th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>
                    <h6>
                  </th>
                  </h6>
                  <th>
                    <form action="" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="reset" class="btn btn-danger btn-sm btn-sm"><i
                          class="fas fa-trash-alt"></i></button>
                    </form>
                  </th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
    <!--end os table-->
    <!--ram table-->
    <div class="col-md-6">
      <div class="card card-primary card-outline">
        <div class="card-header border-transparent">
          <h3 class="card-title"><i class="fas fa-memory"></i> RAM memory</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0" style="display: block;">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
                <tr>
                  <th scope="col">
                  </th>
                  <th>size</th>
                  <th>standart</th>
                  <th>type</th>
                  <th>mhz</th>
                  <th scope="col" class="text-center">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  @foreach ($rams as $ram)
                <tr>
                  <th>
                    <h6>{{ $ram->ram }}
                  </th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  </h6>
                  <th class="text-center">
                    <form action="" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm btn-sm"><i
                          class="fas fa-trash-alt"></i></button>
                    </form>
                  </th>
                </tr>
                @endforeach
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
            {{ $rams->appends(['hdds' => $hdds->currentPage()])->links() }}
          </ul>
        </div>
        <!-- /.card-footer -->
      </div>
    </div>
    <!--end ram table-->
    <!--hhd table-->
    <div class="col-md-6">
      <div class="card card-primary card-outline">
        <div class="card-header border-transparent">
          <h3 class="card-title"><i class="fas fa-hdd"></i> Hard Drive</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0" style="display: block;">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
                <tr>
                  <th scope="col">Size</th>
                  <th scope="col">type</th>
                  <th scope="col" class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  @foreach ($hdds as $hdd)
                <tr>
                  <th>
                    <h6>{{ $hdd->size }}</h6>
                  </th>
                  <th>
                    <h6>{{$hdd->type}}</h6>
                  </th>
                  <th class="text-center">
                    <form action="" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    </form>
                  </th>
                </tr>
                @endforeach
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
            {{ $hdds->appends(['rams' => $rams->currentPage()])->links() }}
          </ul>
        </div>
        <!-- /.card-footer -->
      </div>
    </div>
    <!--end hdd table-->
  </div>
</div>

@endsection

@include('machines.footer')