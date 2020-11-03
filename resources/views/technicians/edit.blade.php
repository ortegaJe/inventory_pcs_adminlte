@extends('layouts.app')

@section('content')

<div class="content-fluid">
    <div class="col-20">
        <div class="col-sm-8 mx-auto">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title" style="font-weight: 700; font-size:20px">Actualizar informacion |
                        {{ $user->cc }}
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('technicians.update', $user->id ) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="name">Indentificación:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="cc" value="{{ $user->cc }}">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="name">Nombres:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                        style="text-transform:uppercase;"
                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="last-name">Apellidos:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="last-name"
                                        value="{{ $user->last_name }}" style="text-transform:uppercase;"
                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="nick-name">Nickname:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="nick-name"
                                        value="{{ $user->nick_name }}" style="text-transform:uppercase;"
                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="email">Email:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                    </div>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="phone">Numero de contacto:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                    </div>
                                    <input type="tel" class="form-control" name="phone" value="{{ $user->phone }}"
                                        placeholder="300-0000-000" pattern="[3-10]{3}-[0-10]{4}-[0-10]{3}"
                                        maxlength="10" required>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone">Roles:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                                    </div>
                                    <select class="custom-select" name="rol">
                                        @foreach ($roles as $role)
                                        @if($role->name == str_replace(array('["','"]'), '', $user->haveRol()))
                                        <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                                        @else
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-sm-6 mb-3">
                                <label for="campus">Sede:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                    </div>
                                    <select class="custom-select" name="campus">
                                        @foreach ($campus as $campu)
                                        <option value="{{ $campu->id }}"
                                            {{ $campu->id == $user->campus_id ? 'selected' : '' }}>
                                            {{ $campu->campu_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label for="work-function">Cargo:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                    </div>
                                    <select class="custom-select" name="work-function"
                                        value="{{ $user->work_function }}">
                                        <option selected disabled>Seleccione el cargo...</option>
                                        <option>Support IT</option>
                                        <option>Network Administrator</option>
                                        <option>Tech Support Enginner</option>
                                        <option>Administrator Database</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-sm-4 mb-3">
                                <label for="password">Contraseña:<span class="small">(Opcional)</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" class="form-control" name="password" maxlength="8">
                                </div>
                            </div>

                            <div class="col-sm-4 mb-3">
                                <label for="password-re">Confirmar contraseña:<span
                                        class="small">(Opcional)</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        maxlength="8">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Actualizar foto:</label>
                            <input type="file" class="form-control-file" name="avatar">
                            @if($user->image != "")
                            <img class="img-circle elevation-2 mt-2" src="{{ asset('upload/'.$user->image) }}"
                                alt="{{ $user->image }}" width="50px" height="50px">
                            @endif
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