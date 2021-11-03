<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PageController@index');
Route::get('/menabung', 'NgopahController@menabung');

Route::post('/menabung', 'NgopahController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pesananku', 'NgopahController@pesananku');
Route::get('/ganti-password', 'UserController@ganti_password');
Route::post('/ganti-password', 'UserController@store_password');
Route::get('/ubah-profil', 'UserController@ubah_profil');
Route::post('/ubah-profil', 'UserController@store_profil');
Route::get('/data-bank', 'NgopahController@data_bank');

// workspace
Route::get('/workspace/pending', 'AdminController@pending_ngopah');
Route::get('/workspace/history', 'AdminController@history');
Route::get('/workspace/data-bank', 'AdminController@data_bank');
Route::post('/proses_ngopah', 'AdminController@proses_ngopah');
Route::post('/batalkan_pesanan', 'AdminController@batalkan_pesanan');
Route::get('/workspace/ubah-profil', 'AdminController@ubah_profil');
Route::post('/workspace/ubah-profil', 'AdminController@store_profil');

Route::get('/offline', function () {
    return view('vendor.laravelpwa.offline');
});