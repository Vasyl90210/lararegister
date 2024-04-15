<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        Auth::logout();
        return view('register');
    }

    public function register(Request $request)
    {
        //dd($request->all());
            // Валидация данных
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'gender' => 'required|string|in:male,female,other',
                'nationality' => 'required|string|max:255',
                'organization' => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'birthdate' => 'required|date',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:3',
                'password_confirmation' => 'required|string|min:3|same:password',
            ]);

            // Создание нового пользователя
            $user = User::create([
                'name' => $validatedData['name'],
                'surname' => $validatedData['surname'],
                'gender' => $validatedData['gender'],
                'nationality' => $validatedData['nationality'],
                'organization' => $validatedData['organization'],
                'position' => $validatedData['position'],
                'birthdate' => $validatedData['birthdate'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);
            return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
}
