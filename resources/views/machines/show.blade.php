@extends('layouts.app')

@section('content')
<div class="content-fluid">
  <div class="col-20">
  <div class="col-sm-6" style="margin-left: 410px">
    <div class="card card-secondary">
      <div class="card-header">
        <h3 class="card-title" style="font-weight: 700; font-size:20px">Informacion detallada | {{ $machine->serial }}</h3>
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
                        <input type="text" name="type" class="form-control" disabled value="{{ $machine->type }}">
                    </div>
                </div>

                  <div class="col-md-6 mb-3">
                    <label for="manufacturer">Fabricante:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-wrench"></i></span>
                      </div>
                      <input value="{{ $machine->manufacturer }}" name="manufact" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" id="name-input" disabled>
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
                      <input value="{{ $machine->model }}" name="model" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" disabled>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="serial">Serial:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-tag"></i></span>
                      </div>
                      <input value="{{ $machine->serial }}" name="serial" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" disabled >
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
                        <input type="text" name="ramslot00" class="form-control" disabled value="{{ $machine->ram_slot_00 }}">
                    </div>
                  </div>

                  <div class="col-sm-6 mb-3">
                    <label for="ramslot01">RAM SLOT 02:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-memory"></i></span>
                      </div>
                        <input type="text" name="ramslot01" class="form-control" disabled value="{{ $machine->ram_slot_01 }}">
                    </div>
                  </div>

                  <div class="col-sm-4 mb-3">
                    <label for="hard-drive">Disco Duro:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-hdd"></i></span>
                      </div>
                        <input type="text" value="{{ $machine->hard_drive }}" class="form-control" disabled>
                    </div>
                  </div>

                  <div class="col-md-8 mb-4">
                    <label for="cpu">Procesador:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-microchip"></i></span>
                      </div>
                      <input name="cpu" value="{{ $machine->cpu }}" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"  disabled>
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
                      <input type="text" maxlength="15" class="form-control" name="ip" value="{{ $machine->ip_range }}" disabled >
                    </div>
                  </div>

                  <div class="col-sm-4 mb-3">
                    <label for="mac">Dirección Mac:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                      </div>
                      <input name="mac" value="{{ $machine->mac_address }}" style="text-transform:uppercase;" maxlength="17" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" disabled >
                    </div>
                  </div>

                  <div class="col-sm-4 mb-3">
                    <label for="anydesk">Anydesk:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><img src="img/png/anydesk.png" width="20px" alt="" /></span>
                      </div>
                      <input type="text" class="form-control" name="anydesk" value="{{ $machine->anydesk }}" disabled>
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
                      <input name="location" value="{{ $machine->location }}" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" disabled >
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                   <label for="sede">Sede del equipo:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-building"></i></span>
                    </div>
                      <input value="{{ $machine->campus }}" name="campus" class="form-control" disabled>
                  </div>
                 </div>
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Observacion:</span>
                  </div>
                  <textarea class="form-control" maxlength="200" id="" name="comment" value="{{ $machine->comment }}" disabled></textarea>
                </div>
    </form>
    </div>
    </div>
    </div>
    </div>
      </div>
    </div>
    
@endsection