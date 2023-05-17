<h1>Crear usuario</h1>

    <form method="POST" action="{{ route('users.createUser') }}">
        @csrf

        <div>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="username">Nombre de usuario</label>
            <input type="text" name="username" id="username" required>
        </div>

        <div>
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" id="phone" required>
        </div>

        <div>
            <label for="website">Sitio web</label>
            <input type="text" name="website" id="website"required>
        </div>

        <button type="submit" >Crear usuario</button>
    </form>