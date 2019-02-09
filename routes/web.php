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

Route::resource('/', 'AnggotaController')->middleware('myauth'); 
Route::get('auth', 'AdminController@index')->name('login');
Route::post('/login', 'AdminController@login'); 
Route::get('/logout', 'AdminController@logout')->middleware('myauth'); 
Route::resource('anggota', 'AnggotaController')->middleware('myauth'); 
Route::get('transaksi/setor','TransaksiController@setor')->name('transaksi.setor')->middleware('myauth');
Route::post('transaksi/setor','TransaksiController@storesetor')->name('transaksi.setor')->middleware('myauth');
Route::get('transaksi/penarikan/','TransaksiController@getsaldo')->name('transaksi.penarikan')->middleware('myauth');
Route::post('transaksi/penarikan/','TransaksiController@penarikan')->name('transaksi.penarikan')->middleware('myauth');
Route::get('transaksi/mutasi/','TransaksiController@mutasi')->name('transaksi.mutasi')->middleware('myauth');