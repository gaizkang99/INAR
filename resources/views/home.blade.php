<h1>INAR</h1>

<a href="{{ route('user') }}">Ir a Usuarios</a>

<a href="{{ route('weather') }}">Ir al clima</a>


<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Cerrar sesión</button>
</form>