@section('footer')
<!-- footer -->
<section>
    @yield('footer-page')
    <footer class="main-footer">
        <div class="float-left d-none d-sm-inline-block" style="margin-right: 0.2em">
            <a href="https://laravel.com/" target="_blank" rel="noopener noreferrer"><img
                    src="{{ asset('dist/img/svg/laravel.svg') }}" alt="larevel-icon" width="25px"></a>
        </div>
        <div class="float-left d-none d-sm-inline-block" style="margin-right: 0.2em">
            <a href="https://github.com/ortegaJe/laravelnventor" target="_blank" rel="noopener noreferrer"><img
                    src="{{ asset('dist/img/svg/github-icon.svg') }}" alt="" width="25px"></a>
        </div>
        <div class="float-left d-none d-sm-inline-block small mt-2">
            <span>Inventory Machines Project</span>
        </div>
        <div class="float-right d-none d-sm-inline-block small mt-2">
            <?php $last_update = DB::table('users')->select('last_sign_in_at')->where('id', '=', 1)->get() ?>
            <span>Ultima actualizacion:
                {{ \Carbon\Carbon::parse($last_update[0]->last_sign_in_at)->toDayDateTimeString() }}</span> |
            <b>Version 1.2</b>
        </div>
    </footer>
</section>
@endsection