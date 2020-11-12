<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <?php $c30_atril_count = DB::table('machines')
                                  ->select('type_id', 'campus_id')
                                  ->where('type_id', '=', [2]) //id en la tabla types
                                  ->where('campus_id', '=', [2]) //id en la tabla campus
                                  ->count(); ?>
                <h3>{{ $c30_atril_count ?? '0' }}</h3>

                <?php $c30_campu = DB::table('types')->get();?>
                <p><b>{{$c30_campu[1]->name}}</b> Registrados</p>
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
                <?php $pc_count = DB::table('machines')
                                  ->select('type_id', 'campus_id')
                                  ->where('type_id', '=', [1])
                                  ->where('campus_id', '=', [2])
                                  ->count(); ?>
                <h3>{{ $pc_count ?? '0' }}</h3>

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
        <div class="small-box bg-warning">
            <div class="inner">
                <?php $laptop_count = DB::table('machines')
                                  ->select('type_id', 'campus_id')
                                  ->where('type_id', '=', [3])
                                  ->where('campus_id', '=', [2])
                                  ->count(); ?>
                <h3>{{ $laptop_count ?? '0' }}</h3>

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
        <div class="small-box bg-danger">
            <div class="inner">
                <?php $berry_count = DB::table('machines')
                                      ->select('type_id', 'campus_id')
                                      ->where('type_id', '=', [4])
                                      ->where('campus_id', '=', [2])
                                      ->count(); ?>
                <h3>{{ $berry_count ?? '0' }}</h3>

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