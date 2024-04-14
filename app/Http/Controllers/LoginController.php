<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Аутентификация успешна
        return redirect()->route('users.index');
    } else {
        // Неправильные учетные данные
        return back()->withErrors(['email' => 'Неверный email или пароль.'])->withInput();
    }
}

}
