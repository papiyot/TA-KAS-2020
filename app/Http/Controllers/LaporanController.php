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
        $data->list = DB::table('kas')->where('kas_ket', 'beli')->join('beli', 'beli_id', '=', 'kas_id_value')->orderby('kas_tgl', 'asc')->get();
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
        $data->list = DB::table('kas')->where('kas_ket', 'jual')->join('jual', 'jual_id', '=', 'kas_id_value')->orderby('kas_tgl', 'asc')->get();
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
        $data->list = DB::table('kas')->wherein('kas_ket',['jual', 'retur'] )->orderby('kas_tgl', 'asc')->get();
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
        $data->list = DB::table('kas')->wherein('kas_ket', ['beli','biaya'])->orderby('kas_tgl','asc')->get();
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

    public function lpembelian(Request $request )
    {
        $data =  new \stdClass();
        $data->enddate = ($request->enddate) ? $request->enddate : Carbon::now()->endOfMonth()->format('Y-m-d');
        $data->startdate = ($request->startdate) ? $request->startdate : Carbon::now()->startOfMonth()->format('Y-m-d');
        $data->total = 0;
        $data->list = DB::table('kas')->where('kas_ket', 'beli')->whereBetween  ('kas_tgl',[$data->startdate, $data->enddate])->join('beli', 'beli_id', '=', 'kas_id_value')->join('supplier', 'supplier_id', '=', 'beli_supplier_id')->orderby('kas_tgl', 'asc')->get();
//        dd($data->list);
        if($data->list){
            foreach ($data->list as $item){
                $data->total = $data->total + $item->kas_kredit;
            }
        }
        return view('pages.LPembelian',  compact('data'));
    }
    public function lpenerimaankas(Request $request )
    {
        $data =  new \stdClass();
        $data->enddate = ($request->enddate) ? $request->enddate : Carbon::now()->endOfMonth()->format('Y-m-d');
        $data->startdate = ($request->startdate) ? $request->startdate : Carbon::now()->startOfMonth()->format('Y-m-d');
        $data->total = 0;
        $data->list = DB::table('kas')->where('kas_ket', 'jual')->whereBetween('kas_tgl',[$data->startdate, $data->enddate])->orderby('kas_tgl', 'asc')->get();
//        dd($data->list);
        if($data->list){
            foreach ($data->list as $item){
                $data->total = $data->total + $item->kas_debet;
            }
        }
        return view('pages.lpenerimaankas',  compact('data'));
    }
    public function lpengeluarankas(Request $request )
    {
        $data =  new \stdClass();
        $data->enddate = ($request->enddate) ? $request->enddate : Carbon::now()->endOfMonth()->format('Y-m-d');
        $data->startdate = ($request->startdate) ? $request->startdate : Carbon::now()->startOfMonth()->format('Y-m-d');
        $data->total = 0;
        $data->list = DB::table('kas')->wherein('kas_ket', ['beli','biaya'])->whereBetween('kas_tgl',[$data->startdate, $data->enddate])->orderby('kas_tgl','asc')->get();
        $data->beli = DB::table('kas')->where('kas_ket', 'beli')->join('beli', 'beli_id', '=', 'kas_id_value')->get();
        $data->fix = array();
        if($data->list){
            foreach ($data->list as $item){
                $object =  new \stdClass();
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
        return view('pages.lpengeluarankas',  compact('data'));
    }
    public function lbukubesarkas(Request $request )
    {
        $data =  new \stdClass();
        $data->enddate = ($request->enddate) ? $request->enddate : Carbon::now()->endOfMonth()->format('Y-m-d');
        $data->startdate = ($request->startdate) ? $request->startdate : Carbon::now()->startOfMonth()->format('Y-m-d');
        $data->total_debet = 0;
        $data->total_kredit = 0;
        $data->list = DB::table('kas')->whereBetween('kas_tgl',[$data->startdate, $data->enddate])->orderby('kas_tgl')->get();
        if($data->list){
            foreach ($data->list as $item){
                $data->total_debet = $data->total_debet + $item->kas_debet;
                $data->total_kredit = $data->total_kredit + $item->kas_kredit;
            }
        }
        return view('pages.LBukuBesarKas',  compact('data'));
    }

}
