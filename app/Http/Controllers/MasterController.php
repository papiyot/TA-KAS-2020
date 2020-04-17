<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use DB;
use Illuminate\Support\Facades\Hash;

class MasterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view($table, $id=null)
    {
        $field_id = $table.'_id';
        if($table=='users'){$field_id = 'id'; }
        $data =  new \stdClass();
        $data->action = 'Tambah';
        $data->class = 'block-mode-hidden';
        $data->edit = null;
        $data->list = DB::table($table)->get();
        if ($id!=null){
            $data->action = 'Edit';
            $data->class = '';
            $data->edit = DB::table($table)->where($field_id, $id)->first();
        }
        return view('pages.'.$table,  compact('data'));
    }

    public function store($table, $code, Request $request)
    {
        $field_id = $table.'_id';
        if($table=='users'){
            $field_id = 'id';
            if (is_null($request[$field_id])){
                $request->request->add( [$field_id =>Helper::getCode($table, $field_id,$code)] );

                DB::table($table)->insert(
                    [   'id' => Helper::getCode($table, $field_id,$code),
                        'name' => $request->name,
                        'email' => $request->email,
                        'jabatan' => $request->jabatan,
                        'password' => Hash::make($request->password)
                    ]);
            }else{
                $get = DB::table($table)->where($field_id, $request[$field_id])->first();
                if(Hash::check($request->password, $get->password)) {
                    DB::table($table)->where($field_id, $request[$field_id])->update(
                        [   'name' => $request->name,
                            'email' => $request->email,
                            'jabatan' => $request->jabatan,
                            'password' => Hash::make((!is_null($request->password_baru)) ? $request->password_baru : $request->password)
                        ]);
                };
            }
        }else{
            if (is_null($request[$field_id])){ $request->request->add( [$field_id =>Helper::getCode($table, $field_id,$code)] );  }
            DB::table($table)->updateOrInsert(
                [$field_id => $request[$field_id]],
                $request->except('_token')
            );
        }

        return redirect('master/'.$table);
    }


    public function delete($table, $id=null)
    {
        $field_id = $table.'_id';
        if($table=='users'){$field_id = 'id'; }
        DB::table($table)->where($field_id, $id)->delete();
        return redirect('master/'.$table);
    }

}