<?php

namespace App\Http\Controllers;

use App\Processo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcessosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $processos = Processo::all()->where("desativado", "!=", 1);
        return view('processos.index', ["processos" => $processos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('processos.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $processo = new Processo();
        $processo->nome = ($request->nome) ? $request->nome : "Sem nome.";
        $processo->descricao = ($request->descricao) ? $request->descricao : "Sem descrições.";
        $processo->observacao = ($request->observacao) ? $request->observacao : "Sem observações";
        $processo->categoria_id = ($request->categoria_id) ? $request->categoria_id : 0;
        $processo->usuario_id = ($request->usuario_id) ? $request->usuario_id : 0;
        if ($request->nome == null) {
            return view("processos.index", ["mensagem" => "Nome do processo obrigatório!", "processo" => $processo]);
        }
        if ($request->descricao == null) {
            return view("processos.index", ["mensagem" => "Descrição do processo obrigatório!", "processo" => $processo]);
        }
        DB::beginTransaction();
        try {
            $processo->save();
            DB::commit();
            $processos = Processo::all()->where("desativado", "!=", 1);
            return view("processos.index", ["mensagem" => "Alterações salvas!", "processos" => $processos]);
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
        $processo = Processos::find($id);
        return view("processos.show", ["processo" => $processo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $processo = Processo::find($id);
        return view("processos.edit", ["processo" => $processo]);
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
        $processo = Processo::find($id);
        $processo->nome = ($request->nome) ? $request->nome : $processo->nome;
        $processo->descricao = ($request->descricao) ? $request->descricao : $processo->descricao;
        $processo->observacao = ($request->observacao) ? $request->observacao : $processo->observacao;
        $processo->categoria_id = ($request->categoria_id) ? $request->categoria_id : $processo->categoria_id;
        $processo->usuario_id = ($request->usuario_id) ? $request->usuario_id : $processo->usuario_id;
        if ($request->nome == null) {
            return view("processos.edit", ["mensagem" => "Nome do processo obrigatório!", "processo" => $processo]);
        }
        if ($request->descricao == null) {
            return view("processos.edit", ["mensagem" => "Descrição do processo obrigatório!", "processo" => $processo]);
        }
        DB::beginTransaction();
        try {
            $processo->save();
            DB::commit();
            $processos = Processo::all()->where("desativado", "!=", 1);
            return view("processos.index", ["mensagem" => "Alterações salvas!", "processos" => $processos]);
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
        $processo = Processo::find($id);
        $processo->desativado = 1;
        DB::beginTransaction();
        try {
            $processo->save();
            DB::commit();
            $processos = Processo::all()->where("desativado", "!=", 1);
            return view("processos.index", ["mensagem" => "Processo removido!", "processos" => $processos]);
        } catch (\Throwable $error) {
            DB::rollback();
            return $error->errorInfo[1];
        }
    }
}
