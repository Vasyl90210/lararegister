<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма входа</title>
</head>
<body>
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
</body>
</html>
