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

Route::get('/', 'c_beli@get_katalog')->name('get_katalog_pembeli');
Route::get('/cari', 'c_beli@cari_katalog')->name('cari_katalog_pembeli');
Route::get('/baju', 'c_beli@get_baju')->name('get_baju');
Route::get('/celana', 'c_beli@get_celana')->name('get_celana');

Route::get('/keranjang', function () {
    return view('keranjang');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/login', function () {
    return view('login');
});



Route::get('/admin', 'c_katalog@get_katalog')->name('get_katalog');
Route::get('/admin/cari', 'c_katalog@cari_katalog')->name('cari_katalog');

Route::get('/daftarorder', 'c_order@get_order')->name('get_order');
Route::get('/daftarorder/cari', 'c_order@cari_order')->name('cari_order');
Route::get('/order/hapus/{id}', 'c_order@hapus_order')->name('hapus_order');
Route::get('/order/reset', 'c_order@reset_order')->name('reset_order');

Route::get('/beli/tambah/{id}', 'c_beli@tambah_keranjang')->name('tambah_keranjang');
Route::get('/beli/hapus/{id}', 'c_beli@hapus_keranjang')->name('hapus_keranjang');
Route::post('/beli/checkout', 'c_beli@checkout')->name('checkout');
Route::get('/keranjang', 'c_beli@get_keranjang')->name('get_keranjang');

Route::get('/katalog/hapus/{id}', 'c_katalog@hapus_katalog')->name('hapus_katalog');
Route::post('/katalog/add', 'c_katalog@tambah_katalog')->name('tambah_katalog');
Route::post('/katalog/edit', 'c_katalog@edit_katalog')->name('edit_katalog');

Route::post('/wa/edit', 'c_wa@edit_wa')->name('edit_wa');
Route::post('/wa/pesan', 'c_wa@edit_pesan')->name('edit_pesan');
