
    <button type="button" class="btn btn-success" >
        <i class="fa fa-info"></i> Saldo @rp(Session::get('saldo'))
    </button>
    @if(Auth::user()->jabatan=='kasir' || Auth::user()->jabatan=='pembelian')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-saldo">
        <i class="fa fa-plus"></i> Tambah Saldo
    </button>
    @endif
