@extends('layouts.app')
@section('title')Supplier @endsection
@section('content')
<div class="col-md-12">
    <!-- Material (floating) Register -->
    <div class="block block-themed  @if(session()->has('status')) 'block-mode-hidden' @else {{$data->class}} @endif">
        <div class="block-header bg-gd-primary">
            <h3 class="block-title">{{$data->action}} Supplier</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
            </div>
        </div>
        <div class="block-content">
            <form action="{{ route('master.store',['supplier', 'SP-']) }}" method="post"> @csrf
                <div class="form-group row">
                    <div class="col-12 col-sm-6 col-md-4 ">
                        <div class="form-material floating">
                            <input type="hidden" class="form-control" id="supplier_id" name="supplier_id" value="@php echo ($data->edit) ? $data->edit->supplier_id: ''; @endphp">
                            <input type="text" class="form-control" id="supplier_nama" name="supplier_nama" required value="@php echo ($data->edit) ? $data->edit->supplier_nama: old('supplier_nama'); @endphp">
                            @if(session()->has('status')) <p class="text-danger">{{ session()->get('status') }}</p> @endif
                            <label for="supplier_nama">Nama Supplier</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 ">
                        <div class="form-material floating">
                            <input type="text" class="form-control" id="supplier_telp" name="supplier_telp" required value="@php echo ($data->edit) ? $data->edit->supplier_telp: old('supplier_telp'); @endphp">
                            <label for="supplier_telp">Telp Supplier</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 ">
                        <div class="form-material floating">
                            <textarea type="text" class="form-control" id="supplier_alamat" name="supplier_alamat" required>@php echo ($data->edit) ? $data->edit->supplier_alamat: old('supplier_alamat'); @endphp</textarea>
                            <label for="supplier_alamat">Alamat Supplier</label>
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
            <h3 class="block-title">Supplier Table</h3>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>NAMA</th>
                            <th>Kontak</th>
                            <th>Alamat</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach($data->list as $list)
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td class="font-w600 text-uppercase text-primary">{{$list->supplier_nama}}</td>
                            <td>{{$list->supplier_telp}}</td>
                            <td class="font-w300 font-size-sm text-uppercase text-secondary">{{$list->supplier_alamat}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('master',['supplier', $list->supplier_id]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" data-toggle="confirmation" data-popout="true" data-title="Hapus Data ini?" href="{{ route('delete',['supplier', $list->supplier_id]) }}"><i class="fa fa-times"></i></a>
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