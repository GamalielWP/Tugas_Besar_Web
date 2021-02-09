<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*Route::get('filmanime','apianimecontroller@get_all_anime');
Route::post('tambahfilmanime','apianimecontroller@insert_data_anime');
Route::put('updatefilmanime/{kode_anime}','apianimecontroller@update_data_anime');
Route::delete('deletefilmanime/{kode_anime}','apianimecontroller@delete_data_anime');*/

Route::post('mahasiswa','MahasiswaApiController@store');
Route::get('mahasiswa','MahasiswaApiController@index');
Route::put('mahasiswa/{id}','MahasiswaApiController@update');
Route::delete('mahasiswa/{id}','MahasiswaApiController@destroy');