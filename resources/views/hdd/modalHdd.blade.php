<button type="button" class="btn bg-info float-right btn-sm" data-toggle="modal" data-target="#AddHdd">
  <i class="fa fa-plus"></i> Agregar disco duro</button>

{!! Form::open(['url' => 'hdd']) !!}
<!--composer require laravelcollective/html-->
{{ Form::token() }}
<div class="modal fade" id="AddHdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: black; font-weight: 600">Nuevo disco duro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-auto">

        <form>
          <div class="form-row">
            <div class="col-md-8 mb-3">
              <h2 style="font-weight: 700" for="recipient-hdd-size">TAMAÑO:</h2>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-hdd"></i></span>
                </div>
                <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                  type="text" class="form-control" name="hdd-size">
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-10 mb-3">
              <h2 style="font-weight: 700" for="recipient-hdd-type">TIPO:</h2>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-desktop"></i></span>
                </div>
                <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                  type="text" class="form-control" name="hdd-type">
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary mx-auto">Guardar</button>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>
{!! Form::close() !!}