<!-- resources/views/edit_profile.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма редактирования профиля</title>
</head>
<body>
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
</body>
</html>
