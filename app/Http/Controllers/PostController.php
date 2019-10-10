<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Usuario;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'titulo' => 'required|string|max:100',
            'resumo' => 'required|string|max:300',
            'conteudo' =>'required|string|json'
        ]);

        $post = new Post([
            'titulo' => $request->get('titulo'),
            'resumo' => $request->get('resumo'),
            'conteudo' => $request->get('conteudo'),
            'id_autor' => Auth::user()->id
        ]);

        try {
            $post->save();
        }
        catch (Exception $e) {
            return view("posts.create")->with('exception', $e->getMessage());
        }

        return redirect('/')->with('success', 'Postagem publicada!');
    }
        
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $usuario = Usuario::find($post->id_autor);
        return view('posts.view')->with('post', $post)->with('usuario', $usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
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
        $request->validate([
            'titulo' => 'required|string|max:100',
            'resumo' => 'required|string|max:300',
            'conteudo' =>'required|string|json'
        ]);

        $post = Post::find($id);
        $post->titulo = $request->get('titulo');
        $post->resumo = $request->get('resumo');
        $post->conteudo = $request->get('conteudo');

        try {
            $post->update();
        }
        catch (Exception $e) {
            return view("/")->with('exception', $e->getMessage());
        }

        return redirect("/")->with('success', 'Postagem atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect("/")->with('success', 'Postagem excluída!');
    }
}
