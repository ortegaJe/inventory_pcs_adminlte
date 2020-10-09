@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <div class="card-title">
            <h2 style="font-weight: 700">Memorias RAM</h2>
          </div>
          @include('ram.ramsModal')
          <div class="card-body pad">
            <table class="table table-hover table-bordered">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="text-center">
                    <i class="fas fa-memory"></i>
                  </th>
                  <th scope="col">Size</th>
                  <th scope="col">Type</th>
                  <th scope="col">MHz</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($rams as $ram)
                <tr>
                  <th>
                    <h6>{{ $ram->ram }}
                  </th>
                  <th>
                    <h6>
                  </th>
                  <th>
                    <h6>
                  </th>
                  <th>
                    <h6>
                  </th>
                  </h6>
                  <th>
                    <form action="{{ route('ram.destroy', $ram->id) }}" method="POST">
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

    @endsection