<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use DB;

class BeliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list( $id=null)
    {
        $data =  new \stdClass();
        $data->list = DB::table('beli')->join('supplier', 'supplier_id', '=', 'beli_supplier_id')->get();
        return view('pages.BeliData',  compact('data'));
    }

    public function transaksi( $id=null)
    {
        $data = 'bebas';
        return view('pages.BeliTransaksi',  compact('data'));
    }
}
