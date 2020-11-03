<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Inventor | @yield('title')</title>
  <link rel="icon" type="image/svg" href="{{ asset('dist/img/svg/server-storage.svg')}}" />

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js" defer>
  </script>@stack('scripts')
  <script src="dist/js/adminlte.js"></script>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
</head>
<!--class="hold-transition sidebar-mini layout-fixed"-->
<!--class="sidebar-mini sidebar-collapse" style="height: auto;"-->

<body class="hold-transition sidebar-mini layout-fixed">
  <div id="app">
    <div class="wrapper">

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Brad Diesel
                      <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      John Pierce
                      <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Nora Silvester
                      <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-collapse sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" class="brand-link">
          <img src="{{ asset('dist/img/svg/server-storage.svg') }}" alt="Inventor Machines Logo"
            class="brand-image elevation-3" style="opacity: 1.2">
          <span class="brand-text font-weight-light">Inventor</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
              <a href="#" class="d-block">
                @guest
                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                @else
                <div class="image">
                  <img src="{{ asset('upload/'.Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="image">
                  {{ Auth::user()->nick_name }}
                </div>
                <div class="image" style="color: aliceblue"><a>
                    <p><i class="fa fa-circle text-success"></i> Online</p>
                  </a></div>
                <div class="image">
                  <a class="nav-item mt-6" href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-power-off text-red"></i>
                    Cerrar Sesión
                  </a>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>

                @endguest
              </a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

              <li class="nav-item has-treeview menu-open">
                <ul class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </ul>
                <ul class="nav nav-treeview" style="display: block;">
                  <li class="nav-item">
                    <a href="/" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                      <i class="nav-icon fas fa-home"></i>
                      <p>Home</p>
                    </a>
                  </li>
                  @can('ADMINISTRATOR')
                  <li class="nav-item">
                    <a href="{{ url('technicians') }}"
                      class="{{ Request::path() === 'technicians' ? 'nav-link active' : 'nav-link' }}">
                      <i class="nav-icon fas fa-users"></i>
                      <p>
                        Usuarios
                        <?php $users_count = DB::table('users')->count(); ?>
                        <span class="right badge badge-warning">{{ $users_count ?? '0' }}</span>
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('roles') }}"
                      class="{{ Request::path() === 'roles' ? 'nav-link active' : 'nav-link' }}">
                      <i class="fas fa-users-cog"></i>
                      <p>
                        Roles
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('campus') }}"
                      class="{{ Request::path() === 'campus' ? 'nav-link active' : 'nav-link' }}">
                      <i class="fas fa-building"></i>
                      <p>
                        Sedes
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('machines') }}"
                      class="{{ Request::path() === 'machines' ? 'nav-link active' : 'nav-link' }}">
                      <i class="nav-icon fas fa-desktop"></i>
                      <p>
                        Equipos
                        <?php $machines_count = DB::table('machines')->count(); ?>
                        <span class="right badge badge-warning">{{ $machines_count ?? '0' }}</span> </p>
                    </a>
                  </li>
                  <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-tools"></i>
                      <p>Partes<i class="fas fa-angle-left right"></i></p>
                    </a>

                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ url('parts') }}"
                          class="{{ Request::path() === 'parts' ? 'nav-link active' : 'nav-link' }}">
                          <i class="fas fa-th-large nav-icon"></i>
                          <p>Categorias</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ url('ram')}}"
                          class="{{ Request::path() === 'ram' ? 'nav-link active' : 'nav-link' }}">
                          <i class="fas fa-memory nav-icon"></i>
                          <p>Memorias RAM</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ url('hdd')}}"
                          class="{{ Request::path() === 'hdd' ? 'nav-link active' : 'nav-link' }}">
                          <i class="fas fa-hdd nav-icon"></i>
                          <p>Discos Duros</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ url('type')}}"
                          class="{{ Request::path() === 'type' ? 'nav-link active' : 'nav-link' }}">
                          <i class="fas fa-project-diagram nav-icon"></i>
                          <p>Tipo de equipos</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  @endcan
                  <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-building"></i>
                      <p>Mis sedes<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                      @can('TÉCNICO CARRERA 16')
                      <li class="nav-item">
                        <a href="{{ url('sedes/carrera_16') }}"
                          class="{{ Request::path() === 'sedes/carrera_16' ? 'nav-link active' : 'nav-link' }}">
                          <i class="fas fa-building nav-icon"></i>
                          <?php $c16_campu = DB::table('campus')->get();?>
                          <p class="text-lowercase">{{$c16_campu[2]->campu_name}}</p>
                          <?php $machines_count = DB::table('machines')->where('campus_id', '=', [4])->count(); ?>
                          <span class="right badge badge-primary">{{ $machines_count ?? '0' }}</span> </p>
                        </a>
                      </li>
                      @endcan
                      @can('TECNICO CALLE 30')
                      <li class="nav-item">
                        <a href="{{ url('sedes/calle_30') }}"
                          class="{{ Request::path() === 'sedes/calle_30' ? 'nav-link active' : 'nav-link' }}">
                          <i class="fas fa-building nav-icon"></i>
                          <?php $ssj_campu = DB::table('campus')->get();?>
                          <p class="text-lowercase">{{$ssj_campu[1]->campu_name}}</p>
                          <?php $machines_count = DB::table('machines')->where('campus_id', '=', [2])->count(); ?>
                          <span class="right badge badge-primary">{{ $machines_count ?? '0' }}</span> </p>
                        </a>
                      </li>
                      @endcan
                      @can('TECNICO MACARENA')
                      <li class="nav-item">
                        <a href="{{ url('sedes/macarena') }}"
                          class="{{ Request::path() === 'sedes/macarena' ? 'nav-link active' : 'nav-link' }}">
                          <i class="fas fa-building nav-icon"></i>
                          <?php $mac_campu = DB::table('campus')->get();?>
                          <p class="text-lowercase">{{$mac_campu[0]->campu_name}}</p>
                          <?php $machines_count = DB::table('machines')->where('campus_id', '=', [1])->count(); ?>
                          <span class="right badge badge-primary">{{ $machines_count ?? '0' }}</span> </p>
                        </a>
                      </li>
                      @endcan
                      @can('TECNICO SOLEDAD')
                      <li class="nav-item">
                        <a href="{{ url('sedes/soledad') }}"
                          class="{{ Request::path() === 'sedes/soledad' ? 'nav-link active' : 'nav-link' }}">
                          <i class="fas fa-building nav-icon"></i>
                          <?php $ssj_campu = DB::table('campus')->get();?>
                          <p class="text-lowercase">{{$ssj_campu[3]->campu_name}}</p>
                          <?php $machines_count = DB::table('machines')->where('campus_id', '=', [5])->count(); ?>
                          <span class="right badge badge-primary">{{ $machines_count ?? '0' }}</span> </p>
                        </a>
                      </li>
                      @endcan
                      @can('TECNICO SURA SAN JOSE')
                      <li class="nav-item">
                        <a href="{{ url('sedes/sura_san_jose') }}"
                          class="{{ Request::path() === 'sedes/sura_san_jose' ? 'nav-link active' : 'nav-link' }}">
                          <i class="fas fa-building nav-icon"></i>
                          <?php $ssj_campu = DB::table('campus')->get();?>
                          <p class="text-lowercase">{{$ssj_campu[4]->campu_name}}</p>
                          <?php $machines_count = DB::table('machines')->where('campus_id', '=', [6])->count(); ?>
                          <span class="right badge badge-primary">{{ $machines_count ?? '0' }}</span> </p>
                        </a>
                      </li>
                      @endcan
                    </ul>
                  </li>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          @yield('content')
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <!-- footer -->
        <strong>Inventor Machines Project
          <div class="float-left d-none d-sm-inline-block" style="margin-right: 0.2em">
            <a href="https://laravel.com/" target="_blank" rel="noopener noreferrer"><img
                src="{{ asset('dist/img/svg/laravel.svg') }}" alt="larevel-icon" width="25px"></a>
          </div>
          <div class="float-left d-none d-sm-inline-block" style="margin-right: 0.2em">
            <a href="https://github.com/ortegaJe/Laravel-Inventor-Machines" target="_blank"
              rel="noopener noreferrer"><img src="{{ asset('dist/img/svg/github-icon.svg') }}" alt="" width="25px"></a>
          </div>

          <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.1
          </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
  </div>
</body>