<button type="button" class="btn bg-info float-right btn-sm" data-toggle="modal" data-target="#AddRam">
    <i class="fa fa-plus"></i> Agregar RAM</button>

{!! Form::open(['url' => 'ram']) !!}
<!--composer require laravelcollective/html-->
{{ Form::token() }}
<div class="modal fade" id="AddRam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: black; font-weight: 600">Nueva RAM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-auto">

                <form>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <h2 style="font-weight: 700" for="recipient-rol-name">RAM:</h2>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-memory"></i></span>
                                </div>
                                <input style="text-transform:uppercase;"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" type="text"
                                    class="form-control" name="ram-name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mx-auto">Guardar RAM</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
{!! Form::close() !!}