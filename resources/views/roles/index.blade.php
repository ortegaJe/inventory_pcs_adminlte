@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2>Roles de Tecnicos</h2>
  <table class="table table-bordered text-center">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">ROLE</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($roles as $role)
      <tr>
        <th scope="row">{{ $role->id }}</th>
        <th>{{ role->name }}</th>
        <td>
          <form action="{{ route('technicians.destroy', $user->id) }}" method="POST">
            <a href=""><button type="button" class="btn bg-gradient-secondary btn-xs"><i
                  class="fas fa-eye"></i></button></a>
            <a href=""><button type="button" class="btn bg-gradient-success btn-xs"><i
                  class="fas fa-edit"></i></button></a>
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