@extends('adminlte::page')

@section('title', 'Registro de equipo')

@section('content')

<div class="content-fluid">
  <div class="col-20">
    <div class="col-sm-8 mx-auto">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title" style="font-weight: 700; font-size:20px">Registrar Equipo en:
            {{$name_campu_table_index[1]->campu_name}}
        </div>
        <div class="card-body">
          <form action="/sedes/calle_30" method="POST">
            @csrf
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