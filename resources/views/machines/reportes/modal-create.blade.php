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
        <form action="/dashboard/admin/format_reports" method="POST" enctype="multipart/form-data">
          @csrf
          @foreach($if_pc_has_reports as $if_pc_has_report)
          <input type="text" id="id-machine" name="id-machine" value="{{$if_pc_has_report->machine_id}}">
          <input type="text" id="id-format" name="id-format" value="1">
          @endforeach
          @foreach($generate_new_reports as $generate_new_report)
          <input type="text" id="id-machine" name="id-machine" value="{{$generate_new_report->id}}">
          <input type="text" id="id-format" name="id-format" value="1">
          @endforeach
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="act-fijo">Activo fijo:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                </div>
                <input type="text" class="form-control" name="act-fijo" style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();">
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="name-depen">Nombre de la dependencia:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user-lock"></i></span>
                </div>
                <input type="text" class="form-control" name="name-depen" style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
              </div>
            </div>
          </div>

          <div class="col-sm-12 mb-3">
            <label for="alt-solucions">Alternativas para solucion técnica:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-tools"></i></span>
              </div>
              <select class="custom-select" name="alt-solucions" required>
                <option selected disabled>Seleccionar solucion...</option>
                @forelse ($altsolucions as $listasoluciones)
                <option value="{{$listasoluciones->id}}">{{$listasoluciones->name}}</option>
                @empty
                <option value="null">NO HAY EXISTE SOLUCIONES TECNICAS REGISTRADAS</option>
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
                  aria-label="With textarea"></textarea>
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
                <textarea style="height: 100px;" class="form-control" maxlength="200" id="" name="observation"
                  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                  aria-label="With textarea"></textarea>
              </div>
            </div>
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