@extends('layouts.app')
@section('title')Data Penjualan @endsection
@section('content')
    <div class="col-md-12">
        <div class="block block-themed block-rounded">
            <div class="block-header bg-gd-primary">
                <h3 class="block-title">
                    <button type="submit" class="btn btn-alt-primary">
                        <i class="fa fa-plus mr-5"></i> Penjualan
                    </button>
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
                <table class="table table-borderless table-striped js-dataTable-full-pagination">
                    <thead>
                    <tr>
                        <th style="width: 100px;">ID</th>
                        <th>Status</th>
                        <th class="d-none d-sm-table-cell">Submitted</th>
                        <th class="d-none d-sm-table-cell">Products</th>
                        <th class="d-none d-sm-table-cell">Customer</th>
                        <th class="text-right">Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <a class="font-w600" href="be_pages_ecom_order.html">ORD.1851</a>
                        </td>
                        <td>
                            <span class="badge badge-danger">Canceled</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            2017/10/27                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="javascript:void(0)">1</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="be_pages_ecom_customer.html">Jack Greene</a>
                        </td>
                        <td class="text-right">
                            <span class="text-black">$878</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="be_pages_ecom_order.html">ORD.1850</a>
                        </td>
                        <td>
                            <span class="badge badge-danger">Canceled</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            2017/10/26                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="javascript:void(0)">1</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="be_pages_ecom_customer.html">Jose Mills</a>
                        </td>
                        <td class="text-right">
                            <span class="text-black">$240</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="be_pages_ecom_order.html">ORD.1849</a>
                        </td>
                        <td>
                            <span class="badge badge-danger">Canceled</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            2017/10/25                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="javascript:void(0)">6</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="be_pages_ecom_customer.html">Jack Greene</a>
                        </td>
                        <td class="text-right">
                            <span class="text-black">$850</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="be_pages_ecom_order.html">ORD.1848</a>
                        </td>
                        <td>
                            <span class="badge badge-success">Completed</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            2017/10/24                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="javascript:void(0)">9</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="be_pages_ecom_customer.html">Amanda Powell</a>
                        </td>
                        <td class="text-right">
                            <span class="text-black">$706</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="be_pages_ecom_order.html">ORD.1847</a>
                        </td>
                        <td>
                            <span class="badge badge-info">Processing</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            2017/10/23                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="javascript:void(0)">8</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="be_pages_ecom_customer.html">Carl Wells</a>
                        </td>
                        <td class="text-right">
                            <span class="text-black">$186</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="be_pages_ecom_order.html">ORD.1846</a>
                        </td>
                        <td>
                            <span class="badge badge-warning">Pending</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            2017/10/22                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="javascript:void(0)">1</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="be_pages_ecom_customer.html">Thomas Riley</a>
                        </td>
                        <td class="text-right">
                            <span class="text-black">$792</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="be_pages_ecom_order.html">ORD.1845</a>
                        </td>
                        <td>
                            <span class="badge badge-warning">Pending</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            2017/10/21                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="javascript:void(0)">7</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="be_pages_ecom_customer.html">Ralph Murray</a>
                        </td>
                        <td class="text-right">
                            <span class="text-black">$471</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="be_pages_ecom_order.html">ORD.1844</a>
                        </td>
                        <td>
                            <span class="badge badge-success">Completed</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            2017/10/20                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="javascript:void(0)">3</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="be_pages_ecom_customer.html">Brian Stevens</a>
                        </td>
                        <td class="text-right">
                            <span class="text-black">$742</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="be_pages_ecom_order.html">ORD.1843</a>
                        </td>
                        <td>
                            <span class="badge badge-success">Completed</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            2017/10/19                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="javascript:void(0)">5</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="be_pages_ecom_customer.html">Sara Fields</a>
                        </td>
                        <td class="text-right">
                            <span class="text-black">$700</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="be_pages_ecom_order.html">ORD.1842</a>
                        </td>
                        <td>
                            <span class="badge badge-success">Completed</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            2017/10/18                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="javascript:void(0)">3</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="be_pages_ecom_customer.html">Laura Carr</a>
                        </td>
                        <td class="text-right">
                            <span class="text-black">$799</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="be_pages_ecom_order.html">ORD.1841</a>
                        </td>
                        <td>
                            <span class="badge badge-info">Processing</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            2017/10/17                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="javascript:void(0)">7</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="be_pages_ecom_customer.html">Justin Hunt</a>
                        </td>
                        <td class="text-right">
                            <span class="text-black">$623</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="be_pages_ecom_order.html">ORD.1840</a>
                        </td>
                        <td>
                            <span class="badge badge-info">Processing</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            2017/10/16                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="javascript:void(0)">2</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="be_pages_ecom_customer.html">Jose Wagner</a>
                        </td>
                        <td class="text-right">
                            <span class="text-black">$638</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="be_pages_ecom_order.html">ORD.1839</a>
                        </td>
                        <td>
                            <span class="badge badge-warning">Pending</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            2017/10/15                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="javascript:void(0)">6</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="be_pages_ecom_customer.html">Laura Carr</a>
                        </td>
                        <td class="text-right">
                            <span class="text-black">$646</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="be_pages_ecom_order.html">ORD.1838</a>
                        </td>
                        <td>
                            <span class="badge badge-danger">Canceled</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            2017/10/14                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="javascript:void(0)">9</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="be_pages_ecom_customer.html">Thomas Riley</a>
                        </td>
                        <td class="text-right">
                            <span class="text-black">$911</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="be_pages_ecom_order.html">ORD.1837</a>
                        </td>
                        <td>
                            <span class="badge badge-success">Completed</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            2017/10/13                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="javascript:void(0)">4</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <a href="be_pages_ecom_customer.html">Lori Moore</a>
                        </td>
                        <td class="text-right">
                            <span class="text-black">$519</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!-- END Orders Table -->

            </div>
        </div>
    </div>
@endsection
