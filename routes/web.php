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

Route::get('/', 'PegawaiController@index')->name('pegawai.index');
Route::post('/create', 'PegawaiController@create')->name('pegawai.create');
Route::post('/show', 'PegawaiController@show')->name('pegawai.show');
Route::post('/update', 'PegawaiController@update')->name('pegawai.update');
Route::post('/delete', 'PegawaiController@destroy')->name('pegawai.delete');
