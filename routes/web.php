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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'MasterController@home')->name('home');
Route::post('/master/store/{table}/{code}', 'MasterController@store')->name('master.store');
Route::get('/master/{table}/{id?}', 'MasterController@view')->name('master');
Route::get('/delete/{table}/{id?}', 'MasterController@delete')->name('delete');
Route::post('/saldo', 'MasterController@saldo')->name('master.saldo');

Route::get('/penjualan/list/{id?}', 'JualController@list')->name('jual.list');
Route::get('/penjualan/transaksi/{id?}', 'JualController@transaksi')->name('jual.transaksi');
Route::get('/penjualan/faktur/{id?}', 'JualController@faktur')->name('jual.faktur');
Route::post('/penjualan/transaksi/store', 'JualController@store')->name('jual.store');
Route::post('/penjualan/transaksi/barang_store', 'JualController@barang_store')->name('penjualan.barang_store');
Route::get('/penjualan/transaksi/barang_delete/{id}', 'JualController@barang_delete')->name('penjualan.barang_delete');

Route::get('/pembelian/list/{id?}', 'BeliController@list')->name('beli.list');
Route::get('/pembelian/transaksi/{id?}', 'BeliController@transaksi')->name('beli.transaksi');
Route::get('/pembelian/faktur/{id?}/{type}/{retur?}', 'BeliController@faktur')->name('beli.faktur');
Route::post('/pembelian/faktur_store', 'BeliController@faktur_store')->name('beli.faktur_store');
Route::post('/pembelian/transaksi/store', 'BeliController@store')->name('beli.store');
Route::post('/pembelian/transaksi/ubah_faktur', 'BeliController@ubah_faktur')->name('beli.ubah_faktur');
Route::post('/pembelian/transaksi/barang_store', 'BeliController@barang_store')->name('pembelian.barang_store');
Route::get('/pembelian/transaksi/barang_delete/{id}', 'BeliController@barang_delete')->name('pembelian.barang_delete');

Route::get('/biaya/transaksi/{id?}', 'BiayaController@transaksi')->name('biayatransaksi.transaksi');
Route::post('/biaya/transaksi/store', 'BiayaController@store')->name('biayatransaksi.store');
Route::get('/biaya/transaksi/delete/{id}', 'BiayaController@delete')->name('biayatransaksi.delete');

Route::get('/jurnal/jpembelian', 'LaporanController@jpembelian')->name('jurnal.jpembelian');
Route::get('/jurnal/jpenjualan', 'LaporanController@jpenjualan')->name('jurnal.jpenjualan');
Route::get('/jurnal/jpenerimaankas', 'LaporanController@jpenerimaankas')->name('jurnal.jpenerimaankas');
Route::get('/jurnal/jpengeluarankas', 'LaporanController@jpengeluarankas')->name('jurnal.jpengeluarankas');

Route::get('/laporan/lpembelian', 'LaporanController@lpembelian')->name('laporan.lpembelian');
Route::get('/laporan/lpenerimaankas', 'LaporanController@lpenerimaankas')->name('laporan.lpenerimaankas');
Route::get('/laporan/lpengeluarankas', 'LaporanController@lpengeluarankas')->name('laporan.lpengeluarankas');
Route::get('/laporan/lbukubesarkas', 'LaporanController@lbukubesarkas')->name('laporan.lbukubesarkas');

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
