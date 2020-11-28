<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <?php $cng_atril_count = DB::table('machines')
                                     ->select('type_id', 'campus_id', 'status', 'deleted_at')
                                     ->where('status', '=', [1])
                                     ->where('deleted_at', '=', NULL)
                                     ->where('type_id', '=', [2]) //id en la tabla types
                                     ->where('campus_id', '=', [14]) //id en la tabla campus
                                     ->count(); ?>
                <h3>{{ $cng_atril_count ?? '0' }}</h3>

                <?php $cng_type_atril = DB::table('types')->get();?>
                <p><b>{{$cng_type_atril[1]->name}}</b> Registrados</p>
                <!--posición en la tabla types apartir de 0-->
            </div>
            <div class="icon">
                <i class="fas fa-ticket-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <?php $cng_pc_count = DB::table('machines')
                                     ->select('type_id', 'campus_id', 'status')
                                     ->where('status', '=', [1])
                                     ->where('deleted_at', '=', NULL)
                                     ->where('type_id', '=', [1])
                                     ->where('campus_id', '=', [14])
                                     ->count(); ?>
                <h3>{{ $cng_pc_count ?? '0' }}</h3>

                <?php $cng_type_pc = DB::table('types')->get();?>
                <p><b>{{$cng_type_pc[0]->name}}</b> Registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-desktop"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-purple">
            <div class="inner">
                <?php $cng_laptop_count = DB::table('machines')
                                      ->select('type_id', 'campus_id', 'status')
                                      ->where('status', '=', [1])
                                      ->where('deleted_at', '=', NULL)
                                      ->where('type_id', '=', [3])
                                      ->where('campus_id', '=', [14])
                                      ->count(); ?>
                <h3>{{ $cng_laptop_count ?? '0' }}</h3>

                <?php $cng_type_laptop = DB::table('types')->get();?>
                <p><b>{{$cng_type_laptop[2]->name}}</b> Registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-laptop"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-maroon">
            <div class="inner">
                <?php $mac_berry_count = DB::table('machines')
                                     ->select('type_id', 'campus_id', 'status')
                                     ->where('status', '=', [1])
                                     ->where('deleted_at', '=', NULL)
                                     ->where('type_id', '=', [4])
                                     ->where('campus_id', '=', [14])
                                     ->count(); ?>
                <h3>{{ $mac_berry_count ?? '0' }}</h3>

                <?php $cng_type_berry = DB::table('types')->get();?>
                <p><b>{{$cng_type_berry[3]->name}}</b> Registrados</p>
            </div>
            <div class="icon">
                <i class="fab fa-raspberry-pi"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>