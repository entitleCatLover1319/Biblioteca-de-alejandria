<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

// Register Libro resource methods under the auth middleware
Route::resource('libro', LibroController::class)->only([
    'create', 'store', 'edit', 'update', 'destroy'
])->middleware('auth');

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

Route::resource('prestamo', PrestamoController::class)->middleware('auth');
// Route::get('probar-correo/{copiaLibro}', function(CopiaLibro $copia_libro) {
//     return new App\Mail\BorrowStartNotification($copia_libro);
// })->name('probar-correo');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'load'])->name('dashboard');
});
