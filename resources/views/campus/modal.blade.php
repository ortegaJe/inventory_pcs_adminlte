<div style="padding-bottom: 6ch"><button type="button" class="btn btn-app float-right" data-toggle="modal"
        data-target="#AddCampu">
        <i class="fa fa-plus"></i> Agregar Sede</button>
</div>

{!! Form::open(['url' => 'campus']) !!}
<!--composer require laravelcollective/html-->
{{ Form::token() }}
<div class="modal fade" id="AddCampu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: black; font-weight: 600">Nueva Sede</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-auto">

                <form>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <h2 style="font-weight: 700" for="recipient-rol-name">Sede:</h2>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                                </div>
                                <input style="text-transform:uppercase;"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" type="text"
                                    class="form-control" name="campu-name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar sede</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
{!! Form::close() !!}