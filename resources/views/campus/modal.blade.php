<button type="button" class="btn bg-maroon float-right btn-sm" data-toggle="modal" data-target="#AddCampu">
    <i class="fa fa-plus"></i> Agregar Sede</button>

{!! Form::open(['url' => 'campus']) !!}
<!--composer require laravelcollective/html-->
{{ Form::token() }}
<div class="modal fade" id="AddCampu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Sede</h5>
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

                <form>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="" style="font-size: 24px">Nombre:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                </div>
                                <input style="text-transform:uppercase;"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" type="text"
                                    class="form-control" name="name" placeholder="VIVA 1A IPS MACARENA">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="" style="font-size: 24px">Abreviado:
                                <small style="color: crimson; font-size: 14px">
                                    (Ej: Calle 30 = C30, max 4 letras)</small>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-font"></i></span>
                                </div>
                                <input style="text-transform:uppercase;"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" type="text"
                                    class="form-control" name="label" maxlength="4" placeholder="MAC">
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

@push('js')
<script>
    $('.alert').slideDown();
  setTimeout(function(){ $('.alert').slideUp(); }, 10000);
</script>

@if(Session::has('campus_created'))
<script>
    Swal.fire(
'Creado con Exito!',
'{!! Session::get('campus_created') !!}',
'success'
)
</script>
@endif

<script>
    $(document).ready(function(){
    @if($message = Session::get('message'))
    $('#AddCampu').modal('show');
    @endif
  })
</script>
@endpush