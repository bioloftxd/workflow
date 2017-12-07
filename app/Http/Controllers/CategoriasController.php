<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view("categorias.index", ["categorias" => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("categorias.create");
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
        if($request->nome==null){
           return redirect()->action("CategoriasController@index");
       }
        DB::beginTransaction();
        try {
            $categoria->save();
            DB::commit();
            return redirect()->action("CategoriasController@index");
        } catch (\Throwable $error) {
            DB::rollback();
            return $error->errorInfo[1];
        }
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
        $categorias = Categoria::all()->where("desativado","!=",1);
        return view("categorias.edit", ["categoria" => $categoria,'categorias'=>$categorias]);
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
        

          if($request->nome==null){
            $categoria = Categoria::find($id);
            $categorias = Categoria::all()->where("desativado","!=",1);
            return view("categorias.edit", ["categoria" => $categoria,'categorias'=>$categorias]);
       }
        DB::beginTransaction();
        try {
            $categoria->save();
            DB::commit();
            return redirect()->action("CategoriasController@index");
        } catch (\Throwable $error) {
            DB::rollback();
            return $error->errorInfo[1];
        }
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
        DB::beginTransaction();
        try {
            $categoria->save();
            DB::commit();
            return redirect()->action("CategoriasController@index");
        } catch (\Throwable $error) {
            DB::rollback();
            return $error->errorInfo[1];
        }
    }
}
