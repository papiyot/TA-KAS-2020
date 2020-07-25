@extends('layouts.app')
@section('title')Users @endsection
@section('content')
<div class="col-md-12">
    <!-- Material (floating) Register -->
    @if(Auth::user()->jabatan=='pemilik' || $data->edit)
    <div class="block block-themed  @if(session()->has('status')) 'block-mode-hidden' @else {{$data->class}} @endif">
        <div class="block-header bg-gd-primary">
            <h3 class="block-title" style="font-size: 2rem;">{{$data->action}} Users</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
            </div>
        </div>
        <div class="block-content">
            <form action="{{ route('master.store',['users', 'US-']) }}" method="post"> @csrf
                <div class="form-group row">
                    <div class="col-12 col-sm-6 col-md-4 ">
                        <div class="form-material floating">
                            @if($data->edit)
                            <input type="hidden" class="form-control" id="name_old" name="name_old" required value="@php echo ($data->edit) ? $data->edit->name: null; @endphp">
                            @endif
                            <input type="text" required class="form-control" id="name" name="name" value="@php echo ($data->edit) ? $data->edit->name: old('name'); @endphp">
                            @if(session()->has('status')) <p class="text-danger">{{ session()->get('status') }}</p> @endif
                            <label for="name">Nama</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 ">
                        <div class="form-material floating">
                            <input type="email" required class="form-control" id="email" name="email" value="@php echo ($data->edit) ? $data->edit->email: old('email'); @endphp">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 ">
                        <div class="form-material floating">
                            <input type="password" required class="form-control" id="password" name="password">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    @if($data->action=='Edit')
                    <div class="col-12 col-sm-6 col-md-6 ">
                        <div class="form-material floating">
                            <input type="password" class="form-control" id="password_baru" name="password_baru">
                            <label class="text-sm-left" for="password_baru">Password Baru (Change Password)</label>
                        </div>
                    </div>
                    @endif
                    <div class="col-12 col-sm-6 col-md-6 ">
                        <div class="form-material floating">
                            <input type="hidden" class="form-control" id="id" name="id" value="@php echo ($data->edit) ? $data->edit->id: ''; @endphp">
                            <select type="text" required class="form-control" id="jabatan" name="jabatan">
                                <option>Pilih Jabatan</option>
                                <option value="admin" @php echo ($data->edit) ? ($data->edit->jabatan=='admin') ? 'selected': '' : null; @endphp>Admin</option>
                                <option value="pemilik" @php echo ($data->edit) ? ($data->edit->jabatan=='pemilik') ? 'selected': '' : null; @endphp>Pemilik</option>
                                <option value="pembelian" @php echo ($data->edit) ? ($data->edit->jabatan=='pembelian') ? 'selected': '' : null; @endphp>Pembelian</option>
                                <option value="kasir" @php echo ($data->edit) ? ($data->edit->jabatan=='kasir') ? 'selected': '' : null; @endphp>Kasir</option>
                            </select>
                            <label for="barang_harga">Jabatan</label>
                        </div>
                    </div>
                    @if($data->action=='Edit')
                    <div class="col-12">
                        <span><br></span>
                        <span class="text-right font-w600 text-danger">* Password baru berguna untuk merubah password, kosongkan jika tidak ingin merubah password.</span>
                    </div>
                    @endif
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
    @if(Auth::user()->jabatan=='pemilik' && $data->edit==null)
    <div class="block block-themed">
        <div class="block-header bg-gd-primary">
            <h3 class="block-title" style="font-size: 2rem;">Daftar Users</h3>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 10%;">#</th>
                            <th>NAMA</th>
                            <th>Jabatan</th>
                            <th>Email</th>
                            @if(Auth::user()->jabatan!='pemilik')
                            <th class="text-center" style="width: 15%;">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach($data->list as $list)
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td class="font-w600 text-uppercase text-primary">{{$list->name}}</td>
                            <td class="font-w600 text-uppercase text-secondary">{{$list->jabatan}}</td>
                            <td class="font-w600">{{$list->email}}</td>
                            @if(Auth::user()->jabatan!='pemilik')
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('master',['users', $list->id]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" data-toggle="confirmation" data-popout="true" data-title="Hapus Data ini?" href="{{ route('delete',['users', $list->id]) }}"><i class="fa fa-times"></i></a>
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
    @endif
</div>
@endsection