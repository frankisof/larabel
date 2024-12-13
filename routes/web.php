<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;

// Rutas para PetController
Route::get('/pet', [PetController::class, 'index'])->name('pet.index');
Route::get('/create', [PetController::class, 'create'])->name('pets.createPet');
Route::post('/pets', [PetController::class, 'store'])->name('pets.store');
Route::get('/pets/{id}/edit', [PetController::class, 'edit'])->name('pets.edit'); // Ruta para editar
Route::put('/pets/{id}', [PetController::class, 'update'])->name('pets.update'); // Ruta para actualizar
Route::delete('/pets/{id}', [PetController::class, 'destroy'])->name('pets.destroy'); // Ruta para eliminar
Route::get('/pets/search', [PetController::class, 'search'])->name('pets.search'); // Ruta para buscar
Route::get('/home', function () { return view('home'); })->name('home');
Route::get('/', function () { return view('login'); })->name('login');

// Rutas para ServiceController
Route::get('/services', [ServiceController::class, 'index'])->name('service.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('service.create');
Route::post('/services', [ServiceController::class, 'store'])->name('service.store');
Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
Route::put('/services/{id}', [ServiceController::class, 'update'])->name('service.update');
Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
Route::get('/services/search', [ServiceController::class, 'search'])->name('service.search');

// Rutas para CitasController
Route::get('/citas', [AppointmentController::class, 'index'])->name('citas.index');
Route::get('/citas/create', [AppointmentController::class, 'create'])->name('citas.create');
Route::post('/citas', [AppointmentController::class, 'store'])->name('citas.store');
Route::get('/citas/{id}/edit', [AppointmentController::class, 'edit'])->name('citas.edit');
Route::put('/citas/{id}', [AppointmentController::class, 'update'])->name('citas.update');
Route::delete('/citas/{id}', [AppointmentController::class, 'destroy'])->name('citas.destroy');
Route::get('/citas/search', [AppointmentController::class, 'search'])->name('citas.search');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');