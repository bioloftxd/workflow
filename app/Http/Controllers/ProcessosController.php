<?php

namespace App\Http\Controllers;

use App\Processo;

use Illuminate\Http\Request;

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
        return view('processos.index', ["processos" => $processos, "mensagem" => null]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('processos.create', ["mensagem" => null]);
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

        $processo->save();

        $processos = Processo::all()->where("desativado", "!=", 1);

        return view("processos.index", ["mensagem" => "Processo cadastrado com sucesso!", "processos" => $processos]);

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

        return view("processos.show", ["processo" => $processo, "mensagem" => null]);
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

        return view("processos.edit", ["processo" => $processo, "mensagem" => null]);
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

        $processo->save();

        $processos = Processo::all()->where("desativado", "!=", 1);

        return view("processos.index", ["mensagem" => "Alterações salvas!", "processos" => $processos]);
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
        $processo->save();

        $processos = Processo::all()->where("desativado", "!=", 1);

        return view("processos.index", ["mensagem" => "Processo removido!", "processos" => $processos]);
    }
}
