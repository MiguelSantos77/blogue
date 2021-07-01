<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts=Post::all();
        return view('noticias.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('categorianome')->get();
        return view('noticias.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validação
        $data = $request->validate([
            'titulo' => 'required|max:255',
            'intro' => 'required|max:255',
            'corpo' => 'required',
            'textolink' => 'max:255',
            'link' => 'url|max:255',
            'categoria' => 'required|exists:categorias,id',
            'imagem' => 'image|mimes:jpg,jpeg,png|max:5000',
        ]);

        //gravar na bd
        $posts = new Post;
        $posts->titulo=$data['titulo'];
        $posts->intro=$data['intro'];
        $posts->corpo=$data['corpo'];
        $posts->textolink=$data['textolink'];
        $posts->link=$data['link'];
        $posts->user_id=Auth::user()->id;
        $posts->categoria_id =$data['categoria'];
        if ($request->has('imagem')) {
            $img = $request->file('imagem');
            $imgnome= time() . rand(0, 99999) . rand(0, 99999).'.' . $img->getClientOriginalExtension();
            $path = 'appimages/noticias/';
            $img->move($path,$imgnome);
            $posts->imagem=$imgnome;
        }
        $posts-> save();
        return redirect(route('noticias.index'))->with('status','post criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Post::findOrFail($id);
        return view('noticias.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::findOrFail($id);
        $categorias = Categoria::orderBy('categorianome')->get();
        return view('noticias.edit', compact('post', 'categorias'));
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
        Post::where('id',$id)->delete();
        return redirect(route('noticias.index'))->with('status', 'Noticia eliminada com sucesso!');

    }
}
