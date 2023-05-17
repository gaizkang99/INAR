<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});


//Rutas para el registro e inicio de sesion 
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.signin');
})->name('register');
Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
Route::post('/login', [AuthController::class, 'loginSuccesful'])->name('loginSuccesful');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



//Rutas para usar el controlador userController que llleva la api de JSONPlaceHolder para crear, editar y mostrar usuarios
Route::get('/users', [UserController::class, 'mostrarUsuarios'])->name('user')->middleware('auth');
Route::get('/users/{id}', [UserController::class, 'editarUsuario'])->name('user.show')->middleware('auth');
Route::get('/users/edit/{id}', [UserController::class, 'modificarUsuario'])->name('user.edit')->middleware('auth');
Route::get('/user/create', function () {
    return view('user.create');
})->name('user.create')->middleware('auth');
Route::post('/users/create', [UserController::class, 'createUser'])->name('users.createUser');
Route::put('/users/{id}', [UserController::class, 'updatearUsuario'])->name('user.update')->middleware('auth');


//Rutas para mostrar el tiempo en una ciudad concreta del mundo
Route::get('/weather', function () {
    return view('weather');
})->name('weather')->middleware('auth');
Route::get('/weather/entiemporeal', [WeatherController::class, 'mostrarClimaPorCiudad'])->name('weather.city');





