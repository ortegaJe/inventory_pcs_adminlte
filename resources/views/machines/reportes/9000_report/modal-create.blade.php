<div class="modal fade" id="AddCancelReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-gradient-primary">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600">
          {{$name_reports[0]->code_report}} -
          {{$name_reports[0]->name}}
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-auto">
        @if (Session::has('message_cancel_report'))
        <div class="alert alert-{{ Session::get('typealert') }} alert-dismissible fade show" style="d-none">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-ban"></i> Upsss!</h5>
          {{ Session::get('message_cancel_report') }}
          @if ($errors->any())
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif
        </div>
        @endif
        <form action="{{ route('save.report.pc')}}" method="POST">
          @csrf
          @method('POST')
          <input type="hidden" id="id-machine" name="id-machine" value="{{ $cancel_repo_pc->id}}">
          <input type="hidden" id="id-format" name="id-format" value="{{$name_reports[0]->id}}">
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="act-fijo">Activo fijo:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                </div>
                <input type="text" class="form-control" name="act-fijo" id="act-fijo" style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('act-fijo') }}">
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="name-depen">Nombre de la dependencia:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user-lock"></i></span>
                </div>
                <input type="text" class="form-control" name="name-depen" id="name-depen"
                  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                  value="{{ old('name-depen') }}">
              </div>
            </div>
          </div>

          <div class="col-sm-12 mb-3">
            <label for="alt-solucions">Alternativas para solucion técnica:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-tools"></i></span>
              </div>
              <select class="custom-select" name="alt-solucions" id="alt-solucions">
                <option selected disabled>Seleccionar solucion...</option>
                @forelse ($altsolucions as $listasoluciones)
                <option value="{{$listasoluciones->id}}">{{$listasoluciones->name}}</option>
                @empty
                <option value="">NO EXISTEN SOLUCIONES TECNICAS REGISTRADAS</option>
                @endforelse
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-12 mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Diagnostico:</span>
                </div>
                <textarea style="height: 100px;" class="form-control" maxlength="200" id="diagnostic" name="diagnostic"
                  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                  aria-label="With textarea" value="{{ old('diagnostic') }}"></textarea>
              </div>
            </div>
          </div>

          <br />

          <div class="form-row">
            <div class="col-md-12 mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Observacion:</span>
                </div>
                <textarea style="height: 100px;" class="form-control" maxlength="200" id="observation"
                  name="observation" style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();" aria-label="With textarea"
                  value="{{ old('observation') }}"></textarea>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>