<?php

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

// route khusus untuk admin
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function(){
    Route::resource('barang', 'BarangController');
    Route::get('getBarang/{barang}', 'BarangController@getBarang');
    
    Route::resource('anggota', 'AnggotaController');
    Route::resource('pembelian', 'PembelianController');
    Route::resource('pengeluaran', 'PengeluaranController');
});