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
        $data->edit = null;
        $data->action = null;
        $data->list = DB::table('biaya_detail')->join('biaya', 'biaya_id', '=', 'biaya_detail_biaya_id')->get();
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
        $request->request->add( ['biaya_detail_tgl' =>Carbon::now()] );
        DB::table('biaya_detail')->updateOrInsert(
            ['biaya_detail_id' => $request['biaya_detail_id']],
            $request->except('_token')
        );

        return redirect('biaya/transaksi');
    }

    public function delete($id=null)
    {
        DB::table('biaya_detail')->where('biaya_detail_id', $id)->delete();
        return redirect('biaya/transaksi');
    }
}
