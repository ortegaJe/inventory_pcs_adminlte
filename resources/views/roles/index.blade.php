@extends('adminlte::page')

@section('content')

<div class="container-fluid text-monospace">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <h2 style="font-weight: 700">Listado de Roles</h2>
      @include('roles.modal')
      <table class="table table-hover table-bordered text-center">
        <thead class="thead-dark">
          <tr>
            <th hidden scope="col">ID</th>
            <th scope="col">
              <i class="fas fa-users-cog"></i>
            </th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $role)
          <tr>
            <th hidden scope="row">{{ $role->id }}</th>
            <th>
              <h4>{{ $role->rol_name }}
            </th>
            </h4>
            <th>
              <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn bg-gradient-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
              </form>
            </th>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection