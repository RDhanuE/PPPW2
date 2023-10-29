<?php

use App\Http\Controllers\postController;
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

Route::get('/about', [aboutController::class, 'about_view']);

Route::get('test', [postController::class, 'testing']);

Route::get('/something', [postController::class, 'index']) -> middleware('auth');

Route::get('something/create', [postController::class, 'create'])->name('something.create') -> middleware('auth') ;

Route::post('something', [postController::class, 'store']) -> name('something.store');

Route::post('something/delete/{id}', [postController::class, 'destroy']) -> name('something.destroy') -> middleware('auth');

Route::get('something/update/{id}', [postController::class, 'edit'])->name('something.edit') -> middleware('auth');

Route::post('something/update/{id}', [postController::class, 'update']) -> name('something.update');

Route::get('/something/search', [postController::class, 'search']) -> name('something.search');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/view', function () {
    return view('view');
});

require __DIR__.'/auth.php';
