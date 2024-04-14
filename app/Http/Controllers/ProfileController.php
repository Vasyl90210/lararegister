<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showEditForm()
    {
        return view('edit_profile');
    }

    public function edit(Request $request)
    {
        return view('edit_profile');
        // Ваша логика обновления профиля пользователя здесь
    }

    public function listParticipants()
    {
        return view('participants_list');
        // Ваша логика отображения списка зарегистрированных участников здесь
    }
}
