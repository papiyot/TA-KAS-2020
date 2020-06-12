<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use DB;
use Carbon\Carbon;

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
        $data =  new \stdClass();
        $data->edit = null;
        $data->list = DB::table('beli_detail')->join('barang', 'barang_id', '=', 'beli_detail_barang_id')->whereNull('beli_detail_beli_id')->get();
        $data->barang = DB::table('barang')->get();
        $data->supplier = DB::table('supplier')->get();
        $data->total = 0;
        $data->date = Carbon::now()->translatedFormat('d F Y');
        if($data->list){
            foreach ($data->list as $item){
                $data->total = $data->total + ($item->beli_detail_harga*$item->beli_detail_jml);
            }
        }
        if ($id!=null){
            $data->edit = DB::table('beli_detail')->where('beli_detail_id', $id)->first();
        }
        return view('pages.BeliTransaksi',  compact('data'));
    }

    public function barang_store( Request $request)
    {
        if (is_null($request['beli_detail_id'])){ $request->request->add( ['beli_detail_id' =>Helper::getCode('beli_detail', 'beli_detail_id','BD-')] );  }
        DB::table('beli_detail')->updateOrInsert(
            ['beli_detail_id' => $request['beli_detail_id']],
            $request->except('_token')
        );

        return redirect('pembelian/transaksi');
    }
    public function store( Request $request)
    {
        if (is_null($request['beli_id'])){ $request->request->add( ['beli_id' =>Helper::getCode('beli', 'beli_id','BL-')] );  }
        $request->request->add( ['beli_tgl' =>Carbon::now()] );
        DB::table('beli')->updateOrInsert(
            ['beli_id' => $request['beli_id']],
            $request->except('_token')
        );
        DB::table('beli_detail')->whereNull('beli_detail_beli_id')->update(['beli_detail_beli_id'=>$request['beli_id']]);
        return redirect('pembelian/list');
    }

    public function barang_delete($id=null)
    {
        DB::table('beli_detail')->where('beli_detail_id', $id)->delete();
        return redirect('pembelian/transaksi');
    }

    public function faktur( $id, $type, $retur=null)
    {
        $data =  new \stdClass();
        $data->id = $id;
        $data->type = $type;
        $data->edit = null;
        $data->retur = null;
        $data->pembelian = null;
        $data->list = DB::table('beli_detail')->join('barang', 'barang_id', '=', 'beli_detail_barang_id')->where('beli_detail_beli_id', $id)->get();
        $data->retur_list = DB::table('retur')->join('barang', 'barang_id', '=', 'retur_barang_id')->where('retur_beli_id', $id)->get();
        $data->max = 0;
        $data->total = 0;
        $data->total_retur = 0;
        $data->date = Carbon::now()->translatedFormat('d F Y');
        if($data->list){
            foreach ($data->list as $item){
                $data->total = $data->total + ($item->beli_detail_harga*$item->beli_detail_jml);
            }
        }
        if($data->retur_list){
            foreach ($data->retur_list as $item){
                $data->total_retur = $data->total_retur + ($item->retur_harga*$item->retur_jml);
            }
        }
        if ($retur!=null){
            $data->retur = DB::table('retur')->join('barang', 'barang_id', '=', 'retur_barang_id')->where('retur_id', $retur)->first();
            $data->pembelian = DB::table('beli_detail')->join('barang', 'barang_id', '=', 'beli_detail_barang_id')->where('beli_detail_id', $retur)->first();
            $data->max = $data->pembelian->beli_detail_jml;
            $data->edit = 'change';
        }
        return view('pages.BeliTransaksiDetail',  compact('data'));
    }

    public function faktur_store( Request $request)
    {

        DB::table('retur')->updateOrInsert(
            ['retur_id' => $request['retur_id']],
            $request->except('_token', 'total_pembelian', 'total_retur')
        );
        $set= DB::table('beli')->where('beli_id', $request['retur_beli_id'])->first();
        $retur_nominal = ($set->beli_retur==0) ? ($request['retur_harga']*$request['retur_jml']) : $set->beli_retur-$request['total_retur']+($request['retur_harga']*$request['retur_jml']);
        DB::table('beli')->where('beli_id', $request['retur_beli_id'])->update(['beli_retur'=>$retur_nominal]);
        return redirect("pembelian/faktur/".$request['retur_beli_id']);
    }
}
