<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/master/store/{table}/{code}', 'MasterController@store')->name('master.store');
Route::get('/master/{table}/{id?}', 'MasterController@view')->name('master');
Route::get('/delete/{table}/{id?}', 'MasterController@delete')->name('delete');

Route::get('/uuid',function (){
     $data = DB::table('users')->where('id', 'US-1')->first();
//     return response($data);
//    $encrypted = Crypt::encryptString('$2y$10$6ZG.ddsAfXfzqsheaGArWupnXmUakDZdcPxt5Y7UqcfskfUsfkqQG');

//     return $decrypted = Crypt::decryptString($encrypted);
    try {
        return $decrypted = decrypt('$2y$10$6ZG.ddsAfXfzqsheaGArWupnXmUakDZdcPxt5Y7UqcfskfUsfkqQG');
    } catch (DecryptException $e) {
        return 'error';
    }

    return Helper::getCode('users', 'id','US-');



});
