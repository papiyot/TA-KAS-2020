<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow px-15">
            <!-- Mini Mode -->
            <div class="content-header-section sidebar-mini-visible-b">
                <!-- Logo -->
                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                            </span>
                <!-- END Logo -->
            </div>
            <!-- END Mini Mode -->

            <!-- Normal Mode -->
            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Sidebar -->

                <!-- Logo -->
                <div class="content-header-item">
                    <a class="link-effect font-w700" href="javascript:void(0)">
                        <i class="si si-fire text-primary"></i>
                        <span class="font-size-xl text-dual-primary-dark">SIA</span>-<span class="font-size-xl text-primary">KAS</span>
                    </a>
                </div>
                <!-- END Logo -->
            </div>
            <!-- END Normal Mode -->
        </div>
        <!-- END Side Header -->

        <!-- Side User -->
        <div class="content-side content-side-full content-side-user px-10 align-parent">
            <!-- Visible only in mini mode -->
            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                <img class="img-avatar img-avatar32" src="{{ asset('assets/media/avatars/avatar0.jpg') }}" alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="sidebar-mini-hidden-b text-center">
                <a class="img-link" href="javascript:void(0)">
                    <img class="img-avatar" src="{{ asset('assets/media/avatars/avatar0.jpg') }}" alt="">
                </a>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark font-size-sm font-w600 text-uppercase" href="be_pages_generic_profile.html">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="list-inline-item">
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                            <i class="si si-drop"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="link-effect text-dual-primary-dark"><i class="si si-logout"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <!-- END Visible only in normal mode -->
        </div>
        <!-- END Side User -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li>
                    <a href="{{ route('home') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Home</span></a>
                </li>
                <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Master</span></li>
                <li>
                    <a href="{{ route('master',['barang']) }}"><i class="fa fa-inbox"></i><span class="sidebar-mini-hide">Barang</span></a>
                </li>
                <li>
                    <a href="{{ route('master',['supplier']) }}"><i class="fa fa-cube"></i><span class="sidebar-mini-hide">Supplier</span></a>
                </li>
                <li>
                    <a href="{{ route('master',['biaya']) }}"><i class="si si-wallet"></i><span class="sidebar-mini-hide">Biaya</span></a>
                </li>
                <li>
                    <a href="{{ route('master',['users']) }}"><i class="si si-users"></i><span class="sidebar-mini-hide">Users</span></a>
                </li>
                <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Transaksi</span></li>
                <li>
                    <a href="{{ route('beli.list') }}"><i class="fa fa-cart-plus"></i><span class="sidebar-mini-hide">Pembelian</span></a>
                </li>
                <li>
                    <a href="{{ route('jual.list') }}"><i class="fa fa-cart-arrow-down"></i><span class="sidebar-mini-hide">Penjualan</span></a>
                </li>
                <li>
                    <a href="{{ route('biayatransaksi.transaksi') }}"><i class="fa fa-edit"></i><span class="sidebar-mini-hide">Biaya</span></a>
                </li>
                <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Jurnal</span></li>
                <li>
                    <a href="{{ route('jurnal.jpembelian') }}"><i class="fa fa-newspaper-o"></i><span class="sidebar-mini-hide">Pembelian</span></a>
                </li>
                <li>
                    <a href="{{ route('jurnal.jpenjualan') }}"><i class="fa fa-newspaper-o"></i><span class="sidebar-mini-hide">Penjualan</span></a>
                </li>
                <li>
                    <a href="{{ route('jurnal.jpenerimaankas') }}"><i class="fa fa-newspaper-o"></i><span class="sidebar-mini-hide">Penerimaan Kas</span></a>
                </li>
                <li>
                    <a href="{{ route('jurnal.jpengeluarankas') }}"><i class="fa fa-newspaper-o"></i><span class="sidebar-mini-hide">Pengeluaran Kas</span></a>
                </li>
                <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Laporan</span></li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i><span class="sidebar-mini-hide">Kas</span></a>
                </li>

            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- Sidebar Content -->
</nav>
