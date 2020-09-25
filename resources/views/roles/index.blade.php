@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <h2 style="font-weight: 700">Roles</h2>
      @include('roles.modal')
      <table class="table table-hover table-bordered text-center">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">ROLES</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $role)
          <tr>
            <th scope="row">{{ $role->id }}</th>
            <th>{{ $role->name }}</th>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection