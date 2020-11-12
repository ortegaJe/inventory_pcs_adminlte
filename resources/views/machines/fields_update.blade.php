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
                <option value="{{ $type->id }}" {{ $type->id == $machine->type_id ? 'selected' : '' }}>
                    {{ $type->name }}</option>
                @endforeach
                </td>
            </select>
            @if ($errors->has('type'))
            <span class="invalid-feedback">
                {{ $errors->first('type') }}
            </span>
            @endif
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
                @foreach ($rams as $ram)
                <option value="{{ $ram->id }}" {{ $ram->id == $machine->ram_slot_00_id ? 'selected' : '' }}>
                    {{ $ram->ram }}</option>
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
                @foreach ($rams as $ram)
                <option value="{{ $ram->id }}" {{ $ram->id == $machine->ram_slot_01_id ? 'selected' : '' }}>
                    {{ $ram->ram }}</option>
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
            <select class="custom-select" name="hard-drive">
                @foreach ($hdds as $hdd)
                <option value="{{ $hdd->id }}" {{ $hdd->id == $machine->hard_drive_id ? 'selected' : '' }}>
                    {{ $hdd->size }} | {{ $hdd->type }}</option>
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
            <input name="cpu" value="{{ $machine->cpu }}" style="text-transform:uppercase;"
                onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"
                placeholder="">
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-sm-4 mb-3">
        <label for="ip">Dirección IP:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-ethernet"></i></span>
            </div>
            <input type="text" maxlength="15" class="form-control" name="ip" value="{{ $machine->ip_range }}"
                placeholder="000.000.000.000">
        </div>
    </div>

    <div class="col-sm-4 mb-3">
        <label for="mac">Dirección MAC:</label>
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
                <span class="input-group-text"><img src="https://anydesk.com/_static/img/favicon/anydesk_icon.png"
                        width="20px" alt="" /></span>
            </div>
            <input type="text" class="form-control" name="anydesk" value="{{ $machine->anydesk }}"
                placeholder="000 000 000">
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-3 mb-3">
        <label for="os">OS:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><img src="{{asset('svg/os.svg')}}" width="20px" alt=""></span>
            </div>
            <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                type="text" class="form-control" name="os" value="{{ $machine->os }}">
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="location">Ubicación:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><img src="{{asset('svg/aim.svg')}}" width="20px" alt="" /></span>
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
            <select class="custom-select" name="campus_id">
                <option value="" selected disabled>Seleccione sede...</option>
                @foreach ($campus as $campu)
                <option value="{{ $campu->id }}" {{ $campu->id == $machine->campus_id ? 'selected' : '' }}>
                    {{ $campu->campu_name }}</option>
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
    <textarea class="form-control" maxlength="200" id="" name="comment" value="{{ $machine->comment }}"></textarea>
</div>