@extends('layouts.app')
@section('title')Barang @endsection
@section('content')
    {{$data->id}}
    <div class="col-md-12">
        <!-- Material (floating) Register -->
        <div class="block block-themed {{$data->class}}">
            <div class="block-header bg-gd-primary">
                <h3 class="block-title">Barang</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('barang.store') }}" method="post" > @csrf
                    <div class="form-group row">
                        <div class="col-12 col-md-4 col-sm-4">
                            <div class="form-material floating">
                                <input type="hidden" class="form-control" id="barang_id" name="barang_id" value="">
                                <input type="text" class="form-control" id="barang_nama" name="barang_nama" value="">
                                <label for="barang_nama">Nama Barang</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-sm-4">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="barang_harga" name="barang_harga" value="">
                                <label for="barang_harga">Harga Barang</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-sm-4">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="barang_harga_presentase" name="barang_harga_presentase" value="">
                                <label for="barang_harga_presentase">Harga Persentase Barang</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-sm-4">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="barang_stok" name="barang_stok" value="">
                                <label for="barang_stok">Stok Barang</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-sm-4">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="barang_satuan" name="barang_satuan" value="">
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
                <table class="table table-hover table-vcenter">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>Name</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th class="text-center" scope="row">1</th>
                        <td>Alice Moore</td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-danger">Disabled</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">2</th>
                        <td>Barbara Scott</td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-danger">Disabled</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">3</th>
                        <td>Melissa Rice</td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-success">VIP</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">4</th>
                        <td>Susan Day</td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-danger">Disabled</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">5</th>
                        <td>Justin Hunt</td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-primary">Personal</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">6</th>
                        <td>Susan Day</td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-info">Business</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
