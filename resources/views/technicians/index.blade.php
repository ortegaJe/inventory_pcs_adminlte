@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div style="padding-bottom: 4%"><a href="technicians/create"><button type="button" class="btn bg-gradient-primary btn-lg float-left" style="color: aliceblue">Agregar</button></a></div>
<table class="table table-bordered text-center">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">NICKNAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE</th>
      <th scope="col">WORK FUNCTION</th>
      <th scope="col">CAMPUS</th>
      <th scope="col">PASSWORD</th>
      <th scope="col">ACTIONS</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($users as $user)
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->nick_name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->phone }}</td>
      <td>{{ $user->pos_job }}</td>
      <td>{{ $user->campus }}</td>
      <td>{{ $user->password }}</td>
      <td>
          <form action="{{ route('technicians.destroy', $user->id) }}" method="POST">
            <a href=""><button type="button" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-eye"></i></button></a>
            <a href=""><button type="button" class="btn bg-gradient-success btn-xs"><i class="fas fa-edit"></i></button></a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn bg-gradient-danger btn-xs"><i class="fas fa-trash-alt"></i></button>
          </form>
      </td>
    </tr>
      @endforeach
  </tbody>
</table>
</div>
    
@endsection