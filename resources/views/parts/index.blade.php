@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row">
    <!--type table-->
    <div class="col-md-4 mx-auto">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <div class="card-title text-center">
            <h2 style="font-weight: 700">Tipos de equipos</h2>
          </div>
          @include('roles.modal')
          <div class="card-body pad">
            <table class="table table-hover table-bordered">
              <thead class="thead-light">
                <tr>
                  <th hidden scope="col">ID</th>
                  <th scope="col" class="text-center">
                    <i class="fas fa-users-cog"></i>
                  </th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($types as $type)
                <tr>
                  <th>
                    <h6>{{ $type->name }}
                  </th>
                  </h6>
                  <th>
                    <form action="" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn bg-gradient-danger btn-sm"><i
                          class="fas fa-trash-alt"></i></button>
                    </form>
                  </th>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
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
                      <button type="reset" class="btn bg-gradient-danger btn-sm"><i
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
    <!--ram table-->
    <div class="col-md-6 mx-auto">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <div class="card-title">
            <h2 style="font-weight: 700">Memorias RAM</h2>
          </div>
          @include('parts.ramsModal')
          <div class="card-body pad">
            <table class="table table-hover table-bordered">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="text-center">
                    <i class="fas fa-memory"></i>
                  </th>
                  <th scope="col">Size</th>
                  <th scope="col">Type</th>
                  <th scope="col">MHz</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($rams as $ram)
                <tr>
                  <th>
                    <h6>{{ $ram->ram }}
                  </th>
                  <th>
                    <h6>
                  </th>
                  <th>
                    <h6>
                  </th>
                  <th>
                    <h6>
                  </th>
                  </h6>
                  <th>
                    <form action="" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn bg-gradient-danger btn-sm"><i
                          class="fas fa-trash-alt"></i></button>
                    </form>
                  </th>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
    <!--hhd table-->
    <div class="col-md-6 mx-auto">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <div class="card-title text-center">
            <h2 style="font-weight: 700">Discos Duros</h2>
          </div>
          @include('roles.modal')
          <div class="card-body pad">
            <table class="table table-hover table-bordered">
              <thead class="thead-light">
                <tr>
                  <th hidden scope="col">ID</th>
                  <th scope="col" class="text-center">
                    <i class="fas fa-hdd"></i>
                  </th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($types as $type)
                <tr>
                  <th>
                    <h6>{{ $type->name }}
                  </th>
                  </h6>
                  <th>
                    <form action="" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn bg-gradient-danger btn-sm"><i
                          class="fas fa-trash-alt"></i></button>
                    </form>
                  </th>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection