@extends('layouts.app')

@section('title', 'Registro de equipo')

@section('content')
<div class="content-fluid">
  <div class="col-20">
    <div class="col-sm-8 mx-auto">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title" style="font-weight: 700; font-size:20px">Registrar Equipo</h3>
        </div>
        <div class="card-body">
          <form action="/machines" method="POST">
            @csrf
            <div class="form-row">
              <div class="col-md-6 mb-8">
                <label for="type">Tipo de equipo:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-desktop"></i></span>
                  </div>
                  <select class="custom-select" name="type" required>
                    <option selected disabled>Seleccione tipo...</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="manufacturer">Fabricante:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-wrench"></i></span>
                  </div>
                  <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                    type="text" class="form-control" id="name-input" name="manufact" placeholder="HP">
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="model">Modelo:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
                  </div>
                  <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                    type="text" class="form-control" name="model" placeholder="">
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="serial">Serial:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-tag"></i></span>
                  </div>
                  <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                    type="text" class="form-control" name="serial" placeholder="S/N" required>
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-sm-6 mb-3">
                <label for="ramslot00">RAM SLOT 01:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-memory"></i></span>
                  </div>
                  <select class="custom-select" name="ramslot00" required>
                    <option selected disabled>Seleccionar RAM...</option>
                    @foreach ($rams as $ram)
                    <option value="{{ $ram->id }}">{{ $ram->ram }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-sm-6 mb-3">
                <label for="ramslot01">RAM SLOT 02:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-memory"></i></span>
                  </div>
                  <select class="custom-select" name="ramslot01">
                    <option selected disabled>Seleccionar RAM...</option>
                    @foreach ($rams as $ram)
                    <option value="{{ $ram->id }}">{{ $ram->ram }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-sm-4 mb-3">
                <label for="hard-drive">Disco Duro:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-hdd"></i></span>
                  </div>
                  <select class="custom-select" name="hard-drive" required>
                    <option selected disabled>Seleccionar disco duro...</option>
                    @foreach ($hdds as $hdd)
                    <option value="{{ $hdd->id }}">{{ $hdd->size }} {{ $hdd->type}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-md-8 mb-4">
                <label for="cpu">Procesador:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-microchip"></i></span>
                  </div>
                  <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                    type="text" class="form-control" name="cpu" placeholder="">
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-sm-4 mb-3">
                <label for="ip">Dirección Ip:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-ethernet"></i></span>
                  </div>
                  <input type="text" maxlength="15" class="form-control" name="ip" value="">
                </div>
              </div>

              <div class="col-sm-4 mb-3">
                <label for="mac">Dirección Mac:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                  </div>
                  <input style="text-transform:uppercase;" maxlength="17"
                    onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"
                    name="mac" value="">
                </div>
              </div>

              <div class="col-sm-4 mb-3">
                <label for="anydesk">Anydesk:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><img src="" width="20px" alt="" /></span>
                  </div>
                  <input type="text" class="form-control" name="anydesk" placeholder="000 000 000">
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="os">OS:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><img
                        src="https://www.flaticon.com/svg/static/icons/svg/732/732225.svg" width="20px" alt=""></span>
                  </div>
                  <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                    type="text" class="form-control" name="os" value="{{ $getos }}" disabled>
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="location">Ubicación:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><img src="" width="20px" alt="" /></span>
                  </div>
                  <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                    type="text" class="form-control" name="location" placeholder="" required>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="campus">Sede del equipo:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                  </div>
                  <select class="custom-select" name="campus" required>
                    <option selected disabled>Seleccione sede...</option>
                    @foreach ($campus as $campu)
                    <option value="{{ $campu->id }}">{{ $campu->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="exampleFormControlFile1">Subir imagen del equipo:</label>
              <input type="file" accept=".jpg, .png, .gif, .svg" class="form-control-file" name="icon" id="icon">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Observacion:</span>
              </div>
              <textarea class="form-control" maxlength="200" id="" name="comment" aria-label="With textarea"></textarea>
            </div>

            <div class="modal-footer">
              <button type="reset" class="btn btn-secondary">Borrar todo</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection