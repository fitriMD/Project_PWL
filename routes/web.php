<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlatMusikController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\HistoryController;


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
Auth::routes();

Route::get('/', function () {
    return view('index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/users', function () {
//     return view('users.index');
// });

Route::get('logout', [Auth::class, 'logout'], function () {
    return abort(404);
});

Route::resource('produk', AlatMusikController::class)->middleware('auth');
// Route::prefix('admin')->middleware('auth')->group(function(){
//     Route::get('/produk', [AdminController::class, 'produk'])->name('admin.produk');
// });

Route::get('produk/cetak_pdf/{produk}', [AlatMusikController::class, 'cetak_pdf'])->name('produk.cetak_pdf');


Route::get('/about', [App\Http\Controllers\AboutController::class, 'about']);
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'contact']);
Route::get('/index', [App\Http\Controllers\UsersController::class, 'index']);
Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'profil']);
Route::get('/tampil', [App\Http\Controllers\AlatMusikController::class, 'tampil']);

Route::get('/pesan/{id}', [PesanController::class, 'index']);
Route::post('/pesan/{id}', [PesanController::class, 'pesan']);

Route::get('check-out', [PesanController::class, 'check_out']);
Route::delete('check-out/{id}', [PesanController::class, 'delete']);

Route::get('konfirmasi-check-out', [PesanController::class, 'konfirmasi']);

Route::get('history', [HistoryController::class, 'index']);
Route::get('history/{id}', [HistoryController::class, 'detail']);

