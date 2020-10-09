@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <div class="card-title text-center">
            <h2 style="font-weight: 700">Discos Duros</h2>
          </div>
          @include('hdd.modalHdd')
          <div class="card-body pad">
            <table class="table table-hover table-bordered">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="text-center">
                    <i class="fas fa-hdd"></i>
                  </th>
                  <th class="text-center">Tipo</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($hdds as $hdd)
                <tr>
                  <th>
                    <h6>{{ $hdd->size }}
                  </th>
                  <th>
                    <h6>{{ $hdd->type }}
                  </th>
                  </h6>
                  <th>
                    <form action="{{ route('hdd.destroy', $hdd->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn bg-gradient-danger btn-sm"><i
                          class="fas fa-trash-alt"></i></button>
                    </form>
                  </th>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection