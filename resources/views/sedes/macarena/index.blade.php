@extends('layouts.app')

@section('title', 'Sede Macarena')

@section('content')

<section class="content">

    <div class="container-fluid">
        <div style="padding-bottom: 4%"><a href="macarena/create"><button type="button"
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
                @foreach ($mac_machines as $mac_machine)
                <tr>
                    <th scope="row">{{ $mac_machine->id }}</th>
                    <td>
                        @foreach ($types as $type)
                        @if($type->id == $mac_machine->type_id)
                        {{ $type->name }}
                        @endif
                        @endforeach
                    </td>
                    <td>{{ $mac_machine->ip_range }}</td>
                    <td>{{ $mac_machine->mac_address }}</td>
                    <td>{{ $mac_machine->anydesk }}</td>
                    <td>
                        @foreach ($campus as $campu)
                        @if($campu->id == $mac_machine->campus_id)
                        {{ $campu->name }}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        <form action="{{ route('machines.destroy', $mac_machine->id) }}" method="POST">
                            <a href="{{ route('machines.show', $mac_machine->id) }}"><button type="button"
                                    class="btn bg-gradient-secondary btn-sm"><i class="fas fa-eye"></i></button></a>
                            <a href="{{ route('machines.edit', $mac_machine->id) }}"><button type="button"
                                    class="btn bg-gradient-success btn-sm"><i class="fas fa-edit"></i></button></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn bg-gradient-danger btn-sm"><i
                                    class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endsection