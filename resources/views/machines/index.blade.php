@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div style="padding-bottom: 4%"><a href="machines/create"><button type="button"
        class="btn bg-gradient-primary btn-lg float-left" style="color: aliceblue">Agregar</button></a></div>
  <table class="table table-hover table-bordered text-center">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">TYPE</th>
        <th scope="col">IP RANGE</th>
        <th scope="col">MAC ADDRESS</th>
        <th scope="col"><img src="{{ asset('png/anydesk.png') }}" width="32px" height="32px" alt=""></th>
        <th scope="col">CAMPUS</th>
        <th scope="col">ACTIONS</th>
        <!--<th scope="col">MANUFACTURER</th>
      <th scope="col">MODEL</th>
      <th scope="col">SERIAL</th>
      <th scope="col">RAM SLOT 00</th>
      <th scope="col">RAM SLOT 01</th>
      <th scope="col">HARD DRIVE</th>
      <th scope="col">CPU</th>
      <th scope="col">LOCATION</th>
      <th scope="col">COMMENT</th>-->


      </tr>
    </thead>
    <tbody>
      @foreach ($machines as $machine)
      <tr>
        <th scope="row">{{ $machine->id }}</th>
        <td>{{ $machine->type }}</td>
        <td>{{ $machine->ip_range }}</td>
        <td>{{ $machine->mac_address }}</td>
        <td>{{ $machine->anydesk }}</td>
        <td>{{ $machine->campus_id }}</td>
        <td>
          <form action="{{ route('machines.destroy', $machine->id) }}" method="POST">
            <a href="{{ route('machines.show', $machine->id) }}"><button type="button"
                class="btn bg-gradient-secondary btn-xs"><i class="fas fa-eye"></i></button></a>
            <a href="{{ route('machines.edit', $machine->id) }}"><button type="button"
                class="btn bg-gradient-success btn-xs"><i class="fas fa-edit"></i></button></a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn bg-gradient-danger btn-xs"><i class="fas fa-trash-alt"></i></button>
          </form>
        </td>

        <!--<td>{{ $machine->manufacturer }}</td>
      <td>{{ $machine->model }}</td>
      <td>{{ $machine->serial }}</td>
      <td>{{ $machine->ram_slot_00 }}</td>
      <td>{{ $machine->ram_slot_01 }}</td>
      <td>{{ $machine->hard_drive }}</td>
      <td>{{ $machine->cpu }}</td>
      <td>{{ $machine->location }}</td>
      <td>{{ $machine->comment }}</td>-->
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection