@extends('layouts.app')
@section('title')Users @endsection
@section('content')
    <div class="col-md-12">
        <!-- Material (floating) Register -->
        <div class="block block-themed {{$data->class}}">
            <div class="block-header bg-gd-primary">
                <h3 class="block-title">{{$data->action}} Users</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('master.store',['users', 'US-']) }}" method="post" > @csrf
                    <div class="form-group row">
                        <div class="col-12 col-md-6 col-sm-4">
                            <div class="form-material floating">
                                <input type="text" required class="form-control" id="name" name="name" value="@php echo ($data->edit) ? $data->edit->name: ''; @endphp">
                                <label for="name">Nama</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-sm-4">
                            <div class="form-material floating">
                                <input type="email" required class="form-control" id="email" name="email" value="@php echo ($data->edit) ? $data->edit->email: ''; @endphp">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-sm-4">
                            <div class="form-material floating">
                                <input type="password" required class="form-control" id="password" name="password" >
                                <label for="password">Password</label>
                            </div>
                        </div>
                        @if($data->action=='Edit')
                            <div class="col-12 col-md-6 col-sm-4">
                                <div class="form-material floating">
                                    <input type="password" class="form-control" id="password_baru" name="password_baru" >
                                    <label for="password_baru">Password Baru <span>(Jika tidak merubah password dikosongkan)</span></label>
                                </div>
                            </div>
                        @endif
                        <div class="col-12 col-md-6 col-sm-4">
                            <div class="form-material floating">
                                <input type="hidden" class="form-control" id="id" name="id" value="@php echo ($data->edit) ? $data->edit->id: ''; @endphp" >
                                <select type="text" required class="form-control" id="jabatan" name="jabatan">
                                    <option>Pilih Jabatan</option>
                                    <option value="admin" @php echo ($data->edit) ? ($data->edit->jabatan=='admin') ? 'selected': '' : null; @endphp>Admin</option>
                                    <option value="manager"  @php echo ($data->edit) ? ($data->edit->jabatan=='manager') ? 'selected': '' : null; @endphp>Manager</option>
                                    <option value="pembelian"  @php echo ($data->edit) ? ($data->edit->jabatan=='pembelian') ? 'selected': '' : null; @endphp>Pembelian</option>
                                    <option value="penjualan"  @php echo ($data->edit) ? ($data->edit->jabatan=='penjualan') ? 'selected': '' : null; @endphp>Penjualan</option>
                                </select>
                                <label for="barang_harga">Jabatan</label>
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
                <h3 class="block-title">Users Table</h3>
            </div>
            <div class="block-content">
                <table class="table table-hover table-vcenter">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>NAMA</th>
                        <th>Jabatan</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Email</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                    @foreach($data->list as $list)
                    <tr>
                        <th class="text-center" scope="row">{{$no}}</th>
                        <td>{{$list->name}}</td>
                        <td>{{$list->jabatan}}</td>
                        <td class="d-none d-sm-table-cell">{{$list->email}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('master',['users', $list->id]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-sm btn-danger" data-toggle="confirmation" data-popout="true" data-title="Hapus Data ini?"
                                   href="{{ route('delete',['users', $list->id]) }}" ><i class="fa fa-times"></i></a>
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
