@extends('layouts.app')

@section('content')
<div class="content-fluid">
  <div class="col-20">
    <div class="col-sm-8 mx-auto">
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title" style="font-weight: 700; font-size:20px">Actualizar Equipo | {{ $machine->serial }}
          </h3>
        </div>
        <div class="card-body">
          <form action="{{ route('machines.update', $machine->id ) }}" method="POST">
            @method('PATCH')
            @csrf

            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            <div class="form-row">
              <div class="col-md-6 mb-8">
                <label for="type">Tipo de equipo:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-desktop"></i></span>
                  </div>
                  <select class="custom-select" name="type">
                    <option selected disabled>Seleccionar tipo...</option>
                    @foreach ($types as $type)
                    @if($type->id == $machine->type_id)
                    <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                    @else
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endif
                    @endforeach
                    </td>
                  </select>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="manufacturer">Fabricante:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-wrench"></i></span>
                  </div>
                  <input value="{{ $machine->manufacturer }}" name="manufact" style="text-transform:uppercase;"
                    onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"
                    id="name-input" placeholder="HP">
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
                  <input value="{{ $machine->model }}" name="model" style="text-transform:uppercase;"
                    onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"
                    placeholder="">
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="serial">Serial:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-tag"></i></span>
                  </div>
                  <input value="{{ $machine->serial }}" name="serial" style="text-transform:uppercase;"
                    onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"
                    placeholder="S/N">
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
                  <select class="custom-select" name="ramslot00">
                    <option>{{ $machine->ram_slot_00 }}</option>
                    <option>1GB DDR2 SO-DIMM</option>
                    <option>1GB DDR2 DIMM</option>
                    <option>2GB DDR2 SO-DIMM</option>
                    <option>2GB DDR2 DIMM</option>
                    <option>4GB DDR3 SO-DIMM</option>
                    <option>4GB DDR3 DIMM</option>
                    <option>4GB DDR4 SO-DIMM</option>
                    <option>4GB DDR4 DIMM</option>
                    <option>8GB DDR3 SO-DIMM</option>
                    <option>8GB DDR3 SO-DIMM</option>
                    <option>8GB DDR4 SO-DIMM</option>
                    <option>8GB DDR4 SO-DIMM</option>
                    <option>16GB DDR4 SO-DIMM</option>
                    <option>16GB DDR4 DIMM</option>
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
                    <option>{{ $machine->ram_slot_01 }}</option>
                    <option>NULL</option>
                    <option>1GB DDR2 SO-DIMM</option>
                    <option>1GB DDR2 DIMM</option>
                    <option>2GB DDR2 SO-DIMM</option>
                    <option>2GB DDR2 DIMM</option>
                    <option>4GB DDR3 SO-DIMM</option>
                    <option>4GB DDR3 DIMM</option>
                    <option>4GB DDR4 SO-DIMM</option>
                    <option>4GB DDR4 DIMM</option>
                    <option>8GB DDR3 SO-DIMM</option>
                    <option>8GB DDR3 SO-DIMM</option>
                    <option>8GB DDR4 SO-DIMM</option>
                    <option>8GB DDR4 SO-DIMM</option>
                    <option>16GB DDR4 SO-DIMM</option>
                    <option>16GB DDR4 DIMM</option>
                  </select>
                </div>
              </div>

              <div class="col-sm-4 mb-3">
                <label for="hard-drive">Disco Duro:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-hdd"></i></span>
                  </div>
                  <select class="custom-select" name="hard-drive">
                    <option>{{ $machine->hard_drive }}</option>
                    <option>70GB</option>
                    <option>100GB</option>
                    <option>150GB</option>
                    <option>250GB</option>
                    <option>300GB</option>
                    <option>500GB</option>
                    <option>800GB</option>
                    <option>1TB</option>
                    <option>2TB</option>
                  </select>
                </div>
              </div>

              <div class="col-md-8 mb-4">
                <label for="cpu">Procesador:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-microchip"></i></span>
                  </div>
                  <input name="cpu" value="{{ $machine->cpu }}" style="text-transform:uppercase;"
                    onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"
                    placeholder="">
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
                  <input type="text" maxlength="15" class="form-control" name="ip" value="{{ $machine->ip_range }}"
                    placeholder="000.000.000.000">
                </div>
              </div>

              <div class="col-sm-4 mb-3">
                <label for="mac">Dirección Mac:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                  </div>
                  <input name="mac" value="{{ $machine->mac_address }}" style="text-transform:uppercase;" maxlength="17"
                    onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"
                    placeholder="00-00-00-00-00-00">
                </div>
              </div>

              <div class="col-sm-4 mb-3">
                <label for="anydesk">Anydesk:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><img src="{{ asset('png/anydesk.png') }}" width="20px"
                        alt="" /></span>
                  </div>
                  <input type="text" class="form-control" name="anydesk" value="{{ $machine->anydesk }}"
                    placeholder="000 000 000">
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="location">Ubicación:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><img src="img/svg/aim.svg" width="20px" alt="" /></span>
                  </div>
                  <input name="location" value="{{ $machine->location }}" style="text-transform:uppercase;"
                    onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"
                    placeholder="">
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="sede">Sede del equipo:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                  </div>
                  <select class="custom-select" name="campus">
                    <option value="">{{ $machine->campus }}</option>
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
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
              <textarea class="form-control" maxlength="200" id="" name="comment"
                value="{{ $machine->comment }}"></textarea>
            </div>

            <div class="modal-footer">
              <button type="reset" class="btn btn-secondary">Borrar todo</button>
              <button type="submit" class="btn btn-success">Actualizar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection