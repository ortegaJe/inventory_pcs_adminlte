@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row justify-content-center">
  <!-- USERS LIST -->
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <div class="card-title">
          <h4><i class="icon fas fa-check-circle text-success"></i> {{ __(' Bienvenido!') }}</h4>
        </div>

        <div class="card-tools">
          <?php $global_users_count = DB::table('users')
                                        ->select('users*.')
                                        ->where('status', '=', [1])
                                        ->count();?>
          <span class="badge badge-success">Numeros de usuarios {{ $global_users_count }}</span>

          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">
          @foreach($users as $user)
          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">
                {{ $user->work_function }}
              </div>
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-7">
                    <h2 class="lead"><b>{{ $user->nick_name }}</b></h2>
                    <p class="text-muted text-sm">
                      {{ $user->name }} {{ $user->last_name }} </p>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                        @foreach ($campus as $campu)
                        @if($campu->id == $user->campus_id)
                        {{ $campu->campu_name }}
                        @endif
                        @endforeach
                      </li>
                      @if($user->isOnline())
                      <li class="small">
                        <span class="fa-li">
                          <i class="fas fa-dot-circle text-success mb-2"></i>
                        </span>
                        <span class="badge badge-success">Online</span>
                        Conectado:
                        {{ \Carbon\Carbon::parse($user->current_sign_in_at)->diffForHumans() }}
                      </li>
                      @else
                      <li class="small">
                        <span class="fa-li">
                          <i class="far fa-dot-circle text-muted mb-2"></i>
                        </span>
                        <span class="badge badge-secondary">Offline</span>
                        Ultima conexión:
                        {{ \Carbon\Carbon::parse($user->last_sign_in_at)->diffForHumans() }}
                      </li>
                      @endif
                    </ul>
                  </div>
                  <div class="col-5 text-center">
                    <img class="img-circle img-fluid elevation-2 img-size-64" src=" {{ asset('upload/'.$user->image) }}"
                      alt="{{ $user->image }}">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="text-right">
                  <a href="#" class="btn btn-sm btn-primary">
                    <i class="fas fa-user"></i> View Profile
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <!-- /.card-body -->
      <!-- /.card-footer -->

    </div>
  </div>
</div>
@stop

@section('content')
<div class="container">
</div>
@stop

@include('machines.footer')