<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [akuncontroller::class, 'login'])->name('login');
Route::get('login', [akuncontroller::class, 'login'])->name('login');
Route::post('proseslogin', [akuncontroller::class, 'proseslogin']);
Route::get('proseslogin', [akuncontroller::class, 'proseslogin']);

Route::group(['middleware' => 'auth'], function() {
    Route::get('dashboard', [akuncontroller::class, 'dashboard']);
    Route::get('admin', [akuncontroller::class, 'index']);
    Route::get('kategori', [kategoricontroller::class, 'index']);
    Route::get('barang', [barangcontroller::class, 'index']);
    Route::get('supplier', [suppliercontroller::class, 'index']);
    Route::get('customer', [customercontroller::class, 'index']);
    Route::get('beli', [belicontroller::class, 'index']);
    Route::get('jual', [jualcontroller::class, 'index']);
    Route::get('laporanbeli', [belicontroller::class, 'laporanbeli']);
    Route::get('cetakbeli', [belicontroller::class, 'cetakbeli']);
    Route::get('laporanjual', [jualcontroller::class, 'laporanjual']);
    Route::get('cetakjual', [jualcontroller::class, 'cetakjual']);
    Route::get('cetakstruk/{id}', [detailcontroller::class, 'cetakstruk']);
    Route::get('toko', [tokocontroller::class, 'index']);
    Route::get('cetakbarcode', [barangcontroller::class, 'cetak']);
    Route::get('detail', [detailcontroller::class, 'index']);

    Route::post('cariadmin', [akuncontroller::class, 'cari']);
    Route::get('cariadmin', [akuncontroller::class, 'cari']);
    Route::post('carikategori', [kategoricontroller::class, 'cari']);
    Route::get('carikategori', [kategoricontroller::class, 'cari']);
    Route::post('caribarang', [barangcontroller::class, 'cari']);
    Route::get('caribarang', [barangcontroller::class, 'cari']);
    Route::post('carisupplier', [suppliercontroller::class, 'cari']);
    Route::get('carisupplier', [suppliercontroller::class, 'cari']);
    Route::post('caricustomer', [customercontroller::class, 'cari']);
    Route::get('caricustomer', [customercontroller::class, 'cari']);
    Route::post('caribeli', [belicontroller::class, 'cari']);
    Route::get('caribeli', [belicontroller::class, 'cari']);
    Route::post('carijual', [jualcontroller::class, 'cari']);
    Route::get('carijual', [jualcontroller::class, 'cari']);

    Route::post('proseslaporanbeli', [belicontroller::class, 'proseslaporan']);
    Route::get('proseslaporanbeli', [belicontroller::class, 'proseslaporan']);
    Route::post('proseslaporanjual', [jualcontroller::class, 'proseslaporan']);
    Route::get('proseslaporanjual', [jualcontroller::class, 'proseslaporan']);

    Route::get('backupdatabase', [akuncontroller::class, 'backupdatabase']);
    Route::get('prosesbackup', [akuncontroller::class, 'prosesbackup']);

    Route::get('unsesi', [detailcontroller::class, 'unsesi']);

    Route::get('panduan', [akuncontroller::class, 'panduan']);

    Route::resource('crudakun', akuncontroller::class);
    Route::resource('crudsupplier', suppliercontroller::class);
    Route::resource('crudkategori', kategoricontroller::class);
    Route::resource('crudbarang', barangcontroller::class);
    Route::resource('crudcustomer', customercontroller::class);
    Route::resource('crudbeli', belicontroller::class);
    Route::resource('crudjual', jualcontroller::class);
    Route::resource('cruddetail', detailcontroller::class);
    Route::resource('crudtoko', tokocontroller::class);

    Route::get('logout', [akuncontroller::class, 'logout']);

});

//API
Route::get('/api/beli', [belicontroller::class, 'apibeli']);
Route::get('/api/barang', [belicontroller::class, 'apibarang']);
Route::get('/api/supplier', [belicontroller::class, 'apisupplier']);
Route::get('/api/jual', [belicontroller::class, 'apipenjualan']);