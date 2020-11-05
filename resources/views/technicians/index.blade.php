@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content')
<div class="container-fluid">
  <h2 style="font-weight: 700">Listado de Usuarios</h2>
  @include('technicians.create')
  <table id="datatable-technicians" class="table table-responsive table-hover table-bordered text-center">
    <thead class="thead-dark">
      <tr>
        <th scope="col">IDENTIFICATION</th>
        <th scope="col">AVATAR</th>
        <th scope="col">NICKNAME</th>
        <th scope="col">EMAIL</th>
        <!--<th scope="col">PHONE</th>-->
        <th scope="col">WORK FUNCTION</th>
        <th scope="col">ROL</th>
        <th scope="col">CAMPUS</th>
        <th scope="" style="width: 12%">ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->cc }}</td>
        <td><img class="img-circle img-fluid elevation-2 img-size-64" src=" {{ asset('upload/'.$user->image) }}"
            alt="{{ $user->image }}">
          <div class="float-right">{{ $user->name }}</div>
        </td>
        <td>{{ $user->nick_name }}</td>
        <td>{{ $user->email }}</td>
        <!--<td>{{ $user->phone }}</td>-->
        <td>{{ $user->work_function }}</td>
        <td><span class="badge badge-success">
            @foreach( $user->roles as $role)<div><i class="fas fa-building"></i>
              {{ $role->name }}</div><br> @endforeach
          </span></td>
        <td>
          @foreach ($campus as $campu)
          @if($campu->id == $user->campus_id)
          {{ $campu->name }}
          @endif
          @endforeach
        </td>
        <td>
          <form action="{{ route('technicians.destroy', $user->id) }}" method="POST">
            <a href="{{ route('technicians.show', $user->id) }}"><button type="button"
                class="btn bg-gradient-secondary btn-sm"><i class="fas fa-eye"></i></button></a>
            <a href="{{ route('technicians.edit', $user->id) }}"><button type="button"
                class="btn bg-gradient-success btn-sm"><i class="fas fa-edit"></i></button></a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn bg-gradient-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection