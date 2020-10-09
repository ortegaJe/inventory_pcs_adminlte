@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row">
    <!--type table-->
    <div class="col-md-5 mx-auto">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <div class="card-title text-center">
            <h2 style="font-weight: 700">Tipos de equipos</h2>
          </div>
          @include('type.typesModal')
          <div class="card-body pad">
            <table class="table table-hover table-bordered">
              <thead class="thead-light">
                <tr>
                  <th hidden scope="col">ID</th>
                  <th scope="col" class="text-center">
                    <i class="fas fa-desktop"></i>
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
                    <form action="{{ route('type.destroy', $type->id) }}" method="POST">
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