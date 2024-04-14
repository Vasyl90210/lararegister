<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show($userId)
    {
        // Получаем пользователя по его идентификатору
        $user = User::findOrFail($userId);

        // Передаем идентификатор пользователя в представление
        return view('your_view', ['id' => $user->id, 'user' => $user]);
    }

    public function edit($id)
{
    // Получаем текущего авторизованного пользователя
    $currentUser = Auth::user();

    // Получаем пользователя, которого мы пытаемся отредактировать
    $user = User::findOrFail($id);

    // Проверяем, является ли текущий пользователь владельцем профиля
    if ($currentUser->id !== $user->id) {
        abort(403, 'Unauthorized action.');
    }

    return view('users.edit', compact('user'));
}


    public function update(Request $request, User $user)
    {
        // Логика обновления информации о пользователе
    }
}
