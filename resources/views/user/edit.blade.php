<form method="POST" action="{{ route('user.update', ['id' => $user['id']]) }}">
    @method('PUT')
    @csrf
    <label for="name">Nombre:</label>
    <input type="text" name="name" value="{{ $user['name'] }}" required>
    <br>
    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" value="{{ $user['email'] }}" required>
    <br>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit">Guardar cambios</button>
</form>