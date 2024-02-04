<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//home utang
Route::get('/utang', 'App\Http\Controllers\UtangController@index');
Route::get('/utang/tambah','App\Http\Controllers\UtangController@create');
Route::post('/utang/store','App\Http\Controllers\UtangController@store');
Route::get('/utang/edit/{id}','App\Http\Controllers\UtangController@edit');
Route::post('/utang/update','App\Http\Controllers\UtangController@update');
Route::get('/utang/hapus/{id}','App\Http\Controllers\UtangController@destroy');

require __DIR__.'/auth.php';
