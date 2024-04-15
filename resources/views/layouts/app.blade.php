<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Подключение Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Навигационная панель -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Моя конференция</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Кнопка "Регистрация" -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                </li>
                <!-- Кнопка "Вход" -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Вход</a>
                </li>
                <!-- Кнопка "Назад" -->
                <li class="nav-item">
                    <a class="nav-link" href="javascript:history.back()">Назад</a>
                </li>
                <!-- Добавьте здесь другие пункты меню, если необходимо -->
            </ul>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <script>
        // Добавляем состояние истории при загрузке страницы
        window.history.pushState({ page: 1 }, "", "");

        // Обработчик события нажатия кнопки "Назад"
        window.addEventListener("popstate", function(event) {
            // Проверяем, авторизован ли пользователь
            if (!{{ auth()->check() ? 'true' : 'false' }}) {
                // Если пользователь не авторизован, делаем редирект на страницу входа
                window.location.href = '{{ route('login') }}';
            }
        });
    </script>
</body>
</html>
