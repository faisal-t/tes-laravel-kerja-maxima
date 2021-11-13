<?php

use App\Http\Controllers\MapelController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UjianController;
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


Route::get('/',[SiswaController::class,'index']);
Route::resource('/siswa', SiswaController::class);
Route::resource('/mapel', MapelController::class);
Route::resource('/peserta', PesertaController::class);
Route::resource('/ujian',UjianController::class);
Route::get('/peserta/v1/lulus',[PesertaController::class,"lulus"]);
Route::get('/peserta/v1/tidaklulus',[PesertaController::class,"tidaklulus"]);
