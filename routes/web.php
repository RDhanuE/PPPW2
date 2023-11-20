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

Route::get('/something', [postController::class, 'index']) -> middleware('admin');

Route::get('/somethingUser', [postController::class, 'indexUser']) ;

Route::get('/somethingUser/{id}', [postController::class, 'detailSomething'])-> name('user.index');


Route::get('something/create', [postController::class, 'create'])->name('something.create') -> middleware('admin') ;

Route::post('something', [postController::class, 'store']) -> name('something.store');

Route::post('something/delete/{id}', [postController::class, 'destroy']) -> name('something.destroy') -> middleware('admin');

Route::get('something/update/{id}', [postController::class, 'edit'])->name('something.edit') -> middleware('admin');

Route::post('something/update/{id}', [postController::class, 'update']) -> name('something.update');

Route::get('/something/search', [postController::class, 'search']) -> name('something.search');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/view', function () {
    return view('view');
});

Route::get('/detail_something/{search}', [postController::class,'something1kitten']) -> name('something.SEO');

// Route::resource('something', postController::class) -> middleware('auth');

require __DIR__.'/auth.php';
