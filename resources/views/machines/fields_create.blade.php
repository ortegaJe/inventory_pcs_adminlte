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

  <input type="text" name="status" value="1" hidden>

  <div class="col-md-6 mb-3">
    <label for="manufacturer">Fabricante:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-wrench"></i></span>
      </div>
      <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text"
        class="form-control" id="name-input" name="manufact" value="{{ old('manufact') }}" placeholder="LENOVO">
    </div>
  </div>
</div>

<div class="form-row">
  <div class="col-md-3 mb-3">
    <label for="model">Modelo:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
      </div>
      <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text"
        class="form-control" name="model" placeholder="">
    </div>
  </div>

  <div class="col-md-3 mb-3">
    <label for="serial">Serial:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-tag"></i></span>
      </div>
      <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text"
        class="form-control" name="serial" placeholder="S/N" required>
    </div>
  </div>

  <div class="col-md-3 mb-3">
    <label for="serial-monitor">Serial del monitor:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-tag"></i></span>
      </div>
      <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text"
        class="form-control" name="serial-monitor" placeholder="S/N">
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
        <option value="{{ $hdd->id }}">{{ $hdd->size }} | {{ $hdd->type}}</option>
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
      <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text"
        class="form-control" name="cpu" placeholder="">
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
      <input type="text" maxlength="15" class="form-control" name="ip" value="">
    </div>
  </div>

  <div class="col-sm-4 mb-3">
    <label for="mac">Dirección MAC:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-barcode"></i></span>
      </div>
      <input style="text-transform:uppercase;" maxlength="17" onkeyup="javascript:this.value=this.value.toUpperCase();"
        type="text" class="form-control" name="mac" value="{{ $getmacaddress }}">
    </div>
  </div>

  <div class="col-sm-4 mb-3">
    <label for="anydesk">Anydesk:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><img src="https://anydesk.com/_static/img/favicon/anydesk_icon.png" width="20px"
            alt="" /></span>
      </div>
      <input type="text" class="form-control" name="anydesk" placeholder="000 000 000">
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
      <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text"
        class="form-control" name="os" value="{{ $getos }}">
    </div>
  </div>
  <div class="col-md-6 mb-3">
    <label for="location">Nombre del equipo:</label>
    <!--<small style="color: crimson">( Ejemplo: V1A[ABREVIADO DE LA SEDE]-[UBICACION] )</small>-->
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text bg-primary"><i class="fas fa-keyboard"></i></span>
      </div>
      <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text"
        class="form-control" name="name-pc" placeholder="V1AMAC-CON12" maxlength="19">
    </div>
  </div>
</div>

