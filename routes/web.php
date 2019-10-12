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

Route::get('/comentarios/destroy/{id}',
    [
        'uses' => 'ComentarioController@destroy',
        'as' => 'comentarios.destroy'
    ]
);

Route::get('/posts/edit/{id}',
    [
        'uses' => 'PostController@edit',
        'as' => 'posts.edit'
    ]
);

Route::put('/posts/{id}',
    [
        'uses' => 'PostController@update',
        'as' => 'posts.update'
    ]
);

Route::delete('/posts/{id}',
    [
        'uses' => 'PostController@destroy',
        'as' => 'posts.destroy'
    ]
);

Route::get('/usuarios/edit/{id}', 
    [
        'uses' => 'UsuarioController@edit',
        'as' => 'usuarios.edit'        
    ]
);

Route::put('/usuarios/{id}',
    [
        'uses' => 'UsuarioController@update',
        'as' => 'usuarios.update'
    ]
);

Route::delete('/usuarios/{id}',
    [
        'uses' => 'UsuarioController@destroy',
        'as' => 'usuarios.destroy'
    ]
);
