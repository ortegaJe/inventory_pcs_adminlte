@extends('layouts.app')

@section('content')

<section class="content">
  @yield('table_machines')

  <div class="container-fluid">
    <div style="padding-bottom: 4%"><a href="machines/create"><button type="button"
          class="btn bg-info float-left btn-sm">
          <i class="fa fa-plus"></i> Agregar equipo</button></a></div>
    <table class="table table-hover table-bordered text-center">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">TYPE</th>
          <th scope="col">IP</th>
          <th scope="col">MAC</th>
          <th scope="col"><img src="{{ asset('png/anydesk.png') }}" width="32px" height="32px"
              alt="{{ asset('png/anydesk.png') }}">
          </th>
          <th scope="col">CAMPUS</th>
          <th scope="col">ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($machines as $machine)
        <tr>
          <th scope="row">{{ $machine->id }}</th>
          <td>
            @foreach ($types as $type)
            @if($type->id == $machine->type_id)
            {{ $type->name }}
            @endif
            @endforeach
          </td>
          <td>{{ $machine->ip_range }}</td>
          <td>{{ $machine->mac_address }}</td>
          <td>{{ $machine->anydesk }}</td>
          <td>
            @foreach ($campus as $campu)
            @if($campu->id == $machine->campus_id)
            {{ $campu->name }}
            @endif
            @endforeach
          </td>
          <td>
            <form action="{{ route('machines.destroy', $machine->id) }}" method="POST">
              <a href="{{ route('machines.show', $machine->id) }}"><button type="button"
                  class="btn bg-gradient-secondary btn-sm"><i class="fas fa-eye"></i></button></a>
              <a href="{{ route('machines.edit', $machine->id) }}"><button type="button"
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

</section>
@endsection