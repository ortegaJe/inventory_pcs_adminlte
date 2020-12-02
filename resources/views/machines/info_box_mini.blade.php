<div class="col-md-12 mx-auto p-2">
    <!-- Info Boxes Style 2 -->
    <div class="info-box mb-3 bg-warning">
        <span class="info-box-icon"><i class="fas fa-building"></i></span>

        <div class="info-box-content">
            <?php $global_campus_count = DB::table('campus')
                                          ->select('campus*.')
                                          ->count();?>
            <span class="info-box-text">Numero de sedes</span>
            <span class="info-box-number">{{ $global_campus_count }}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    <div class="info-box mb-3 bg-success">
        <span class="info-box-icon"><i class="far fa-heart"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Mentions</span>
            <span class="info-box-number">92,050</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    <div class="info-box mb-3 bg-danger">
        <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Downloads</span>
            <span class="info-box-number">114,381</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    <div class="info-box mb-3 bg-info">
        <span class="info-box-icon"><i class="far fa-comment"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Direct Messages</span>
            <span class="info-box-number">163,921</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->

    <!-- /.card -->
</div>