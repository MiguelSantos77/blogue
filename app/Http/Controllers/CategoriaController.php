<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
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
        $categorias = Categoria ::all();
        return view('categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('categorias.create');
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
            'categorianome' => 'required|min:3|max:255',
        ]);

        //gravar na bd
        $categoria = new Categoria;
        $categoria->categorianome=$data['categorianome'];
        $categoria-> save();
        return redirect('/categorias/create')->with('status','Categoria criada com sucesso!');

        //Preparar a mensagem de feedback
        //redirecionar a app para o index
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
        $categoria = Categoria::findOrfail($id);
        return view('categorias.edit',compact('categoria'));
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
        $data = $request->validate([
            'categorianome' => 'required|min:3|max:255',
        ]);
        Categoria::where('id',$id)->update([
        'categorianome' => $data['categorianome']
        ]);
        //gravar na bd
        return redirect(route('categorias.edit',$id))->with('status','Categoria alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categoria::where('id',$id)->delete();
        return redirect(route('categorias.index',$id))->with('status','Categoria eliminada com sucesso!');
    }
}
