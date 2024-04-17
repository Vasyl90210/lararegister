@extends('layouts.app')

@section('title', 'Registered Users')

@section('content')
    <div class="container">
        <h1>Зарегистрированные пользователи</h1>
        <div class="table-responsive"> <!-- Добавляем класс table-responsive для создания адаптивной таблицы -->
            <table class="table table-striped"> <!-- Добавляем классы table и table-striped -->
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Email</th>
                        <th>Организация</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->organization }}</td>
                        <td>
                            @auth
                            <a href="{{ route('users.edit', $user->id) }}">Редактировать профиль</a>
                            @endauth
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
