@extends('adminlte::page')

@section('title', 'Registro de equipo')

@section('content')
<div class="col-20">
  <div class="col-sm-12 mx-auto">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title" style="font-weight: 700; font-size:20px">Registrar Equipo en:
          {{ $name_campu_table_index[14]->campu_name }}
        </h3>
      </div>
      <div class="card-body">
        <form action="/sedes/country" method="POST">
          @csrf
          @if ($errors->any())
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Upsss!</h5>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          @include('machines.fields_create')
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

@endsection

@push('js')
<script>
  $('.alert').slideDown();
    setTimeout(function(){ $('.alert').slideUp(); }, 10000);
</script>
@endpush