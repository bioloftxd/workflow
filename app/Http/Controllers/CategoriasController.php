<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all()->where("desativado", "!=", 1);
        return view("categorias.index", ["categorias" => $categorias, "mensagem" => null]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("categorias.create", ["mensagem" => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nome = ($request->nome) ? $request->nome : "Sem nome";
        $categoria->save();

        $mensagem = "Categoria Cadastrada!";

        return $mensagem;

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        return $categoria;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);

        return view("categorias.edit", ["categorias" => $categoria, "mensagem" => null]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);

        $categoria->nome = ($request->nome) ? $request->nome : $categoria->nome;
        $categoria->desativado = ($request->desativado) ? $request->desativado : $categoria->desativado;
        $categoria->save();

        $mensagem = "Categoria atualizada!";

        return $mensagem;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->desativado = 1;
        $categoria->save();

        $mensagem = "Categoria Removida!";

        return $mensagem;
    }
}
