<!-- resources/views/users/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="container">
        <h1>Edit Profile</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Имя -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control">
            </div>

            <!-- Фамилия -->
            <div class="form-group">
                <label for="surname">Surname:</label>
                <input type="text" id="surname" name="surname" value="{{ old('surname', $user->surname) }}" class="form-control">
            </div>

            <!-- Пол -->
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" class="form-control">
                    <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ $user->gender === 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <!-- Национальность -->
            <div class="form-group">
                <label for="nationality">Nationality:</label>
                <input type="text" id="nationality" name="nationality" value="{{ old('nationality', $user->nationality) }}" class="form-control">
            </div>

            <!-- Название организации -->
            <div class="form-group">
                <label for="organization">Organization:</label>
                <input type="text" id="organization" name="organization" value="{{ old('organization', $user->organization) }}" class="form-control">
            </div>

            <!-- Должность -->
            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" id="position" name="position" value="{{ old('position', $user->position) }}" class="form-control">
            </div>

            <!-- Дата рождения -->
            <div class="form-group">
                <label for="birthdate">Date of Birth:</label>
                <input type="date" id="birthdate" name="birthdate" value="{{ old('birthdate', $user->birthdate) }}" class="form-control">
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
            </div>

            <!-- Пароль -->
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>

            <!-- Подтверждение пароля -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
