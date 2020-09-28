@extends('layouts.app')

@section('content')

<div class="content-fluid">
    <div class="col-20">
        <div class="col-sm-6 mx-auto">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title" style="font-weight: 700; font-size:20px">Actualizar Equipo |
                        {{ $user->id }}
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('technicians.update', $user->id ) }}" method="POST">
                        @method('PATCH')
                        @csrf

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-row">
                            <div class="col-md-6 mb-8">
                                <label for="type">Tipo de equipo:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-desktop"></i></span>
                                    </div>
                                    <select class="custom-select" name="type" value="">
                                        <option data-value=""></option>
                                        <option>PC</option>
                                        <option>ATRIL</option>
                                        <option>LAPTOP</option>
                                        <option>TV RASPBERRY PI</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="manufacturer">Fabricante:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-wrench"></i></span>
                                    </div>
                                    <input value="" name="manufact" style="text-transform:uppercase;"
                                        onkeyup="javascript:this.value=this.value.toUpperCase();" type="text"
                                        class="form-control" id="name-input" placeholder="HP">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary">Borrar todo</button>
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection