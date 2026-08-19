<?php
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\JuradoController;
use Illuminate\Support\Facades\Route;

// Página de inicio
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rutas para el módulo de Jurados
Route::resource('jurados', JuradoController::class)->names([
    'index' => 'jurados.index',
    'create' => 'jurados.create',
    'store' => 'jurados.store',
    'show' => 'jurados.show',
    'edit' => 'jurados.edit',
    'update' => 'jurados.update',
    'destroy' => 'jurados.destroy'
]);

// Rutas para el módulo de Participantes
Route::resource('participants', ParticipantController::class)->names([
    'index' => 'participants.index',
    'create' => 'participants.create',
    'store' => 'participants.store',
    'show' => 'participants.show',
    'edit' => 'participants.edit',
    'update' => 'participants.update',
    'destroy' => 'participants.destroy'
]);