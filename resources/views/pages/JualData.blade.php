@extends('layouts.app')
@section('title')Data Penjualan @endsection
@section('content')
    <div class="col-md-12">
        <div class="block block-themed block-rounded">
            <div class="block-header bg-gd-primary">
                <h3 class="block-title">
                    <a  href="{{ route('jual.transaksi') }}" class="btn btn-alt-primary">
                        <i class="fa fa-plus mr-5"></i> Penjualan
                    </a>
                </h3>

                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                </div>
            </div>
            <div class="block-content">
                <!-- Orders Table -->
                <div class="table-responsive">
                    <table class="table table-borderless table-striped js-dataTable-full-pagination">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 10%;">#</th>
                            <th>Nota</th>
                            <th>Tanggal</th>
                            <th class="text-right">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                        @foreach($data->list as $list)
                            <tr>
                                <td class="text-center font-w600 text-secondary text-uppercase">
                                    {{$no}}
                                </td>
                                <td class="font-w600 text-primary text-uppercase">
                                    {{$list->jual_id}}
                                </td>
                                <td class="font-w600 text-secondary text-uppercase">
                                    @date($list->jual_tgl)
                                </td>
                                <td class="text-right font-w600 text-primary ">
                                    @rp($list->jual_total)
                                </td>
                            </tr>
                            @php $no++; @endphp @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- END Orders Table -->

            </div>
        </div>
    </div>
@endsection
