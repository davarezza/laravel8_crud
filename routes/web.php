<?php

use App\Http\Controllers\StudentController;
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
    return redirect('siswa');
});

Route::get('/siswa', [StudentController::class, 'index'])->name('siswa');

Route::get('/tambah', [StudentController::class, 'tambah'])->name('tambah');
Route::post('/insertdata', [StudentController::class, 'insertdata'])->name('insertdata');

Route::get('/tampildata/{id}', [StudentController::class, 'tampildata'])->name('tampildata');
Route::post('/updatedata/{id}', [StudentController::class, 'updatedata'])->name('updatedata');

Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('delete');
