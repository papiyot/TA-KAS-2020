@extends('layouts.app')
@section('title')Barang @endsection
@section('content')
<div class="col-md-12">
    <!-- Material (floating) Register -->
    @if(Auth::user()->jabatan!='pemilik')
    <div class="block block-themed @if(session()->has('status')) 'block-mode-hidden' @else {{$data->class}} @endif">
        <div class="block-header bg-gd-primary">
            <h3 class="block-title" style="font-size: 2rem;">{{$data->action}} Barang </h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
            </div>
        </div>
        <div class="block-content">
            <form action="{{ route('master.store',['barang', 'BR-']) }}" method="post"> @csrf
                <div class="form-group row">
                    <div class="col-12 col-sm-6 col-md-4 ">
                        <div class="form-material floating">
                            <input type="hidden" class="form-control" id="barang_id" name="barang_id" value="@php echo ($data->edit) ? $data->edit->barang_id: ''; @endphp">
                            @if($data->edit)
                            <input type="hidden" class="form-control" id="barang_nama_old" name="barang_nama_old" required value="@php echo ($data->edit) ? $data->edit->barang_nama: null; @endphp">
                            @endif
                            <input type="text" class="form-control" id="barang_nama" name="barang_nama" required value="@php echo ($data->edit) ? $data->edit->barang_nama: old('barang_nama'); @endphp">
                            @if(session()->has('status')) <p class="text-danger">{{ session()->get('status') }}</p> @endif
                            <label for="barang_nama">Nama Barang</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 ">
                        <div class="form-material floating">
                            <input type="number" min="0" class="form-control" id="barang_harga_pembelian" name="barang_harga_pembelian" required value="@php echo ($data->edit) ? $data->edit->barang_harga_pembelian: old('barang_harga_pembelian'); @endphp">
                            <label for="barang_harga_pembelian">Harga Pembelian</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 ">
                        <div class="form-material floating">
                            <input type="number" min="0" max="50" class="form-control" id="barang_margin" name="barang_margin" required value="@php echo ($data->edit) ? $data->edit->barang_margin: old('barang_margin'); @endphp">
                            <label for="barang_margin">Margin Penjualan</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 ">
                        <div class="form-material floating">
                            <input type="number" min="0" class="form-control" id="barang_stok" name="barang_stok" required value="@php echo ($data->edit) ? $data->edit->barang_stok: old('barang_stok'); @endphp">
                            <label for="barang_stok">Stok Barang</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 ">
                        <div class="form-material floating">
                            <input type="text" class="form-control" id="barang_satuan" name="barang_satuan" required value="@php echo ($data->edit) ? $data->edit->barang_satuan: old('barang_satuan'); @endphp">
                            <label for="barang_satuan">Satuan Barang</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row"></div>
                <div class="dropdown-divider"></div>
                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-alt-primary">
                            <i class="fa fa-plus mr-5"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-alt-secondary">
                            <i class="fa fa-minus mr-5"></i> Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif
    <!-- END Material (floating) Register -->

    <div class="block block-themed">
        <div class="block-header bg-gd-primary">
            <h3 class="block-title" style="font-size: 2rem;">Daftar Barang </h3>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>NAMA</th>
                            <th class="text-right">HARGA PEMBELIAN</th>
                            <th class="text-center">Margin %</th>
                            <th class="text-right">HARGA PENJUALAN</th>
                            <th>STOK</th>
                            <th>SATUAN</th>
                            @if(Auth::user()->jabatan!='pemilik')
                            <th class="text-center">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach($data->list as $list)
                        @php $harga=$list->barang_harga_pembelian+(($list->barang_harga_pembelian/100)*$list->barang_margin); @endphp
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td class="font-w600 text-uppercase text-primary">{{$list->barang_nama}}</td>
                            <td class="text-right" style="width: 15%;">@rp($list->barang_harga_pembelian)</td>
                            <td class="text-center">{{$list->barang_margin}}%</td>
                            <td class="text-right" style="width: 15%;">@rp($harga)</td>
                            <td>{{$list->barang_stok}}</td>
                            <td class="text-uppercase">{{$list->barang_satuan}}</td>
                            @if(Auth::user()->jabatan!='pemilik')
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('master',['barang', $list->barang_id]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" data-toggle="confirmation" data-popout="true" data-title="Hapus Data ini?" href="{{ route('delete',['barang', $list->barang_id]) }}"><i class="fa fa-times"></i></a>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @php $no++; @endphp @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection