<a class="btn btn-app bg-teal float-right" data-toggle="modal" data-target="#AddTechnicians">
  <?php $global_users_count = DB::table('users')->select('users*.')->where('status_deleted_at', '=', [1])->count();?>
  <span class="badge bg-purple">
    {{ $global_users_count ?? '0' }}
  </span>
  <i class="fas fa-users"></i>
  Agregar técnico
</a>

<div class="modal fade" id="AddTechnicians" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-gradient-teal">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600">Registrar nuevo técnico
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-auto">
        @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('typealert') }} alert-dismissible fade show" style="d-none">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-ban"></i> Upsss!</h5>
          {{ Session::get('message') }}
          @if ($errors->any())
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif
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
                <input type="text" class="form-control" name="cc" pattern="[0-9]+" maxlength="10" minlength="8"
                  value="{{ old('cc') }}">
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="name">Nombres:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="name" style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('name') }}">
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
                  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="email">Email:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-at"></i></span>
                </div>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
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
                <input type="text" id="form1" class="form-control" name="phone" value="{{ old('phone') }}"
                  placeholder="300-0000-000">
                <input type="text" id="form2" class="form-control" hidden>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="phone">Role 1:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                </div>
                <select class="custom-select" name="rol">
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
                <select class="custom-select" name="campu-name">
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
                <select class="custom-select" name="work-function">
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
                <input type="password" class="form-control" name="password" maxlength="8">
              </div>
            </div>

            <div class="col-sm-4 mb-3">
              <label for="password-re">Confirmar contraseña:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" class="form-control" name="password_confirmation" maxlength="8">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleFormControlFile1">Subir foto:</label>
            <input type="file" class="form-control-file" name="avatar" value="{{ old('avatar') }}">
          </div>

          <div class="modal-footer">
            <div class="btn-group w-100" style="height: 40px">
              <span class="btn btn-secondary w-50" data-dismiss="modal">
                <i class="fas fa-times"></i>
                <span>Cerrar</span>
              </span>
              <button type="submit" class="btn btn-primary col start w-100">
                <i class="fas fa-save"></i>
                <span>Guardar</span>
              </button>
              <button type="reset" class="btn btn-secondary col cancel w-50">
                <i class="fas fa-eraser"></i>
                <span>Borrar todo</span>
              </button>
            </div>
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
    @if($message = Session::get('message'))
    $('#AddTechnicians').modal('show');
    @endif
  })
</script>

<script>
  $("input[id='form1']").on("input", function () {
$("input[id='form2']").val(destroyMask(this.value));
this.value = createMask($("input[id='form2']").val());
})

function createMask(string) {
console.log(string)
return string.replace(/(\d{3})(\d{3})(\d{3})/, "$1-$2-$3");
}

function destroyMask(string) {
console.log(string)
return string.replace(/\D/g, '').substring(0, 10);
}
</script>
@endpush