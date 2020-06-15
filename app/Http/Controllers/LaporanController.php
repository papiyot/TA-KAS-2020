<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use DB;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function jpembelian( )
    {
        $data =  new \stdClass();
        $data->total = 0;
        $data->list = DB::table('kas')->where('kas_ket', 'beli')->join('beli', 'beli_id', '=', 'kas_id_value')->get();
        if($data->list){
            foreach ($data->list as $item){
                $data->total = $data->total + $item->kas_kredit;
            }
        }
        return view('pages.JPembelian',  compact('data'));
    }
    public function jpenjualan( )
    {
        $data =  new \stdClass();
        $data->total = 0;
        $data->list = DB::table('kas')->where('kas_ket', 'jual')->join('jual', 'jual_id', '=', 'kas_id_value')->get();
        if($data->list){
            foreach ($data->list as $item){
                $data->total = $data->total + $item->kas_debet;
            }
        }
        return view('pages.JPenjualan',  compact('data'));
    }
    public function jpenerimaankas( )
    {
        $data =  new \stdClass();
        $data->total = 0;
        $data->list = DB::table('kas')->where('kas_ket', 'jual')->join('jual', 'jual_id', '=', 'kas_id_value')->get();
        if($data->list){
            foreach ($data->list as $item){
                $data->total = $data->total + $item->kas_debet;
            }
        }
        return view('pages.jpenerimaankas',  compact('data'));
    }
    public function jpengeluarankas( )
    {
        $data =  new \stdClass();
        $data->total = 0;
        $data->list = DB::table('kas')->where('kas_ket', 'beli')->orwhere('kas_ket', 'biaya')->get();
        $data->beli = DB::table('kas')->where('kas_ket', 'beli')->join('beli', 'beli_id', '=', 'kas_id_value')->get();
        $data->fix = array();
        if($data->list){
            foreach ($data->list as $item){
                $object = $item;
                if ($item->kas_ket=='beli'){
                    foreach ($data->beli as $value){
                        if ($value->beli_id == $item->kas_id_value) {
                            $object->nobuk = $value->beli_faktur;
                            $object->keterangan = 'Pembelian';
                        }
                    }
                }else{
                    $object->nobuk = $item->kas_id_value;
                    $object->keterangan = 'Biaya';
                }
                array_push( $data->fix, $object);
                $data->total = $data->total + $item->kas_kredit;
            }
        }
        return view('pages.JPengeluaranKas',  compact('data'));
    }

}
