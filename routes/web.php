<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\InvitadoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
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



Route::resource('usuarios',UserController::class)->middleware('auth');
Route::resource('invitados', InvitadoController::class)->middleware('auth');
Route::resource('roles', RoleController::class)->middleware('auth');

Route::get('/invitados/registrar/{invitadoId}', [InvitadoController::class, 'registrar'])->name('invitados.registrar');
Route::get('/invitados/validar-qr/{codigo}', [InvitadoController::class, 'validarQR'])->name('invitados.validar-qr');
Route::get('invitados/generar-pdf/{invitado}', [InvitadoController::class, 'generarPDF'])->name('invitados.generarPDF');





Route::get('/url', function () {
    return view('url');
});

require __DIR__.'/auth.php';
