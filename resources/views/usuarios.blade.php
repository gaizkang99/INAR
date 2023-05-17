<h1>Usuarios</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Nombre de usuario</th>
                <th>Correo electrónico</th>
                <th>Teléfono</th>
                <th>Sitio web</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['username'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['phone'] }}</td>
                    <td>{{ $user['website'] }}</td>
                    <td><a href="users/{{$user['id']}}">Ver</a></td>
                    <td><a href="users/edit/{{$user['id']}}">Editar</a></td>
            @endforeach
        </tbody>
    </table>
<a href="{{ route('user.create') }}">Create User</a>