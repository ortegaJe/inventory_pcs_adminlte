@extends('layouts.app')

@section('content')

<div class="container-fluid text-monospace">
    <div class="row">
        <div class="col-md-6 mx-right">
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
                    @foreach ($types as $type)
                    <tr>
                        <th>
                            <h4>{{ $type->name }}
                        </th>
                        </h4>
                        <th>
                            <form action="" method="POST">
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
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection