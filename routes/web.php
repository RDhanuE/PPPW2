<?php

use App\Http\Controllers\aboutController;
use App\Http\Controllers\postController;
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

Route::get('/',  [postController::class, 'index']);

Route::get('/about', [aboutController::class, 'about_view']);

Route::get('test', [postController::class, 'testing']);

Route::get('something', [postController::class, 'index']);

Route::get('something/create', [postController::class, 'create'])->name('something.create');

Route::post('something', [postController::class, 'store']) -> name('something.store');

Route::post('something/delete/{id}', [postController::class, 'destroy']) -> name('something.destroy');

Route::get('something/update/{id}', [postController::class, 'edit'])->name('something.edit');

Route::post('something/update/{id}', [postController::class, 'update']) -> name('something.update');

Route::get('/something/search', [postController::class, 'search']) -> name('something.search');