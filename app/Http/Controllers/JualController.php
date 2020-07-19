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

    public function list($id = null)
    {
        $data =  new \stdClass();
        $data->list = DB::table('jual')->get();
        return view('pages.JualData',  compact('data'));
    }

    public function transaksi($id = null)
    {
        $data =  new \stdClass();
        $data->edit = null;
        $data->list = DB::table('jual_detail')->join('barang', 'barang.barang_id', '=', 'jual_detail.barang_id')->whereNull('jual_id')->get();
        $data->barang = DB::table('barang')->get();
        $data->total = 0;
        $data->date = Carbon::now()->translatedFormat('d F Y');
        if ($data->list) {
            foreach ($data->list as $item) {
                $data->total = $data->total + ($item->jual_detail_harga * $item->jual_detail_jml);
            }
        }
        if ($id != null) {
            $data->edit = DB::table('jual_detail')->join('barang', 'barang.barang_id', '=', 'jual_detail.barang_id')->where('jual_detail_id', $id)->first();
        }
        return view('pages.JualTransaksi',  compact('data'));
    }

    public function barang_store(Request $request)
    {
        if (is_null($request['jual_detail_id'])) {
            $cek =  DB::table('jual_detail')->whereNull('jual_id')->where('barang_id', $request->barang_id)->first();
            $request->request->add(['jual_detail_id' => Helper::getCode('jual_detail', 'jual_detail_id', 'JD-')]);
            if($cek){
                $request->request->add(['jual_detail_id' => $cek->jual_detail_id]);
                $request['jual_detail_jml'] = $cek->jual_detail_jml + $request['jual_detail_jml'];
            }
        }
        $save_barang = DB::table('jual_detail')->updateOrInsert(
            ['jual_detail_id' => $request['jual_detail_id']],
            $request->except('_token')
        );

        return redirect('penjualan/transaksi');
    }
    public function store(Request $request)
    {
        if (is_null($request['jual_id'])) {
            $request->request->add(['jual_id' => Helper::getCode('jual', 'jual_id', 'JL-')]);
        }
        $request->request->add(['jual_tgl' => Carbon::now()]);
        $save_jual = DB::table('jual')->updateOrInsert(
            ['jual_id' => $request['jual_id']],
            $request->except('_token')
        );
        $barang_jual = DB::table('jual_detail')->whereNull('jual_id')->get();
        foreach($barang_jual as $barang){
            $get_barang = DB::table('barang')->where('barang_id', $barang->barang_id)->first();
            $update_stok = DB::table('barang')->where('barang_id', $barang->barang_id)->update(['barang_stok' => $get_barang->barang_stok-$barang->jual_detail_jml]);
        }
        $save_barang_beli = DB::table('jual_detail')->whereNull('jual_id')->update(['jual_id' => $request['jual_id']]);
        $insert['kas_id'] =  Helper::getCode('kas', 'kas_id', 'KS-');
        $insert['kas_ket'] = 'jual';
        $insert['kas_id_value'] = $request['jual_id'];
        $insert['kas_debet'] = $request['jual_total'];
        $save_kas = DB::table('kas')->insert($insert);
        return redirect('penjualan/list');
    }
    public function barang_delete($id = null)
    {
        $delete_barang = DB::table('jual_detail')->where('jual_detail_id', $id)->delete();
        return redirect('penjualan/transaksi');
    }

    public function faktur($id)
    {
        $data =  new \stdClass();
        $jual = DB::table('jual')->where('jual_id', $id)->first();
        $data->id = $id;
        $data->list = DB::table('jual_detail')->join('barang', 'barang.barang_id', 'jual_detail.barang_id')->where('jual_id', $id)->get();
        $data->date = $jual->jual_tgl;
        $data->total = $jual->jual_total;

        return view('pages.JualTransaksiDetail',  compact('data'));
    }
}
