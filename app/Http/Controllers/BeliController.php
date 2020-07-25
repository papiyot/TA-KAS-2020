<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB as FacadesDB;

class BeliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list($id = null)
    {
        Session(['saldo' => Helper::saldo()]);
        $data =  new \stdClass();
        $data->list = DB::table('beli')->join('supplier', 'supplier.supplier_id', '=', 'beli.supplier_id')->get();
        return view('pages.BeliData',  compact('data'));
    }

    public function transaksi($id = null)
    {
        Session(['saldo' => Helper::saldo()]);
        $data =  new \stdClass();
        $data->edit = null;
        $data->list = DB::table('beli_detail')->join('barang', 'barang.barang_id', '=', 'beli_detail.barang_id')->whereNull('beli_id')->get();
        $data->barang = DB::table('barang')->get();
        $data->supplier = DB::table('supplier')->get();
        $data->total = 0;
        $data->date = Carbon::now()->translatedFormat('d F Y');
        if ($data->list) {
            foreach ($data->list as $item) {
                $data->total = $data->total + ($item->beli_detail_harga * $item->beli_detail_jml);
            }
        }
        if ($id != null) {
            $data->edit = DB::table('beli_detail')->where('beli_detail_id', $id)->first();
        }
        return view('pages.BeliTransaksi',  compact('data'));
    }

    public function barang_store(Request $request)
    {
        
        if (is_null($request['beli_detail_id'])) {
            $cek =  DB::table('beli_detail')->whereNull('beli_id')->where('barang_id', $request->barang_id)->first();
            $request->request->add(['beli_detail_id' => Helper::getCode('beli_detail', 'beli_detail_id', 'BD-')]);
            if($cek){
                $request->request->add(['beli_detail_id' => $cek->beli_detail_id]);
                $request['beli_detail_jml'] = $cek->beli_detail_jml + $request['beli_detail_jml'];
            }
            
        }
        $save_barang = DB::table('beli_detail')->updateOrInsert(
            ['beli_detail_id' => $request['beli_detail_id']],
            $request->except('_token')
        );

        return redirect('pembelian/transaksi');
    }
    public function store(Request $request)
    {
        if (is_null($request['beli_id'])) {
            $request->request->add(['beli_id' => Helper::getCode('beli', 'beli_id', 'BL-')]);
        }
        $request->request->add(['beli_tgl' => Carbon::now()]);
        $save_beli = DB::table('beli')->insert($request->except('_token'));
        $barang_beli = DB::table('beli_detail')->whereNull('beli_id')->get();
        foreach($barang_beli as $barang){
            $get_barang = DB::table('barang')->where('barang_id', $barang->barang_id)->first();
            $update_stok = DB::table('barang')->where('barang_id', $barang->barang_id)->update(['barang_stok' => $get_barang->barang_stok+$barang->beli_detail_jml]);
        }
        $save_barang_beli = DB::table('beli_detail')->whereNull('beli_id')->update(['beli_id' => $request['beli_id']]);
        $insert['kas_id'] =  Helper::getCode('kas', 'kas_id', 'KS-');
        $insert['kas_ket'] = 'beli';
        $insert['kas_id_value'] = $request['beli_id'];
        $insert['kas_kredit'] = $request['beli_total'];
        $save_kas = DB::table('kas')->insert($insert);
        return redirect('pembelian/list');
    }

    public function barang_delete($id = null)
    {
        $delete_barang = DB::table('beli_detail')->where('beli_detail_id', $id)->delete();
        return redirect('pembelian/transaksi');
    }

    public function faktur($id, $type, $retur = null)
    {
        $data =  new \stdClass();
        $data->id = $id;
        $data->faktur = DB::table('beli')->where('beli_id', $id)->first()->beli_faktur;
        $data->type = $type;
        $data->edit = null;
        $data->retur = null;
        $data->pembelian = null;
        $data->list = DB::table('beli_detail')->join('barang', 'barang.barang_id', '=', 'beli_detail.barang_id')->where('beli_detail.beli_id', $id)->get();
        $data->retur_list = DB::table('retur')->join('barang', 'barang.barang_id', '=', 'retur.barang_id')->where('retur.beli_id', $id)->get();
        $data->max = 0;
        $data->total = 0;
        $data->total_retur = 0;
        $data->date = Carbon::now()->translatedFormat('d F Y');
        if ($data->list) {
            foreach ($data->list as $item) {
                $data->total = $data->total + ($item->beli_detail_harga * $item->beli_detail_jml);
            }
        }
        if ($data->retur_list) {
            foreach ($data->retur_list as $item) {
                $data->total_retur = $data->total_retur + ($item->retur_harga * $item->retur_jml);
            }
        }
        if ($retur != null) {
            $data->retur = DB::table('retur')->join('barang', 'barang.barang_id', '=', 'retur.barang_id')->where('retur_id', $retur)->first();
            $data->pembelian = DB::table('beli_detail')->join('barang', 'barang.barang_id', '=', 'beli_detail.barang_id')->where('beli_detail_id', $retur)->first();
            $data->max = $data->pembelian->beli_detail_jml;
            $data->edit = 'change';
        }
        return view('pages.BeliTransaksiDetail',  compact('data'));
    }

    public function faktur_store(Request $request)
    {

        $save_retur = DB::table('retur')->updateOrInsert(
            ['retur_id' => $request['retur_id']],
            $request->except('_token', 'total_pembelian', 'total_retur', 'retur_jml_old')
        );
        $get_barang = DB::table('barang')->where('barang_id', $request->barang_id)->first();
        $update_stok = DB::table('barang')->where('barang_id', $request->barang_id)->update(['barang_stok' => $get_barang->barang_stok+$request->retur_jml_old-$request->retur_jml]); 
        $set = DB::table('beli')->where('beli_id', $request['beli_id'])->first();
        $retur_nominal = ($set->beli_retur == 0) ? ($request['retur_harga'] * $request['retur_jml']) : $set->beli_retur - $request['total_retur'] + ($request['retur_harga'] * $request['retur_jml']);
        $save_nominal_retur = DB::table('beli')->where('beli_id', $request['beli_id'])->update(['beli_retur' => $retur_nominal]);
        $kas = DB::table('kas')->where('kas_ket', 'retur')->where('kas_id_value', $request['beli_id'])->first();
        $insert['kas_id'] = ($kas) ? $kas->kas_id : Helper::getCode('kas', 'kas_id', 'KS-');
        $insert['kas_ket'] = ($kas) ? $kas->kas_ket : 'retur';
        $insert['kas_id_value'] = $request['beli_id'];
        $insert['kas_debet'] = $retur_nominal;
        $save_kas = DB::table('kas')->updateOrInsert(
            ['kas_id' => $insert['kas_id']],
            $insert
        );
        return redirect("pembelian/faktur/" . $request['beli_id'] . "/retur");
    }

    public function ubah_faktur(Request $request)
    {
        $ubah_faktur = DB::table('beli')->updateOrInsert(
            ['beli_id' => $request['beli_id']],
            $request->except('_token')
        );
        return redirect("pembelian/faktur/" . $request['beli_id'] . "/retur");
    }
}
