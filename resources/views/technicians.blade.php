@extends('layouts.app')

@section('content')

<div class="container-fluid">
<table class="table table-bordered text-center">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PASSWORD</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($users as $user)
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->password }}</td>
    </tr>
      @endforeach
  </tbody>
</table>
</div>
    
@endsection