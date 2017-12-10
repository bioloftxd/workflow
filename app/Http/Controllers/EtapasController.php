<?php

namespace App\Http\Controllers;

use App\Anexo;
use App\Categoria;
use App\Etapa;
use App\Processo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtapasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etapas = Etapa::all()->where("desativado", "!=", 1);
        return view('etapas.index', ["etapas" => $etapas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etapas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $etapa = new Etapa();
        $etapa->processos_id = ($request->processos_id) ? $request->processos_id : 0;
        $etapa->nome = ($request->nome) ? $request->nome : "Sem nome.";
        $etapa->descricao = ($request->descricao) ? $request->descricao : "Sem descrição.";
        $etapa->observacao = ($request->observacao) ? $request->observacao : "Sem observações.";
        $etapa->verificacao = ($request->verificacao == 0) ? 0 : 1;
        if ($request->processos_id == null) {
            return view("etapas.create", ["mensagem" => "Número do processo inválido!", "etapa" => $etapa]);
        }
        if ($request->nome == null) {
            return view("etapas.create", ["mensagem" => "Nome da etapa obrigatório!", "etapa" => $etapa]);
        }
//        strlen($item->getClientOriginalExtension()); Retorna o tamanho da string de extensão
//        $item->getClientOriginalExtension(); Retorna o extensão
//        $item->getSize(); Retorna o tamanho do arquivo
//        $item->storeAs("PASTA", "NOME DO ARQUIVO.extensão"); Escolhe o nome do arquivo
        DB::beginTransaction();
        try {
            $etapa->save();
            if (isset($request->anexo)) {
                foreach ($request->anexo as $item) {
                    Anexo::create([
                        'etapa_id' => $etapa->id,
                        'nome' => $item->getClientOriginalName(),
                        'caminho' => $item->store("modelos")
                    ]);
                }
            }
            DB::commit();
            return view("etapas.create");
        } catch (\Throwable $error) {
            DB::rollback();
            return $error;
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
        $etapa = Etapa::find($id);
        return view("etapas.show", ["etapa" => $etapa]);
    }

    public function finalizar()
    {
        return redirect()->action("ProcessosController@index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etapa = Etapa::find($id);
        return view("etapas.edit", ["etapa" => $etapa]);
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
        $etapa = Etapa::find($id);
        $etapa->nome = ($request->nome) ? $request->nome : "Sem nome.";
        $etapa->descricao = ($request->descricao) ? $request->descricao : "Sem descrição.";
        $etapa->observacao = ($request->observacao) ? $request->observacao : "Sem observações.";
        $etapa->verificacao = ($request->verificacao == 0) ? 0 : 1;
        if ($request->processos_id == null) {
            return view("etapas.edit", ["mensagem" => "Número do processo inválido!", "etapa" => $etapa]);
        }
        if ($request->nome == null) {
            return view("etapas.edit", ["mensagem" => "Nome da etapa obrigatório!", "etapa" => $etapa]);
        }
        DB::beginTransaction();
        try {
            $etapa->save();
            if (isset($request->anexo)) {
                foreach ($request->anexo as $item) {
                    Anexo::create([
                        'etapa_id' => $etapa->id,
                        'nome' => $item->getClientOriginalName(),
                        'caminho' => $item->store("modelos")
                    ]);
                }
            }
            DB::commit();
            $categorias = Categoria::all()->where("desativado", "!=", 1);
            $processo = Processo::find($request->processos_id);
            return view("processos.edit", ["mensagem" => "Alterações salvas!", "processo" => $processo, "id" => $etapa->processos_id, "categorias" => $categorias]);
        } catch (\Throwable $error) {
            DB::rollback();
            return $error;
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
        $etapa = Etapa::find($id);
        $etapa->desativado = 1;
        $anexos = Anexo::all()->where("etapa_id", "=", $id);
        DB::beginTransaction();
        try {
            if (isset($anexos)) {
                foreach ($anexos as $anexo) {
                    $anexo->desativado = 1;
                    $anexo->save();
                }
            }
            $etapa->save();
            DB::commit();
            $categorias = Categoria::all()->where("desativado", "!=", 1);
            $processo = Processo::find($etapa->processos_id);
            return view("processos.edit", ["mensagem" => "Etapa removida!", "processo" => $processo, "id" => $etapa->processos_id, "categorias" => $categorias]);
        } catch (\Throwable $error) {
            DB::rollback();
            return $error;
        }
    }
}
