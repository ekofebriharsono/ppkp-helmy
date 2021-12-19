<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Mahasiswa
Route::get('/mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'index'])->name('mahasiswa');
Route::get('/mahasiswa/{nim}', [App\Http\Controllers\MahasiswaController::class, 'detail']);
Route::get('/mahasiswa/{nim}/edit', [App\Http\Controllers\MahasiswaController::class, 'edit']);
Route::get('/mahasiswa/{nim}/hapus', [App\Http\Controllers\MahasiswaController::class, 'hapus']);
Route::post('/mahasiswa/simpan', [App\Http\Controllers\MahasiswaController::class, 'update']);
Route::post('/mahasiswa/insert', [App\Http\Controllers\MahasiswaController::class, 'insert']);

Route::post('/postAspirasi', [App\Http\Controllers\DataAspirasiController::class, 'postAspirasi']);

Route::post('postMahasiswa', [App\Http\Controllers\MahasiswaController::class, 'postMahasiswa']);

Route::get('/hapusMahasiswa/{nim}', [App\Http\Controllers\MahasiswaController::class, 'hapus']);
