<script src="{{ asset('assets/js/codebase.core.min.js')}}"></script>
<script src="{{ asset('assets/js/codebase.app.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/be_tables_datatables.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
{{--<script src="{{ asset('assets/js/pages/be_forms_plugins.min.js')}}"></script>--}}

{{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap-confirmation2/dist/bootstrap-confirmation.min.js"></script>
<script>
    jQuery(function() {
        Codebase.helpers(['select2']);
    });
</script>
<script>
    var input_id = null;
    var saldo = @php echo(Session::get('saldo'));@endphp;

    function getharga(sel, param) {
        let harga = $("#barang_id option:selected").attr('harga');
        $("#" + param + "_harga").val(harga);
        if (param == 'beli_detail') {
            let max = parseInt((saldo - total) / harga);
            document.getElementById('beli_detail_jml').max = max;
        }else if(param == 'jual_detail'){
            let max = $("#barang_id option:selected").attr('stok');
            document.getElementById('jual_detail_jml').max = max;
        }
    }

    function ceksaldo(param, add=null) {
        input_id = param;
        let cek_saldo =saldo;
        var x = parseInt(document.getElementById(param).value);
        (add) ? cek_saldo = saldo + parseInt(add):null;
        if (x > cek_saldo) {
            $("#modal-alert-saldo").modal();
        }
    }

    function closemodal() {
        if (input_id) {
            document.getElementById(input_id).value = '';
        }
    }

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
<script>
    $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
    });
</script>
@yield('js')