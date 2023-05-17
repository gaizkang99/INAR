<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class WeatherController extends Controller
{
    //Peticion get a la url marcada abajo para recoger la temperatura en una ciudad recibida por parametro request
    //Recoge el objeto y lo manda a la vista para mostrarlo en el navegador del cliente
    public function mostrarClimaPorCiudad(Request $request)
    {
        $apiKey = '9512ca9877d1532a5dbfcd3faa335f2a';
        $client = new Client();
        $city = $request->input('city');
        try {
            $response = $client->get("http://api.openweathermap.org/data/2.5/weather", [
                'query' => [
                    'q' => request('city'),
                    'appid' => $apiKey,
                ],
            ]);

            $data = json_decode($response->getBody(), true);
            $info = $data['main'];

            $temperatura_actual = $info['temp'];
            $temperatura_minima = $info['temp_min'];
            $temperatura_maxima = $info['temp_max'];
            $humedad = $info['humidity'];
            $presion = $info['pressure'];

            $datos_clima = [
                'temperatura_actual' => $temperatura_actual,
                'temperatura_minima' => $temperatura_minima,
                'temperatura_maxima' => $temperatura_maxima,
                'humedad' => $humedad,
                'presion' => $presion,
            ];

            return view('weather.city', ['ciudad' => $datos_clima, 'name' => $data['name']]);
        } catch (RequestException $e) {
            // Manejo de errores de la solicitud
            if ($e->hasResponse()) {
                $errorMessage = $e->getResponse()->getBody();
                return response()->json(['error' => $errorMessage]);
            } else {
                return response()->json(['error' => 'Error en la solicitud']);
            }
        }
    }
}
