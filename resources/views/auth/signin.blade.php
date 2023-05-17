<!DOCTYPE html>
<html>

<head>
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}" defer></script>
</head>

<body>
    <h1>Registro de usuario</h1>
    <form method="POST" action="{{ route('signin') }}">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for="password_confirmation">Confirmar contraseña:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
        <br>
        <button type="submit">Registrarse</button>
    </form>
</body>

</html>
