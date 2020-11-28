@section('footer')
<!-- footer -->
<section>
    @yield('footer-page')
    <footer class="main-footer">
        <strong>Inventory Machines Project
            <div class="float-left d-none d-sm-inline-block" style="margin-right: 0.2em">
                <a href="https://laravel.com/" target="_blank" rel="noopener noreferrer"><img
                        src="{{ asset('dist/img/svg/laravel.svg') }}" alt="larevel-icon" width="25px"></a>
            </div>
            <div class="float-left d-none d-sm-inline-block" style="margin-right: 0.2em">
                <a href="https://github.com/ortegaJe/laravelnventor" target="_blank" rel="noopener noreferrer"><img
                        src="{{ asset('dist/img/svg/github-icon.svg') }}" alt="" width="25px"></a>
            </div>

            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.2
            </div>
    </footer>
</section>
@endsection