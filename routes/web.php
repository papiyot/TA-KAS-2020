<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Carbon\Carbon;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    return view('pages.PenjualanTransaksi');
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/master/store/{table}/{code}', 'MasterController@store')->name('master.store');
Route::get('/master/{table}/{id?}', 'MasterController@view')->name('master');
Route::get('/delete/{table}/{id?}', 'MasterController@delete')->name('delete');
Route::get('/penjualan/list/{id?}', 'JualController@list')->name('jual.list');
Route::get('/penjualan/transaksi/{id?}', 'JualController@transaksi')->name('jual.transaksi');

Route::get('/pembelian/list/{id?}', 'BeliController@list')->name('beli.list');
Route::get('/pembelian/transaksi/{id?}', 'BeliController@transaksi')->name('beli.transaksi');
Route::post('/pembelian/transaksi/store', 'BeliController@store')->name('beli.store');
Route::post('/pembelian/transaksi/barang_store', 'BeliController@barang_store')->name('pembelian.barang_store');
Route::get('/pembelian/transaksi/barang_delete/{id}', 'BeliController@barang_delete')->name('pembelian.barang_delete');

Route::get('/uuid',function (){
//    Carbon::now()->setLocale('id');
    return $now = Carbon::now()->translatedFormat('d F Y');
     $data = DB::table('users')->where('id', 'US-1')->first();
//     return response($data);
//    $encrypted = Crypt::encryptString('$2y$10$6ZG.ddsAfXfzqsheaGArWupnXmUakDZdcPxt5Y7UqcfskfUsfkqQG');

//     return $decrypted = Crypt::decryptString($encrypted);
//    try {
//        return $decrypted = decrypt('$2y$10$6ZG.ddsAfXfzqsheaGArWupnXmUakDZdcPxt5Y7UqcfskfUsfkqQG');
//    } catch (DecryptException $e) {
//        return 'error';
//    }

    return Helper::getCode('biaya', 'biaya_id','BY-');



});
