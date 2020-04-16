@extends('layouts.app')
@section('title')Biaya @endsection
@section('content')
    <div class="col-md-12">
        <!-- Material (floating) Register -->
        <div class="block block-themed {{$data->class}}">
            <div class="block-header bg-gd-primary">
                <h3 class="block-title">{{$data->action}} Biaya</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('master.store',['biaya', 'BY-']) }}" method="post" > @csrf
                    <div class="form-group row">
                        <div class="col-12 col-md-12 col-sm-12">
                            <div class="form-material floating">
                                <input type="hidden" class="form-control" id="biaya_id" name="biaya_id" value="@php echo ($data->edit) ? $data->edit->biaya_id: ''; @endphp" >
                                <input type="text" class="form-control" id="biaya_nama" name="biaya_nama" value="@php echo ($data->edit) ? $data->edit->biaya_nama: ''; @endphp">
                                <label for="biaya_nama">Nama Supplier</label>
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
                <h3 class="block-title">Biaya Table</h3>
            </div>
            <div class="block-content">
                <table class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full-pagination">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th >NAMA</th>
                        <th ></th>
                        <th ></th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                    @foreach($data->list as $list)
                        <tr>
                            <td class="text-center" scope="row">{{$no}}</td>
                            <td >{{$list->biaya_nama}}</td>
                            <td ></td>
                            <td ></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('master',['biaya', $list->biaya_id]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" data-toggle="confirmation" data-popout="true" data-title="Hapus Data ini?"
                                       href="{{ route('delete',['biaya', $list->biaya_id]) }}" ><i class="fa fa-times"></i></a>
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
