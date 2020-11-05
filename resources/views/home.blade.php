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

        {{ __('You are logged in!') }}
      </div>
    </div>
  </div>
</div>
@stop

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <div class="card-title">
        <h1>Welcome to Inventory</h1>
      </div>
    </div>
    <div class="card-body">
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum laboriosam reprehenderit quo voluptate. Saepe
        magnam tenetur ipsum architecto rem laboriosam totam voluptates eius, quam quo quae laudantium recusandae
        labore possimus?</p>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="card-title">
        <h1>Welcome to Inventory</h1>
      </div>
    </div>
    <div class="card-body">
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum laboriosam reprehenderit quo voluptate. Saepe
        magnam tenetur ipsum architecto rem laboriosam totam voluptates eius, quam quo quae laudantium recusandae
        labore possimus?</p>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="card-title">
        <h1>Welcome to Inventory</h1>
      </div>
    </div>
    <div class="card-body">
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum laboriosam reprehenderit quo voluptate. Saepe
        magnam tenetur ipsum architecto rem laboriosam totam voluptates eius, quam quo quae laudantium recusandae
        labore possimus?</p>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="card-title">
        <h1>Welcome to Inventory</h1>
      </div>
    </div>
    <div class="card-body">
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum laboriosam reprehenderit quo voluptate. Saepe
        magnam tenetur ipsum architecto rem laboriosam totam voluptates eius, quam quo quae laudantium recusandae
        labore possimus?</p>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="card-title">
        <h1>Welcome to Inventory</h1>
      </div>
    </div>
    <div class="card-body">
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum laboriosam reprehenderit quo voluptate. Saepe
        magnam tenetur ipsum architecto rem laboriosam totam voluptates eius, quam quo quae laudantium recusandae
        labore possimus?</p>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="card-title">
        <h1>Welcome to Inventory</h1>
      </div>
    </div>
    <div class="card-body">
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum laboriosam reprehenderit quo voluptate. Saepe
        magnam tenetur ipsum architecto rem laboriosam totam voluptates eius, quam quo quae laudantium recusandae
        labore possimus?</p>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="card-title">
        <h1>Welcome to Inventory</h1>
      </div>
    </div>
    <div class="card-body">
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum laboriosam reprehenderit quo voluptate. Saepe
        magnam tenetur ipsum architecto rem laboriosam totam voluptates eius, quam quo quae laudantium recusandae
        labore possimus?</p>
    </div>
  </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
  console.log('Hi');
</script>
@endsection