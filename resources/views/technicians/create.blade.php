@extends('layouts.app')

@section('content')

<div class="content-fluid">
  <div class="col-20">
    <div class="col-sm-6" style="margin-left: 410px">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title" style="font-weight: 700; font-size:20px">Registrar Tecnico</h3>
        </div>
        <div class="card-body">
          <form action="/technicians" method="POST">
            @csrf
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label for="name">Indentificación:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" name="cc" required>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="name">Nombres:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" name="name" style="text-transform:uppercase;"
                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <label for="last-name">Apellidos:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" name="last-name" style="text-transform:uppercase;"
                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
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
                  <input type="text" class="form-control" name="nick-name" style="text-transform:uppercase;"
                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                </div>
              </div>


              <div class="col-md-6 mb-3">
                <label for="email">Email:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                  </div>
                  <input type="email" class="form-control" name="email" required>
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label for="phone">Numero de contacto:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                  </div>
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="300-0000-000"
                    pattern="[3-10]{3}-[0-10]{4}-[0-10]{3}" maxlength="10">
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
                  <select class="custom-select" name="campus" required>
                    <option>Seleccione la sede...</option>
                    <option>1</option>
                    <option>2</option>
                  </select>
                </div>
              </div>

              <div class="col-sm-6 mb-3">
                <label for="work-function">Cargo:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-memory"></i></span>
                  </div>
                  <select class="custom-select" name="work-function">
                    <option>Seleccione el cargo...</option>
                    <option>Support IT</option>
                    <option>Network Administrator</option>
                    <option>Tech Support Enginner</option>
                    <option>Administrator Database</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-sm-4 mb-6">
                <label for="password">Contraseña:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                  </div>
                  <input type="password" class="form-control" name="password" maxlength="8" required>
                </div>
              </div>
            </div>

            <div class="modal-footer mt-4">
              <button type="reset" class="btn btn-secondary">Borrar todo</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


@endsection