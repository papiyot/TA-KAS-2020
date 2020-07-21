<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use DB;
use Carbon\Carbon;

class BiayaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function transaksi( $id=null)
    {
        $data =  new \stdClass();
        Session(['saldo' => Helper::saldo()]);
        $data->edit = null;
        $data->action = null;
        $data->list = DB::table('biaya_detail')->join('biaya', 'biaya.biaya_id', '=', 'biaya_detail.biaya_id')->get();
        $data->biaya = DB::table('biaya')->get();
        $data->total = 0;
        $data->date = Carbon::now()->translatedFormat('d F Y');
        if ($id!=null){
            $data->edit = DB::table('biaya_detail')->where('biaya_detail_id', $id)->first();
            $data->action = 'Edit';
        }
        return view('pages.BiayaTransaksi',  compact('data'));
    }

    public function store( Request $request)
    {
        if (is_null($request['biaya_detail_id'])){ $request->request->add( ['biaya_detail_id' =>Helper::getCode('biaya_detail', 'biaya_detail_id','BT-')] );  }
        $save_biaya = DB::table('biaya_detail')->updateOrInsert(
            ['biaya_detail_id' => $request['biaya_detail_id']],
            $request->except('_token')
        );
        $kas = DB::table('kas')->where('kas_ket', 'biaya')->where('kas_id_value', $request['biaya_detail_id'])->first();
        $insert['kas_id'] =  ($kas) ? $kas->kas_id : Helper::getCode('kas', 'kas_id','KS-');
        $insert['kas_ket'] = 'biaya';
        $insert['kas_tgl'] = $request['biaya_detail_tgl'];
        $insert['kas_id_value'] = $request['biaya_detail_id'];
        $insert['kas_kredit'] = $request['biaya_detail_jml'];
        $save_kas = DB::table('kas')->updateOrInsert(
            ['kas_id' => $insert['kas_id']],
            $insert
        );
        return redirect('biaya/transaksi');
    }

    public function delete($id=null)
    {
        $delete_biaya = DB::table('biaya_detail')->where('biaya_detail_id', $id)->delete();
        return redirect('biaya/transaksi');
    }
}
