<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comentario;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
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
        //
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
            'id_post' => 'required',
            'conteudo' =>'required|string|max:128'
        ]);

        $id_post = $request->get('id_post');

        $comentario = new Comentario([
            'id_post' => $id_post,
            'id_responde' => $request->get('id_responde') ?? null,
            'conteudo' => $request->get('conteudo'),
            'id_usuario' => Auth::user()->id
        ]);

        try {
            $comentario->save();
        }
        catch (Exception $e) {
            return back()->with('exception', $e->getMessage());
        }

        return back()->with('success', 'Comentário enviado! <a href="#comentario-' . $comentario->id . '">Visualizar</a>');
    }
        
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_post)
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
