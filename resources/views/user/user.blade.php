<h1>{{ $user['name'] }}</h1>

    <ul>
        <li><strong>Nombre de usuario:</strong> {{ $user['username'] }}</li>
        <li><strong>Correo electrónico:</strong> {{ $user['email'] }}</li>
        <li><strong>Teléfono:</strong> {{ $user['phone'] }}</li>
        <li><strong>Sitio web:</strong> {{ $user['website'] }}</li>
        <li><strong>Dirección:</strong> {{ $user['address']['street'] }}, {{ $user['address']['suite'] }}, {{ $user['address']['city'] }}, {{ $user['address']['zipcode'] }}</li>
        <li><strong>Compañía:</strong> {{ $user['company']['name'] }}</li>
    </ul>