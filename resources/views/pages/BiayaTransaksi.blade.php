@extends('layouts.app')
@section('title')Transaksi Biaya @endsection
@section('content')
    <div class="col-md-12">
        <div class="row row-deck gutters-tiny">
            <!-- Billing Address -->
            <div class="col-md-12">
                <div class="block block-themed block-rounded">
                    <div class="block-header bg-gd-primary">
                        <h3 class="block-title">{{$data->action}} Transaksi Biaya </h3>
                        <div class="block-options">
                            {{$data->date}}
                        </div>
                    </div>

                    <div class="block-content">
                        <form action="{{ route('biayatransaksi.store') }}" method="post" > @csrf
                            <div class="form-group row">
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-material">
                                        <input type="hidden" class="form-control" id="biaya_detail_id" name="biaya_detail_id"  value="@php echo ($data->edit) ? $data->edit->biaya_detail_id: ''; @endphp">
                                        <select class="js-select2 form-control" id="biaya_detail_biaya_id" name="biaya_detail_biaya_id" required style="width: 100%;" >
                                            <option>--Pilih Data--</option>
                                            @foreach($data->biaya as $biaya)
                                                <option value="{{$biaya->biaya_id}}" @php echo ($data->edit) ? ($data->edit->biaya_detail_biaya_id == $biaya->biaya_id) ? 'selected': '' : null; @endphp>{{$biaya->biaya_id}} [ {{$biaya->biaya_nama}} ]</option>
                                            @endforeach
                                        </select>
                                        <label for="biaya_detail_biaya_id">Kode Biaya</label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-material">
                                        <input type="number" min="0" class="form-control" id="biaya_detail_jml" value="@php echo ($data->edit) ? $data->edit->biaya_detail_jml: ''; @endphp" name="biaya_detail_jml" required >
                                        <label for="biaya_detail_jml">Nominal biaya</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row"></div>
                            <div class="dropdown-divider"></div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-alt-primary">
                                        <i class="fa fa-plus mr-5"></i> Tambah
                                    </button>
                                    <button type="reset" class="btn btn-alt-secondary">
                                        <i class="fa fa-minus mr-5"></i> Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END Billing Address -->

        </div>
        {{--        <h2 class="content-heading">Products (5)</h2>--}}
        <div class="block block-themed block-rounded">
            <div class="block-header bg-gd-primary">
                <h3 class="block-title">Daftar Biaya</h3>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full-pagination">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th >Biaya</th>
                            <th >Tanggal</th>
                            <th class="text-right" style="width: 30%;">Nominal</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                        @foreach($data->list as $list)
                            <tr>
                                <td class="text-center" >{{$no}}</td>
                                <td class="font-w600 text-uppercase text-primary">{{$list->biaya_nama}}</td>
                                <td class="font-w600 text-secondary text-uppercase"> @date($list->biaya_detail_tgl)</td>
                                <td class="text-right text-primary"> @rp($list->biaya_detail_jml)</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('biayatransaksi.transaksi',[$list->biaya_detail_id]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger" data-toggle="confirmation" data-popout="true" data-title="Hapus Data ini?"
                                           href="{{ route('biayatransaksi.delete',[$list->biaya_detail_id]) }}" ><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @php $no++; @endphp @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
