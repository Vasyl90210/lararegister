<!-- edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')
        <!-- Форма редактирования информации о пользователе -->
    </form>
@endsection
