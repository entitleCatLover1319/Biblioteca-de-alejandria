<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\CopiaLibroController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\DashboardController;

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
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('landingPage');

// Register Libro resource methods under the auth middleware
Route::resource('libro', LibroController::class)->only([
    'create', 'store', 'edit', 'update', 'destroy'
])->middleware('auth');

Route::get('libro/trashed', [LibroController::class, 'trashed'])->middleware('auth')->name('libro.trashed');
Route::patch('libro/trashed/{libro_id}', [LibroController::class, 'restore'])->middleware('auth')->name('libro.restore');
Route::delete('libro/trashed/{libro_id}', [LibroController::class, 'forceDelete'])->middleware('auth')->name('libro.forceDelete');

// This routes can be accessed by guest users
Route::get('libro', [LibroController::class, 'index'])->name('libro.index');
Route::get('libro/{libro}', [LibroController::class, 'show'])->name('libro.show');

Route::get('/copiaLibro/{libro_id}', [CopiaLibroController::class, 'index'])->name('copiaLibro.index');
Route::get('/copiaLibro/{copiaLibro}/show', [CopiaLibroController::class, 'show'])->name('copiaLibro.show');

// Register remaining CopiaLibroController methods under auth middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/copiaLibro/{libro_id}/create', [CopiaLibroController::class, 'create'])->name('copiaLibro.create');
    Route::post('/copiaLibro/{libro_id}/store', [CopiaLibroController::class, 'store'])->name('copiaLibro.store');
    Route::get('/copiaLibro/{copiaLibro}/edit', [CopiaLibroController::class, 'edit'])->name('copiaLibro.edit');
    Route::patch('/copiaLibro/{copiaLibro}/edit', [CopiaLibroController::class, 'update'])->name('copiaLibro.update');
    Route::delete('/copiaLibro/{copiaLibro}', [CopiaLibroController::class, 'destroy'])->name('copiaLibro.destroy');
});

Route::resource('review', ReviewController::class)->middleware('auth');
Route::delete('review/trashed/{review_id}', [ReviewController::class, 'forceDelete'])->middleware('auth')->name('review.forceDelete');

Route::resource('prestamo', PrestamoController::class)->middleware('auth');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'load'])->name('dashboard');
});
