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
Route::get("/", function(){
    return view("Welcome");
});
Route::get('home', 'TestController@form');

Route::post('simpan', 'TestController@save_data');

Route::get('lihat', 'TestController@data');

Route::get('lihat/{id}', 'TestController@lihat');

Route::post('ubah/{id}', 'TestController@ubah');

Route::get('hapus/{id}', 'TestController@hapus');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('importExport', 'MaatwebsiteDemoController@importExport');
Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');