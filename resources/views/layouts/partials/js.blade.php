<script src="{{ asset('assets/js/codebase.core.min.js')}}"></script>
<script src="{{ asset('assets/js/codebase.app.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/be_tables_datatables.min.js')}}"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap-confirmation2/dist/bootstrap-confirmation.min.js"></script>
<script>
    $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
        // other options
    });
    // Swal.fire({
    //     title: 'Error!',
    //     text: 'Do you want to continue',
    //     icon: 'error',
    //     confirmButtonText: 'Cool'
    // })
</script>
@yield('js')
