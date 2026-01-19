<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <ul>
        @foreach($users as $user)
            <li>{{ $user['first_name'] }} {{ $user['last_name'] }} - {{ $user['email'] }}</li>
        @endforeach
    </ul>
</body>
</html>
