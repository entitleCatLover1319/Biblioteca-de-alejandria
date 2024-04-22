<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\CopiaLibroController;

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

Route::resource('libro', LibroController::class);
// Route::resource('copiaLibro', CopiaLibroController::class);
Route::get('/copiaLibro/{libro_id}', [CopiaLibroController::class, 'index'])->name('copiaLibro.index');
Route::get('/copiaLibro/{libro_id}/create', [CopiaLibroController::class, 'create'])->name('copiaLibro.create');
Route::post('/copiaLibro/{libro_id}/store', [CopiaLibroController::class, 'store'])->name('copiaLibro.store');
Route::get('/copiaLibro/{copiaLibro}/show', [CopiaLibroController::class, 'show'])->name('copiaLibro.show');
Route::get('/copiaLibro/{copiaLibro}/edit', [CopiaLibroController::class, 'edit'])->name('copiaLibro.edit');
Route::patch('/copiaLibro/{copiaLibro}/edit', [CopiaLibroController::class, 'update'])->name('copiaLibro.update');
Route::delete('/copiaLibro/{copiaLibro}', [CopiaLibroController::class, 'destroy'])->name('copiaLibro.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
