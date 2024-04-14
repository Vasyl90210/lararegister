<!-- resources/views/participants_list.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список зарегистрированных участников</title>
</head>
<body>
    <h1>Список зарегистрированных участников</h1>
    <table>
        <thead>
            <tr>
                <th>№</th>
                <th>Имя Фамилия</th>
                <th>Пол</th>
                <th>Национальность</th>
                <th>Название организации</th>
                <th>Должность</th>
                <th>Дата рождения</th>
                <th>Email</th>
                <!-- Добавьте здесь любые другие поля, если они есть -->
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($participants as $participant)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $participant->name }} {{ $participant->surname }}</td>
                    <td>{{ $participant->gender }}</td>
                    <td>{{ $participant->nationality }}</td>
                    <td>{{ $participant->organization }}</td>
                    <td>{{ $participant->position }}</td>
                    <td>{{ $participant->date_of_birth }}</td>
                    <td>{{ $participant->email }}</td>
                    <!-- Выведите остальные данные участника -->
                    <td>
                        <!-- Добавьте кнопку для редактирования, если требуется -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
