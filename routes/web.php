<?php

use App\Http\Controllers\BarangController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [BarangController::class, 'index']);

Route::post('/savebarang', [BarangController::class, 'tambah']);

Route::get('/getdata', [BarangController::class, 'get']);

Route::get('/getdb', [BarangController::class, 'get_db']);

Route::get('/hapusdata/{id}', [BarangController::class, 'hapus']);

Route::get('/editdata/{id}', [BarangController::class, 'editt']);

Route::get('/edit-fetch/{id}', [BarangController::class, 'fetch']);

Route::get('/edit-submit', [AkuController::class, 'submit']);


