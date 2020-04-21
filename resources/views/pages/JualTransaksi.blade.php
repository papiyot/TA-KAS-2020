@extends('layouts.app')
@section('title')Data Penjualan @endsection
@section('content')
    <div class="col-md-12">
        <div class="row row-deck gutters-tiny">
            <!-- Billing Address -->
            <div class="col-md-9">
                <div class="block block-themed block-rounded">
                    <div class="block-header bg-gd-primary">
                        <h3 class="block-title">Penjualan</h3>
                        <div class="block-options">
                            20 April 2020
                        </div>
                    </div>

                    <div class="block-content">
                        <form action="{{ route('master.store',['biaya', 'BY-']) }}" method="post" > @csrf
                            <div class="form-group row">
                                <div class="col-12 col-md-6 col-sm-6">
                                    <div class="form-material floating">
                                        <input type="hidden" class="form-control" id="biaya_id" name="biaya_id"  >
                                        <input type="text" class="form-control" id="biaya_nama" name="biaya_nama" >
                                        <label for="biaya_nama">Kode Barang</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-sm-6">
                                    <div class="form-material floating">
                                        <input type="text" class="form-control" id="barang_nama" name="barang_nama" >
                                        <label for="barang_nama">Nama Barang</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-sm-6">
                                    <div class="form-material floating">
                                        <input type="number" class="form-control" id="barang_harga" name="barang_harga" >
                                        <label for="barang_harga">Harga Barang</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-sm-6">
                                    <div class="form-material floating">
                                        <input type="number" class="form-control" id="barang_harga_presentase" name="barang_harga_presentase" >
                                        <label for="barang_harga_presentase">Jumlah</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row"></div>
                            <div class="dropdown-divider"></div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-alt-primary">
                                        <i class="fa fa-plus mr-5"></i> Tambah Barang
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

            <!-- Shipping Address -->
            <div class="col-md-3">

                    <a class="block block-rounded block-transparent bg-gd-primary" href="javascript:void(0)">
                        <div class="block-header"></div>
                        <div class="block-content block-content-full block-sticky-options">


                                <i class="d-flex justify-content-center fa fa-shopping-cart fa-5x text-body-bg-dark"></i>
                            <div class="d-flex justify-content-center font-size-h3 font-w700 text-uppercase text-white-op">Rp. 99.600.300</div>
                            <div class="col-12 d-flex justify-content-center">
                                <button class="d-flex justify-content-center btn btn-alt-primary">
                                    <i class="fa fa-cc-paypal mr-5"></i> Bayar
                                </button>
                            </div>

                        </div>
                    </a>

            </div>
            <!-- END Shipping Address -->
        </div>
{{--        <h2 class="content-heading">Products (5)</h2>--}}
        <div class="block block-themed block-rounded">
            <div class="block-header bg-gd-primary">
                <h3 class="block-title">Barang</h3>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-borderless table-striped">
                        <thead>
                        <tr>
                            <th style="width: 100px;">ID</th>
                            <th>Product</th>
                            <th class="text-center">Stock</th>
                            <th class="text-center">QTY</th>
                            <th class="text-right" style="width: 10%;">UNIT</th>
                            <th class="text-right" style="width: 10%;">PRICE</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.258</a>
                            </td>
                            <td>
                                <a href="be_pages_ecom_product_edit.html">Dark Souls III</a>
                            </td>
                            <td class="text-center">92</td>
                            <td class="text-center font-w600">1</td>
                            <td class="text-right">$69,00</td>
                            <td class="text-right">$69,00</td>
                        </tr>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.263</a>
                            </td>
                            <td>
                                <a href="be_pages_ecom_product_edit.html">Bloodborne</a>
                            </td>
                            <td class="text-center">32</td>
                            <td class="text-center font-w600">1</td>
                            <td class="text-right">$29,00</td>
                            <td class="text-right">$29,00</td>
                        </tr>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.214</a>
                            </td>
                            <td>
                                <a href="be_pages_ecom_product_edit.html">The Surge</a>
                            </td>
                            <td class="text-center">15</td>
                            <td class="text-center font-w600">1</td>
                            <td class="text-right">$59,00</td>
                            <td class="text-right">$59,00</td>
                        </tr>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.358</a>
                            </td>
                            <td>
                                <a href="be_pages_ecom_product_edit.html">Bioshock Collection</a>
                            </td>
                            <td class="text-center">77</td>
                            <td class="text-center font-w600">1</td>
                            <td class="text-right">$39,00</td>
                            <td class="text-right">$39,00</td>
                        </tr>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.425</a>
                            </td>
                            <td>
                                <a href="be_pages_ecom_product_edit.html">Until Dawn</a>
                            </td>
                            <td class="text-center">25</td>
                            <td class="text-center font-w600">1</td>
                            <td class="text-right">$49,00</td>
                            <td class="text-right">$49,00</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right font-w600">Total Price:</td>
                            <td class="text-right">$245,00</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right font-w600">Total Paid:</td>
                            <td class="text-right">$245,00</td>
                        </tr>
                        <tr class="table-primary">
                            <td colspan="5" class="text-right font-w600 text-uppercase">Total Due:</td>
                            <td class="text-right font-w600">$0,00</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
