@extends('layouts.app')

@section('content')

<div class="content-fluid">
    <div class="col-20">
        <div class="col-md-8 mt-4 mx-auto">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-info">
                    <h3 class="widget-user-username">{{ $user->name }} {{ $user->last_name }}</h3>
                    <h5 class="widget-user-desc">{{ $user->work_function }}</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="{{ asset('upload/'.$user->image) }}"
                        alt="{{ asset('upload/'.$user->image) }}">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{ $user->cc }}</h5>
                                <span class="description-text">ID</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{ $user->nick_name }}</h5>
                                <span class="description-text">NICK NAME</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">{{ $user->email }}</h5>
                                <span class="description-text">EMAIL</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{ $user->phone }}</h5>
                                <span class="description-text">PHONE</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">
                                    @foreach ($campus as $campu)
                                    @if($campu->id == $user->campus_id)
                                    {{ $campu->name }}
                                    @endif
                                    @endforeach
                                </h5>
                                <span class="description-text">CAMPUS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header"></h5>
                                <span class="description-text"></span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
    </div>
</div>

@endsection