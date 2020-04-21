<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use DB;

class JualController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list( $id=null)
    {
        $data =  new \stdClass();
        $data->list = DB::table('jual')->get();
        return view('pages.JualData',  compact('data'));
    }

    public function transaksi( $id=null)
    {
        $data = 'bebas';
        return view('pages.JualTransaksi',  compact('data'));
    }
}
