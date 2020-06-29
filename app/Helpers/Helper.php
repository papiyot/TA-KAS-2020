<?php


namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Helper
{
    public static function rp($p)
    {
        return 'Rp. ' . number_format($p,2,'.',',');
    }
    public static function saldo(){
        $modal = 0;
        $transaksi = 0;
        $get_modal = DB::table('kas')->where('kas_type', 'modal')->get();
        foreach($get_modal as $get){
            $modal = $modal + $get->kas_kredit;
        }
        $get_transaksi = DB::table('kas')->where('kas_type', 'transaksi')->get();
        foreach($get_transaksi as $get){
            $transaksi = $transaksi + $get->kas_kredit - $get->kas_debet;
        }
        return $modal + $transaksi;
    }
    public static function getCode($table, $field, $code){
        $data = DB::table($table)->orderBy('created_at', 'DESC')->first();
        if(is_null($data)){
            return $code.'1';
        }
        $code_now = substr($data->$field,strlen($code));
        $code_after = intval($code_now)+1;
        $code_generate = $code.$code_after;
        return $code_generate;
    }
    public static function foreign($table,$fieldId,$index){
        $data = DB::table($table)->get();
        return $data[$index-1]->$fieldId;
    }
    public static function foreignData($table,$join=null){
        $result = DB::table($table);
        $join ? $result->join($join,$join.'_id','=',$table.'_'.$join.'_id'):null;
        return $result->inRandomOrder()->first();
    }
}
