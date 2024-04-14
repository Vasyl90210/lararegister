<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;


// Главная страница
Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

// Страница регистрации
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Страница входа
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Страница редактирования профиля
Route::get('/profile/edit', [ProfileController::class, 'showEditForm'])->name('profile.edit');
Route::post('/profile/edit', [ProfileController::class, 'edit'])->name('profile.update');

// Страница списка зарегистрированных участников (доступна только аутентифицированным пользователям)
Route::middleware('auth')->group(function () {
    Route::get('/participants', [ProfileController::class, 'listParticipants'])->name('participants.list');
});
