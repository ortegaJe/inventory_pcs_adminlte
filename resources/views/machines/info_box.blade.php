<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <?php $global_atril_count = DB::table('machines')->where('status_deleted_at', '=', [1])->where('type_id', '=', [2])->count(); ?>
                <h3>{{ $global_atril_count ?? '0' }}</h3>
                <?php $mac_campu = DB::table('types')->get();?>
                <p><b>{{$mac_campu[1]->name}}</b> Registrados</p>
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
                <?php $global_pc_count = DB::table('machines')->where('status_deleted_at', '=', [1])->where('type_id', '=', [1])->count(); ?>
                <h3>{{ $global_pc_count ?? '0' }}</h3>
                <?php $mac_campu = DB::table('types')->get();?>
                <p><b>{{$mac_campu[0]->name}}</b> Registrados</p>
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
                <?php $global_laptop_count = DB::table('machines')->where('status_deleted_at', '=', [1])->where('type_id', '=', [3])->count(); ?>
                <h3>{{ $global_laptop_count ?? '0' }}</h3>

                <?php $mac_campu = DB::table('types')->get();?>
                <p><b>{{$mac_campu[2]->name}}</b> Registrados</p>
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
                <?php $global_berry_count = DB::table('machines')->where('status_deleted_at', '=', [1])->where('type_id', '=', [4])->count(); ?>
                <h3>{{ $global_berry_count ?? '0' }}</h3>

                <?php $mac_campu = DB::table('types')->get();?>
                <p><b>{{$mac_campu[3]->name}}</b> Registrados</p>
            </div>
            <div class="icon">
                <i class="fab fa-raspberry-pi"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>