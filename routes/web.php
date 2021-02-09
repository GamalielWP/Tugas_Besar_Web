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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/','MyController@index')->name('index');
Route::get('/about','MyController@about')->name('about');
Route::get('/mahasiswa','MhsModelController@index')->name('mahasiswa.index');
Route::post('/mahasiswa/tambah','MhsModelController@store')->name('mahasiswa.store');
Route::get('/mahasiswa/edit/{id}','MhsModelController@edit')->name('mahasiswa.edit');
Route::put('/mahasiswa/edit/{id}','MhsModelController@update')->name('mahasiswa.update');
Route::get('/mahasiswa/tambah','MhsModelController@create')->name('mahasiswa.create');
Route::delete('/mahasiswa/hapus/{id}','MhsModelController@destroy')->name('mahasiswa.destroy');
Route::get('/mahasiswa/data','MhsModelController@data')->name('mahasiswa.data');
Route::get('/mahasiswa/data/hapus/{id}','MhsModelController@data_destroy')->name('mahasiswa.data.destroy');*/

//ingat '/nama_link' tidak boleh sama
Route::get('/','TubesWebController@index')->name('index');
Route::get('/newregis','TubesWebController@dropbox')->name('regisbaru');
Route::post('/newregis/pasien','TubesWebController@simpan')->name('simpan');

Route::post('/kodelog/pasien/data','TubesWebController@login_pasien')->name('loginpasien');

Route::get('/kodelog','TubesWebController@index_login_staff')->name('loginstaff');
Route::post('/admin/data','TubesWebController@login_staff')->name('loginadmin');
Route::get('/admin/data/umum/{id}','TubesWebController@admin_umum')->name('adminumum');
Route::get('/admin/data/poli/{id}','TubesWebController@admin_poli')->name('adminpoli');
Route::put('/admin/data/panggil/{id}','TubesWebController@call')->name('panggil');
Route::put('/admin/data/panggil/poli/{id}','TubesWebController@callpoly')->name('panggilpoli');
//Route::get('/kodelog/admin/out','TubesWebController@logout')->name('logout');

//buat login pake kode
Route::group(['middleware' => ['kodelog','adminlog']], function(){
    Route::get('/pasien/data/{id}','TubesWebController@data_pasien')->name('datapasien');
    Route::get('/pasien/data/{id}/{poly}','TubesWebController@poli_pasien')->name('polipasien');
    Route::put('/pasien/data/{id}/update','TubesWebController@update_numb_poly_status')->name('update.nopoli_status');
    Route::put('/pasien/data/{id}/poli/update','TubesWebController@update_numb_regis')->name('update.noregis');
});