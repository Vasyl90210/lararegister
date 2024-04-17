<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        Auth::logout();
        return view('register');
    }

    public function register(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'gender' => 'required|string|in:male,female,other',
        'nationality' => 'required|string|max:255',
        'organization' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'birthdate' => 'required|date',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:3|confirmed',
    ], [
        'password.confirmed' => 'Пароли не совпадают.',
    ]);

    User::create([
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
