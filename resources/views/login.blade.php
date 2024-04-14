@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
<div class="container">
    <h1>Форма входа</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
        </div>
        <div>
            <label for="password">Пароль:</label><br>
            <input type="password" id="password" name="password" required><br>
        </div>
        <button type="submit">Войти</button>
    </form>
</div>
@endsection
