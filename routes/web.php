<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/post', function () {
    return view('post');
});
        
Route::get('/cadastro', function () {
    return view('usuarios.create');
});

Route::get('/login', function () {
    return view('usuarios.login');
});
    
Route::get('/logout', function () {
    Auth::logout();
    return view('index');
});

Route::post('/login', ['uses' => 'UsuarioController@auth', 'as' => 'usuarios.auth']);

Route::resource('usuarios', 'UsuarioController');