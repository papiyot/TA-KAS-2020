<!doctype html>
<html lang="en" class="no-focus">
@include('layouts.partials.css')
<body>

<div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern page-header-fixed main-content-boxed sidebar-inverse">
@include('layouts.partials.menu')
@include('layouts.partials.header')

<!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            @yield('content')
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

    @include('layouts.partials.footer')
</div>
<!-- END Page Container -->

@include('layouts.partials.js')
</body>
</html>
