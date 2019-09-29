<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:usuarios',
            'senha' =>'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
        ]);

        $usuario = new Usuario([
            'nome' => $request->get('nome'),
            'email' => $request->get('email'),
            'senha' => Hash::make($request->get('senha')),
            'role' => "normal"
        ]);

        try {
            $usuario->save();
        }
        catch (Exception $e) {
            return view("usuarios.create")->with('exception', $e->getMessage());
        }

        return redirect('/')->with('success', 'Usuario salvo com sucesso!');
    }
    
    public function auth(Request $request) {
        $this->validate($request, [
            'email'   => 'required|email',
            'senha'  => 'required'
        ]);
                
        if(Auth::attempt(['email' => $request->post('email'), 'password' => $request->post('senha')]))
        {
            return redirect('/')->with('success', 'Usuario autenticado com sucesso!');
        }
        else
        {
            return view("usuarios.login")->with('exception', 'Email/senha inválidos.');
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
