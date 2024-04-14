@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
<div class="container">
    <h1>Форма редактирования профиля</h1>
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        <div>
            <label for="name">Имя:</label><br>
            <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required><br>
        </div>
        <div>
            <label for="surname">Фамилия:</label><br>
            <input type="text" id="surname" name="surname" value="{{ auth()->user()->surname }}" required><br>
        </div>
        <!-- Добавьте остальные поля здесь -->
        <button type="submit">Сохранить</button>
    </form>
</div>
@endsection
