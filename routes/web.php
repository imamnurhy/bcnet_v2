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
Route::get('/', 'WelcomeController@index')->name('welcome.index');
Route::get('pelanggan', 'PelangganController@index')->name('pelanggan.index');
Route::get('pelanggan/create', 'PelangganController@create')->name('pelanggan.create');
Route::post('pelanggan/store', 'PelangganController@store')->name('pelanggan.store');
Route::get('pelanggan/edit/{id}', 'PelangganController@edit')->name('pelanggan.edit');
Route::post('pelanggan/update/{id}', 'PelangganController@update')->name('pelanggan.update');
Route::delete('pelanggan/destroy/{id}', 'PelangganController@destroy')->name('pelanggan.destroy');
Route::post('pelanggan/search', 'PelangganController@search')->name('pelanggan.search');

Route::resource('pelayanan', 'PelayananController');
Route::resource('pembayaran', 'PembayaranController');


