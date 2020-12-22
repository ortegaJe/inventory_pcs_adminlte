@extends('adminlte::page')

@section('title', 'Actualizar equipo')

@section('content')
<div class="col-20">
  <div class="col-sm-12 mx-auto">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title" style="font-weight: 700; font-size:20px">Actualizar Equipo | {{ $machine->serial }}
        </h3>
      </div>
      <div class="card-body">
        <form action="{{ route('country.update', $machine->id ) }}" method="POST">
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
          @include('machines.fields_update')
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

@endsection