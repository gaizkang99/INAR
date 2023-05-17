<h1>Weather</h1>

<form action="{{ route('weather.city') }}" method="GET">
    @csrf
    <div>
        <label for="city">Ingresa el nombre de una ciudad:</label>
        <input type="text" name="city" id="city">
    </div>
    <button type="submit">Buscar clima</button>
</form>


