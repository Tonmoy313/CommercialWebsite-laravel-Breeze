<!DOCTYPE html>
<html lang="en">
    @include('backend.layouts.header')
<body class="sb-nav-fixed">
    @include('backend.layouts.navbar')
    <div id="layoutSidenav">
        @include('backend.layouts.nav-side')
        <div id="layoutSidenav_content">
            <main>
                @yield("mainContent")      
            </main>
            @include('backend.layouts.copyright')
        </div>
    </div>
    @include('backend.layouts.footer')
</body>
</html>