<div class="form-row">
  <div class="col-md-6 mb-3">
    <label for="location">Ubicación:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><img src="{{ asset('svg/aim.svg') }}" width="20px" alt="" /></span>
      </div>
      <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text"
        class="form-control" name="location" placeholder="" required>
    </div>
  </div>
  @can('admin')
  <div class="col-md-6 mb-3">
    <label for="campus">Sede del equipo:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-building"></i></span>
      </div>
      <select class="custom-select" name="campus" required>
        <option selected disabled>Seleccione sede...</option>
        @foreach ($campus as $campu)
        <option value="{{ $campu->id }}">{{ $campu->campu_name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  @endcan
  @can('TEC_MAC')
  <div class="col-md-6 mb-3 d-none">
    <label for="campus">Sede del equipo:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-building"></i></span>
      </div>
      <select class="custom-select" name="campus">
        @foreach ($mac_campus as $mac_campu)
        <option value="{{ $mac_campu->id }}" selected>{{ $mac_campu->campu_name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  @endcan
  @can('TEC_S85')
  <div class="col-md-6 mb-3 d-none">
    <label for="campus">Sede del equipo:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-building"></i></span>
      </div>
      <select class="custom-select" name="campus">
        @foreach ($s85_campus as $s85_campu)
        <option value="{{ $s85_campu->id }}" selected>{{ $s85_campu->campu_name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  @endcan
  @can('TEC_COMP')
  <div class="col-md-6 mb-3 d-none">
    <label for="campus">Sede del equipo:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-building"></i></span>
      </div>
      <select class="custom-select" name="campus">
        @foreach ($comp_campus as $comp_campu)
        <option value="{{ $comp_campu->id }}" selected>{{ $comp_campu->campu_name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  @endcan
  @can('TEC_MTRZ')
  <div class="col-md-6 mb-3 d-none">
    <label for="campus">Sede del equipo:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-building"></i></span>
      </div>
      <select class="custom-select" name="campus">
        @foreach ($mtrz_campus as $mtrz_campu)
        <option value="{{ $mtrz_campu->id }}" selected>{{ $mtrz_campu->campu_name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  @endcan
  @can('TEC_CTRY')
  <div class="col-md-6 mb-3 d-none">
    <label for="campus">Sede del equipo:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-building"></i></span>
      </div>
      <select class="custom-select" name="campus">
        @foreach ($ctry_campus as $ctry_campu)
        <option value="{{ $ctry_campu->id }}" selected>{{ $ctry_campu->campu_name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  @endcan
  @can('TEC_C30')
  <div class="col-md-6 mb-3 d-none">
    <label for="campus">Sede del equipo:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-building"></i></span>
      </div>
      <select class="custom-select" name="campus">
        @foreach ($c30_campus as $c30_campus)
        <option value="{{ $c30_campus->id }}" selected>{{ $c30_campus->campu_name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  @endcan
  @can('TEC_SSJ')
  <div class="col-md-6 mb-3 d-none">
    <label for="campus">Sede del equipo:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-building"></i></span>
      </div>
      <select class="custom-select" name="campus">
        @foreach ($ssj_campus as $ssj_campu)
        <option value="{{ $ssj_campu->id }}" selected>{{ $ssj_campu->campu_name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  @endcan
  @can('TEC_C16')
  <div class="col-md-6 mb-3 d-none">
    <label for="campus">Sede del equipo:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-building"></i></span>
      </div>
      <select class="custom-select" name="campus">
        @foreach ($c16_campus as $c16_campu)
        <option value="{{ $c16_campu->id }}" selected>{{ $c16_campu->campu_name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  @endcan
  @can('TEC_KNY')
  <div class="col-md-6 mb-3 d-none">
    <label for="campus">Sede del equipo:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-building"></i></span>
      </div>
      <select class="custom-select" name="campus">
        @foreach ($kny_campus as $kny_campu)
        <option value="{{ $kny_campu->id }}" selected>{{ $kny_campu->campu_name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  @endcan
  @can('TEC_CNG')
  <div class="col-md-6 mb-3 d-none">
    <label for="campus">Sede del equipo:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-building"></i></span>
      </div>
      <select class="custom-select" name="campus">
        @foreach ($cng_campus as $cng_campu)
        <option value="{{ $cng_campu->id }}" selected>{{ $cng_campu->campu_name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  @endcan
  @can('TEC_MAR')
  <div class="col-md-6 mb-3 d-none">
    <label for="campus">Sede del equipo:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-building"></i></span>
      </div>
      <select class="custom-select" name="campus">
        @foreach ($mar_campus as $mar_campu)
        <option value="{{ $mar_campu->id }}" selected>{{ $mar_campu->campu_name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  @endcan
  @can('TEC_RIO')
  <div class="col-md-6 mb-3 d-none">
    <label for="campus">Sede del equipo:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-building"></i></span>
      </div>
      <select class="custom-select" name="campus">
        @foreach ($rio_campus as $rio_campu)
        <option value="{{ $rio_campu->id }}" selected>{{ $rio_campu->campu_name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  @endcan
  @can('TEC_C12')
  <div class="col-md-6 mb-3 d-none">
    <label for="campus">Sede del equipo:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-building"></i></span>
      </div>
      <select class="custom-select" name="campus">
        @foreach ($c12_campus as $c12_campu)
        <option value="{{ $c12_campu->id }}" selected>{{ $c12_campu->campu_name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  @endcan
  @can('TEC_VDP')
  <div class="col-md-6 mb-3 d-none">
    <label for="campus">Sede del equipo:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-building"></i></span>
      </div>
      <select class="custom-select" name="campus">
        @foreach ($vdp_campus as $vdp_campu)
        <option value="{{ $vdp_campu->id }}" selected>{{ $vdp_campu->campu_name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  @endcan
</div>

<!--<div class="form-group">
    <label for="exampleFormControlFile1">Subir imagen del equipo:</label>
    <input type="file" accept=".jpg, .png, .gif, .svg" class="form-control-file" name="icon" id="icon">
</div>-->

<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Observacion:</span>
  </div>
  <textarea class="form-control" maxlength="200" id="" name="comment" aria-label="With textarea"></textarea>
</div>

<!--<div class="modal-footer">
    @can('admin')<a href="{{ route('machines.index') }}">
        <button type="button" class="btn btn-secondary">Atras</button></a>
    @endcan
    @can('TEC_CNG')<a href="{{ route('cienaga.index') }}">
        <button type="button" class="btn btn-secondary">Atras</button></a>
    @endcan
    <button type="reset" class="btn btn-secondary">Borrar todo</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>-->

@include('machines.footer')