<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
        return view('users.index', compact('user'));
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
    // Проверка, является ли текущий аутентифицированный пользователь владельцем профиля
    if (Auth::id() !== $user->id) {
        abort(403, 'Unauthorized action.');
    }

    // Обновление полей модели пользователя на основе данных из запроса
    $user->name = $request->input('name');
    $user->surname = $request->input('surname');
    $user->gender = $request->input('gender');
    $user->nationality = $request->input('nationality');
    $user->organization = $request->input('organization');
    $user->position = $request->input('position');
    $user->birthdate = $request->input('birthdate');
    $user->email = $request->input('email');

    // Проверка, был ли предоставлен новый пароль, и если да, обновление пароля
    if ($request->filled('password')) {
        $user->password = bcrypt($request->input('password'));
    }

    // Сохранение обновленных данных пользователя
    $user->save();

    // Редирект на страницу профиля пользователя или на другую страницу
    return Redirect::route('login');
    //return redirect()->route('users.show', $user->id)->with('success', 'Profile updated successfully!');
}

}
