<section>
    @yield('info-box')
    <div class="content-header">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><img src="{{asset('/svg/raspberry-pi.svg')}}"
                            alt="atril.svg" width="50"></span>
                    <div class="info-box-content">
                        <span class="info-box-text">TV RASPERRY PI</span>
                        <?php $berry_count = DB::table('machines')->where('type_id', '=', [4])->count(); ?>
                        <span class="info-box-number">
                            {{ $berry_count ?? '0' }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><img src="{{asset('/svg/atril.svg')}}"
                            alt="atril.svg" width="50"></span>

                    <div class="info-box-content">
                        <span class="info-box-text">ATRIL</span>
                        <?php $atril_count = DB::table('machines')->where('type_id', '=', [2])->count(); ?>
                        <span class="info-box-number">{{ $atril_count ?? '0' }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-desktop"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">PC</span>
                        <?php $pc_count = DB::table('machines')->where('type_id', '=', [1])->count(); ?>
                        <span class="info-box-number">{{ $pc_count ?? '0' }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><img src="{{asset('/svg/laptop-solid.svg')}}"
                            alt="atril.svg" width="42"></span>

                    <div class="info-box-content">
                        <span class="info-box-text">LAPTOP</span>
                        <?php $laptop_count = DB::table('machines')->where('type_id', '=', [3])->count(); ?>
                        <span class="info-box-number">{{ $laptop_count ?? '0' }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
    </div>