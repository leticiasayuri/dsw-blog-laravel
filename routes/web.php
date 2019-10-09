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

Route::get('/', 'PostController@index');

Route::middleware('auth')->get('/postar', function () {
    return view('posts.create');
});
        
Route::get('cadastro', function () {
    return view('usuarios.create');
});

Route::get('login', function () {
    return view('usuarios.login');
})->name('login');
    
Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::post('login', ['uses' => 'UsuarioController@auth', 'as' => 'usuarios.auth']);

Route::resource('usuarios', 'UsuarioController');

Route::resource('posts', 'PostController');

Route::resource('comentarios', 'ComentarioController');

Route::get('/posts/{id}',
    [
        'uses' => 'PostController@show',
        'as' => 'posts.show'
    ]
);
