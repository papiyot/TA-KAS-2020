@extends('layouts.app')
@section('title')Barang @endsection
@section('content')
    <div class="col-md-12">
        <!-- Material (floating) Register -->
        <div class="block block-themed {{$data->class}}">
            <div class="block-header bg-gd-primary">
                <h3 class="block-title">{{$data->action}} Barang</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('master.store',['barang', 'BR-']) }}" method="post" > @csrf
                    <div class="form-group row">
                        <div class="col-12 col-sm-6 col-md-4 ">
                            <div class="form-material floating">
                                <input type="hidden" class="form-control" id="barang_id" name="barang_id" value="@php echo ($data->edit) ? $data->edit->barang_id: ''; @endphp" >
                                <input type="text" class="form-control" id="barang_nama" name="barang_nama" value="@php echo ($data->edit) ? $data->edit->barang_nama: ''; @endphp">
                                <label for="barang_nama">Nama Barang</label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 ">
                            <div class="form-material floating">
                                <input type="number" class="form-control" id="barang_harga" name="barang_harga" value="@php echo ($data->edit) ? $data->edit->barang_harga: ''; @endphp">
                                <label for="barang_harga">Harga Barang</label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 ">
                            <div class="form-material floating">
                                <input type="number" class="form-control" id="barang_harga_presentase" name="barang_harga_presentase" value="@php echo ($data->edit) ? $data->edit->barang_harga_presentase: ''; @endphp">
                                <label for="barang_harga_presentase">Harga Persentase Barang</label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 ">
                            <div class="form-material floating">
                                <input type="number" class="form-control" id="barang_stok" name="barang_stok" value="@php echo ($data->edit) ? $data->edit->barang_stok: ''; @endphp">
                                <label for="barang_stok">Stok Barang</label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 ">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="barang_satuan" name="barang_satuan" value="@php echo ($data->edit) ? $data->edit->barang_satuan: ''; @endphp">
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
        <!-- END Material (floating) Register -->

        <div class="block block-themed">
            <div class="block-header bg-gd-primary">
                <h3 class="block-title">Barang Table</h3>
            </div>
            <div class="block-content">
                <table class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full-pagination">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>NAMA</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">HARGA</th>
                        <th class="d-none d-lg-table-cell" style="width: 15%;">% HARGA</th>
                        <th class="d-none d-md-table-cell" style="width: 15%;">STOK</th>
                        <th class="d-none d-md-table-cell" style="width: 15%;">SATUAN</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                    @foreach($data->list as $list)
                    <tr>
                        <td class="text-center" scope="row">{{$no}}</td>
                        <td>{{$list->barang_nama}}</td>
                        <td class="d-none d-sm-table-cell" style="width: 15%;">{{$list->barang_harga}}</td>
                        <td class="d-none d-lg-table-cell">{{$list->barang_harga_presentase}}</td>
                        <td class="d-none d-md-table-cell">{{$list->barang_stok}}</td>
                        <td class="d-none d-md-table-cell">{{$list->barang_satuan}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('master',['barang', $list->barang_id]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-sm btn-danger" data-toggle="confirmation" data-popout="true" data-title="Hapus Data ini?"
                                   href="{{ route('delete',['barang', $list->barang_id]) }}" ><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    @php $no++; @endphp @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
