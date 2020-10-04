@extends('layouts.app')

@section('content')

<div class="container-fluid text-monospace">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h2 style="font-weight: 700">Listado de Sedes</h2>
            @include('campus.modal')
            <table class="table table-hover table-bordered text-center">
                <thead class="thead-dark">
                    <tr>
                        <th hidden scope="col">ID</th>
                        <th scope="col">
                            <i class="fas fa-building"></i>
                        </th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($campus as $campu)
                    <tr>
                        <th hidden scope="row">{{ $campu->id }}</th>
                        <th>
                            <h4>{{ $campu->name }}
                        </th>
                        </h4>
                        <th>
                            <form action="{{ route('campus.destroy', $campu->id) }}" method="POST">
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

@endsection