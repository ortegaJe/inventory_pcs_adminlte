@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">{{ __('Dashboard') }}</div>

      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif
        <div class="alert alert-success alert-dismissible">
          <h4><i class="icon fas fa-check"></i> {{ __(' Hello you are logged in!') }}</h4>
          <h6>
            {{ Auth::user()->name }} {{ Auth::user()->last_name }}
            <br />
          </h6>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('content')
<div class="container">
</div>
@stop

@push('js')
<script>
  $('.alert').slideDown();
    setTimeout(function(){ $('.alert').slideUp(); }, 10000);
</script>
@endpush