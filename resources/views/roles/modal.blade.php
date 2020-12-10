<a class="btn btn-app bg-success float-right" data-toggle="modal" data-target="#AddRol">
  <?php $global_users_count = DB::table('roles')->count();?>
  <span class="badge bg-purple">
    {{ $global_users_count ?? '0' }}
  </span>
  <i class="fas fa-users-cog"></i>
  Agregar nuevo rol
</a>

{!! Form::open(['url' => 'roles']) !!}
<!--composer require laravelcollective/html ->where('status_deleted_at', '=', [1])-->
{{ Form::token() }}
<div class="modal fade" id="AddRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600">Nuevo Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-auto">

        <form>
          <div class="form-row">
            <div class="col-md-12 mb-4">
              <label style="font-size: 24px">Rol:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                </div>
                <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                  type="text" class="form-control" name="rol-name">
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 mb-4">
              <label style="font-size: 24px">Descripción:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-font"></i></span>
                </div>
                <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                  type="text" class="form-control" name="label">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>
{!! Form::close() !!}