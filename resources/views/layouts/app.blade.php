<!doctype html>
<html lang="en" class="no-focus">
@include('layouts.partials.css')
<body>

<div id="page-container" class="enable-cookies sidebar-o enable-page-overlay side-scroll page-header-modern page-header-fixed main-content-boxed sidebar-inverse">
@include('layouts.partials.menu')
@include('layouts.partials.header')
<!-- Main Container -->
    <main id="main-container">
        <!-- Modal Saldo -->
    <div class="modal fade" id="modal-saldo" tabindex="-1" role="dialog" aria-labelledby="modal-saldo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-saldo" role="document">
            <div class="modal-content">
                <form action="{{ route('master.saldo') }}" method="post" > @csrf
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary">
                            <h3 class="block-title">Tambah Modal</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material">
                                        <input type="number" min="0" class="form-control" id="kas_debet" name="kas_debet">
                                        <label for="kas_debet">Modal</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-alt-success" >
                            <i class="fa fa-check"></i> Ubah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Modal Saldo -->
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
