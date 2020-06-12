<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use DB;
use Carbon\Carbon;

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
        $data =  new \stdClass();
        $data->edit = null;
        $data->list = DB::table('jual_detail')->join('barang', 'barang_id', '=', 'jual_detail_barang_id')->whereNull('jual_detail_jual_id')->get();
        $data->barang = DB::table('barang')->get();
        $data->total = 0;
        $data->date = Carbon::now()->translatedFormat('d F Y');
        if($data->list){
            foreach ($data->list as $item){
                $data->total = $data->total + ($item->jual_detail_harga*$item->jual_detail_jml);
            }
        }
        if ($id!=null){
            $data->edit = DB::table('jual_detail')->where('jual_detail_id', $id)->first();
        }
        return view('pages.JualTransaksi',  compact('data'));
    }

    public function barang_store( Request $request)
    {
        if (is_null($request['jual_detail_id'])){ $request->request->add( ['jual_detail_id' =>Helper::getCode('jual_detail', 'jual_detail_id','JD-')] );  }
        DB::table('jual_detail')->updateOrInsert(
            ['jual_detail_id' => $request['jual_detail_id']],
            $request->except('_token')
        );

        return redirect('penjualan/transaksi');
    }
    public function store( Request $request)
    {
        if (is_null($request['jual_id'])){ $request->request->add( ['jual_id' =>Helper::getCode('jual', 'jual_id','JL-')] );  }
        $request->request->add( ['jual_tgl' =>Carbon::now()] );
        DB::table('jual')->updateOrInsert(
            ['jual_id' => $request['jual_id']],
            $request->except('_token')
        );
        DB::table('jual_detail')->whereNull('jual_detail_jual_id')->update(['jual_detail_jual_id'=>$request['jual_id']]);
        return redirect('penjualan/list');
    }
    public function barang_delete($id=null)
    {
        DB::table('jual_detail')->where('jual_detail_id', $id)->delete();
        return redirect('penjualan/transaksi');
    }

    public function faktur( $id)
    {
        $data =  new \stdClass();
        $jual = DB::table('jual')->where('jual_id', $id)->first();
        $data->id = $id;
        $data->list = DB::table('jual_detail')->join('barang', 'barang_id', 'jual_detail_barang_id')->where('jual_detail_jual_id', $id)->get();
        $data->date = $jual->jual_tgl;
        $data->total = $jual->jual_total;

        return view('pages.JualTransaksiDetail',  compact('data'));
    }
}
