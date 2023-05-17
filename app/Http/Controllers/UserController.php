<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UserController extends Controller
{
    //Funcion que recoge todos los usuarios recibidos en el get a la url posterior y los lista en formato tabla en el cliente
    public function mostrarUsuarios()
    {
        $client = new Client();

        try {
            $response = $client->get('https://jsonplaceholder.typicode.com/users');

            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $users = json_decode($response->getBody(), true);
                return view('usuarios', ['users' => $users]);
            } else {
                return response()->json(['error' => 'Error al obtener los usuarios'], $statusCode);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    //Funcion que realiza un post en la api de JSONPlaceholder y recibe una respuesta de creacion correcta cuando el usuario se introduce de
    //manera correcta en la BBDD
    public function createUser(Request $request)
    {
        $client = new Client();

        try {
            $response = $client->post('https://jsonplaceholder.typicode.com/users', [
                'json' => [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'username' => $request->input('username'),
                ]
            ]);

            $statusCode = $response->getStatusCode();
            if ($statusCode == 201) {
                return response()->json(['message' => 'Usuario creado correctamente'], 200);
            } else {
                return response()->json(['error' => 'Error al crear el usuario'], $statusCode);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    //Funcion que recoge un usuario de la api para la posterior edicion en la vista editar
    public function modificarUsuario($id){
        $client = new Client();
        try {
            $response = $client->get('https://jsonplaceholder.typicode.com/users/' . $id);

            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $user = json_decode($response->getBody(), true);
                // dd($user);
                return view('user.edit', ['user' => $user]);
            } else {
                return response()->json(['error' => 'Error al obtener el usuario'], $statusCode);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    //Funcion que recoge un usuario segun id en la api para mostrar sus datos en una vista personalizada
    public function editarUsuario($id)
    {
        $client = new Client();
        try {
            $response = $client->get('https://jsonplaceholder.typicode.com/users/' . $id);

            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $user = json_decode($response->getBody(), true);
                return view('user.user', ['user' => $user]);
            } else {
                return response()->json(['error' => 'Error al obtener el usuario'], $statusCode);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    //Funcion que realiza una peticion put de edicion a la api y recibe un 200 si es correcta la peticion.
    public function updatearUsuario(Request $request, $id)
    {
        $client = new Client();

        try {
            $response = $client->put('https://jsonplaceholder.typicode.com/users/' . $id, [
                'json' => [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'username' => $request->input('username'),
                ]
            ]);

            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                return response()->json(['message' => 'Usuario actualizado correctamente'], 200);
            } else {
                return response()->json(['error' => 'Error al actualizar el usuario'], $statusCode);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
