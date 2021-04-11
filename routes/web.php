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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/users','UsersController');
Route::resource('/barang','BarangController');
Route::resource('/supplier','SupplierController');
Route::resource('/kategori','KategoriController');

Route::get('pinjam-barang/kembalikan/{id}','PinjamBarangController@kembalikan');
Route::resource('/pinjam-barang','PinjamBarangController');

Route::get('/pegawai/create','PegawaiController@create');
Route::resource('/pegawai','PegawaiController');