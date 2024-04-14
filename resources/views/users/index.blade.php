@extends('layouts.app')

@section('title', 'Registered Users')

@section('content')
    <div class="container">
        <h1>Registered Users</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Organization</th>
                    <th>Action</th>
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
@endsection
