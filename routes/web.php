<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WordsController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

// use App\Http\Controllers\PostController;

Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/home/create', [HomeController::class, 'create'])->name('home.create');
Route::post('/home/store', [HomeController::class, 'store'])->name('home.store');
Route::get('/home/edit/{notebook_id}', [HomeController::class, 'edit'])->name('home.edit');
Route::put('/home/update/{notebook_id}', [HomeController::class, 'update'])->name('home.update');
Route::delete('/home/destroy/{notebook_id}', [HomeController::class, 'destroy'])->name('home.destroy');

Route::get('/word/{notebook_id}', [WordsController::class, 'index'])->name('word.index');
Route::get('/word/{notebook_id}/create', [WordsController::class, 'create'])->name('word.create');
Route::post('/word/{notebook_id}/store', [WordsController::class, 'store'])->name('word.store');
Route::get('/word/{notebook_id}/edit/{word_id}', [WordsController::class, 'edit'])->name('word.edit');
Route::put('/word/{notebook_id}/update/{word_id}', [WordsController::class, 'update'])->name('word.update');
Route::delete('/word/{notebook_id}/destroy/{word_id}', [WordsController::class, 'destroy'])->name('word.destroy');

Route::get('/word/{notebook_id}/test', [WordsController::class, 'test'])->name('word.test');
Route::post('/word/{notebook_id}/result', [WordsController::class, 'result'])->name('word.result');
