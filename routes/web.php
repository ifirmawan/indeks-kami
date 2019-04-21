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
Route::get('/tentang-kami', 'HomeController@tentangKami')->name('tentang-kami')->middleware('auth');
Route::resource('kategori-se', 'KategoriSEController')->middleware('auth');
Route::resource('kerangka-kerja', 'KerangkaKerjaController')->middleware('auth');
Route::resource('tata-kelola', 'TataKelolaController')->middleware('auth');
Route::resource('pengelolaan-aset', 'PengelolaanAsetController')->middleware('auth');
Route::resource('risiko', 'RisikoController')->middleware('auth');
Route::resource('teknologi', 'TeknologiController')->middleware('auth');
Route::resource('responden', 'RespondenController')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/json-radar', 'HomeController@getJsonRadar')->name('json-radar');
Route::get('tata-kelola-status', 'TataKelolaController@status')->name('tata-kelola.status')->middleware('auth');