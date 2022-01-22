<div class="modal fade" id="AddDeliveryReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-gradient-primary">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600">
          {{$name_reports[1]->code_report}} -
          {{$name_reports[1]->name}}
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
        <form action="{{ route('save.report.acta.entrega.pc')}}" method="POST">
          @csrf
          @method('POST')
          <input type="hidden" id="id-machine" name="id-machine" value="{{ $cancel_repo_pc->id}}">
          <input type="hidden" id="id-format" name="id-format" value="{{$name_reports[1]->id}}">
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="name-person">Nombre y Apellidos:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="name-person" style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();">
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="last-name-person">Apellidos:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="last-name-person" style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();">
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="position-person">Cargo:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                </div>
                <input type="text" class="form-control" name="position-person" style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <!-- checkbox -->
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="has-wifi" value="1">
                  <label class="form-check-label">WIFI</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="has-keyboard" value="1">
                  <label class="form-check-label">Teclado</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="has-mouse" value="1">
                  <label class="form-check-label">Mouse</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="has-webcam" value="1">
                  <label class="form-check-label">Web cam</label>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="has-cover" value="1">
                  <label class="form-check-label">Funda</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="has-briefcase" value="1">
                  <label class="form-check-label">Maletín</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="has-charge-adapter" value="1">
                  <label class="form-check-label">Adaptador</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="has-padlock" value="1">
                  <label class="form-check-label">Candado</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                </div>
                <input type="text" class="form-control" name="serial-keyboard" style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Serial del teclado">
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-mouse"></i></span>
                </div>
                <input type="text" class="form-control" name="serial-mouse" style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Serial del teclado">
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-charging-station"></i></span>
                </div>
                <input type="text" class="form-control" name="serial-charge-adapter" style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Serial del adaptador">
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Otros accesorios:</span>
                </div>
                <input type="text" class="form-control" name="others-accesories" style="text-transform:uppercase;"
                  onkeyup="javascript:this.value=this.value.toUpperCase();">
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