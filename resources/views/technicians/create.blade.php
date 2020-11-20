<div style="padding-bottom: 6ch"><button type="button" class="btn bg-info float-right btn-sm" data-toggle="modal"
    data-target="#AddTechnicians">
    <i class="fa fa-plus"></i> Agregar técnico</button></a></div>

<div class="modal fade" id="AddTechnicians" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-gradient-primary">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600">Registrar nuevo Tecnico
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-auto">
        @if ($message = Session::get('user_with_errors'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-ban"></i> Upsss!</h5>
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form action="technicians" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="name">Indentificación:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                </div>
                <input type="text" class="form-control" name="cc" pattern="[0-9]+" maxlength="10"
                  value="{{ old('cc') }}" required>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="name">Nombres:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="name" style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('name') }}" required>
              </div>
            </div>

            <div class="col-md-4 mb-3">
              <label for="last-name">Apellidos:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="last-name" value="{{ old('last-name') }}"
                  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
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
                <input type="text" class="form-control" name="nick-name" value="{{ old('nick-name') }}"
                  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
              </div>
            </div>


            <div class="col-md-6 mb-3">
              <label for="email">Email:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-at"></i></span>
                </div>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="phone">Numero de contacto:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                </div>
                <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"
                  placeholder="300-0000-000" pattern="[3-10]{3}-[0-10]{4}-[0-10]{3}" maxlength="10" required>
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="phone">Role 1:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                </div>
                <select class="custom-select" name="rol" required>
                  <option selected disabled>Seleccionar un rol...</option>
                  @foreach($roles as $role)
                  <option value="{{ $role->id }}">{{ $role->name }}</option>
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
                <select class="custom-select" name="campu-name" required>
                  <option selected disabled>Seleccione la sede...</option>
                  @foreach($campus as $campu)
                  <option value="{{ $campu->id }}">{{ $campu->campu_name }}</option>
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
                <select class="custom-select" name="work-function" required>
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
              <label for="password">Contraseña:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" class="form-control" name="password" maxlength="8" required>
              </div>
            </div>

            <div class="col-sm-4 mb-3">
              <label for="password-re">Confirmar contraseña:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" class="form-control" name="password_confirmation" maxlength="8" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleFormControlFile1">Subir foto:</label>
            <input type="file" class="form-control-file" name="avatar" value="{{ old('avatar') }}">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="reset" class="btn btn-secondary">Borrar todo</button>
            <button type="submit" class="btn btn-primary">Registrar</button>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>

@push('js')
<script>
  $('.alert').slideDown();
  setTimeout(function(){ $('.alert').slideUp(); }, 10000);
</script>

@if(Session::has('user_created'))
<script>
  Swal.fire(
'Creado con Exito!',
'{!! Session::get('user_created') !!}',
'success'
)
</script>
@endif

<script>
  $(document).ready(function(){
    @if($message = Session::get('user_with_errors'))
    $('#AddTechnicians').modal('show');
    @endif
  })
</script>
@endpush