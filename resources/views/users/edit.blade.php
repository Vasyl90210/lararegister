@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="container">
        <h1>Редактироваие профиля</h1>
        <div class="row justify-content-center">
            <div class="col-md-8"> <!-- Определяем ширину для больших устройств -->
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Имя -->
                    <div class="form-group">
                        <label for="name">Имя:</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control">
                    </div>

                    <!-- Фамилия -->
                    <div class="form-group">
                        <label for="surname">Фамилия:</label>
                        <input type="text" id="surname" name="surname" value="{{ old('surname', $user->surname) }}" class="form-control">
                    </div>

                    <!-- Пол -->
                    <div class="form-group">
                        <label for="gender">Пол:</label>
                        <select id="gender" name="gender" class="form-control">
                            <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Мужской</option>
                            <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Женский</option>
                            <option value="other" {{ $user->gender === 'other' ? 'selected' : '' }}>Другой</option>
                        </select>
                    </div>

                    <!-- Национальность -->
                    <div class="form-group">
                        <label for="nationality">Национальность:</label>
                        <input type="text" id="nationality" name="nationality" value="{{ old('nationality', $user->nationality) }}" class="form-control">
                    </div>

                    <!-- Название организации -->
                    <div class="form-group">
                        <label for="organization">Организация:</label>
                        <input type="text" id="organization" name="organization" value="{{ old('organization', $user->organization) }}" class="form-control">
                    </div>

                    <!-- Должность -->
                    <div class="form-group">
                        <label for="position">Должность:</label>
                        <input type="text" id="position" name="position" value="{{ old('position', $user->position) }}" class="form-control">
                    </div>

                    <!-- Дата рождения -->
                    <div class="form-group">
                        <label for="birthdate">Дата рождения:</label>
                        <input type="date" id="birthdate" name="birthdate" value="{{ old('birthdate', $user->birthdate) }}" class="form-control">
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                    </div>

                    <!-- Пароль
                    <div class="form-group">
                        <label for="password">Пароль:</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                     Подтверждение пароля 
                    <div class="form-group">
                        <label for="password_confirmation">Подтверди пароль:</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @if($errors->any())
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            document.querySelector('.is-invalid').focus();
                        });
                    </script>
                    @endif -->
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection
