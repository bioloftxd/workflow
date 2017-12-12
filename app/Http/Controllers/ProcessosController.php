<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Processo;
use App\Etapa;
use App\ProcessoIniciar;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $processos_finalizados = ProcessoIniciar::all()->where("finalizado", "!=", 0);
        $processos_abertos = ProcessoIniciar::all()->where("finalizado", "!=", 1);
        $processo_iniciar = ProcessoIniciar::all();

        return view('processos.index', compact('processos', 'processos_finalizados', 'processos_abertos', 'processo_iniciar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all()->where("desativado", "!=", 1);
        return view('processos.create', ["categorias" => $categorias]);
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
        $processo->categorias_id = ($request->categorias_id) ? $request->categorias_id : 0;
        $processo->usuario_id = ($request->usuario_id) ? $request->usuario_id : 0;
        if ($request->nome == null) {
            return view("processos.create", ["mensagem" => "Nome do processo obrigatório!", "processo" => $processo]);
            $categorias = Categoria::all()->where("desativado", "!=", 1);
            return view('processos.create', ["categorias" => $categorias, "mensagem" => "Nome do processo obrigatório!", "processo" => $processo]);
        }
        if ($request->descricao == null) {
            $categorias = Categoria::all()->where("desativado", "!=", 1);
            return view('processos.create', ["categorias" => $categorias, "mensagem" => "Descrição do processo obrigatório!", "processo" => $processo]);
        }
        if ($request->categorias_id == null) {
            $categorias = Categoria::all()->where("desativado", "!=", 1);
            return view('processos.create', ["categorias" => $categorias, "mensagem" => "Categoria do processo obrigatório!", "processo" => $processo]);
        }
        DB::beginTransaction();
        try {
            $processo->save();
            DB::commit();
            session()->put('processo', $processo);
            return view("etapas.create", ["processo" => $processo]);
        } catch (\Throwable $error) {
            DB::rollback();
            dd($error);
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
        $processo = Processo::find($id);
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
        $categorias = Categoria::all()->where("desativado", "!=", 1);
        session()->put('processo', $processo);
        return view("processos.edit", ["processo" => $processo, "categorias" => $categorias]);
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
        $processo->categorias_id = ($request->categorias_id) ? $request->categorias_id : $processo->categorias_id;
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
            session()->put('processo', $processo);
            return redirect()->action("ProcessosController@index");
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
        $processo = Processo::find($id);
        $processo->desativado = 1;
        DB::beginTransaction();
        try {
            $processo->save();
            DB::commit();
//            $processos = Processo::all()->where("desativado", "!=", 1);
//            return view("processos.index", ["mensagem" => "Processo removido!", "processos" => $processos]);
            return redirect()->action("ProcessosController@index");
        } catch (\Throwable $error) {
            DB::rollback();
            return $error->errorInfo[1];
        }
    }

    public function start(Request $request)
    {
        $id = $request->id;
        $etapas = [];
        $temp = Etapa::all()->where("desativado", "!=", 1)->where("processos_id", "=", $id);
        foreach ($temp as $a) {
            $etapas[] = $a;
        }
        $processo = DB::table('processos')->where('id', $id)->first();
        $verificar = DB::table('processo_iniciar')->where('processos_id', $processo->id)->first();

        if ($verificar == null or $verificar->finalizado === 1) {
            $inicia = new ProcessoIniciar();

            date_default_timezone_set('America/Cuiaba');
            $date = date('Y-m-d H:i');
            $inicia->nome = $processo->nome;
            $inicia->processos_id = $processo->id;
            $inicia->usuario_id = Auth::id();
            $inicia->data_inicio = $date;
            $inicia->data_final = $date;
            $inicia->finalizado = 0;
            $inicia->save();
            session()->put("id_processo", $inicia->id);
        }
        return view("processos/inicioProcesso", ['etapas' => $etapas]);
    }

    public function finish($id)
    {
        $pf = ProcessoIniciar::where("processos_id", "=", $id)->first();
        $pf->finalizado = 1;
        $pf->save();
        $processos = Processo::all()->where("desativado", "!=", 1);
        $processos_abertos = ProcessoIniciar::all()->where("finalizado", "==", 0);
        $processos_finalizados = ProcessoIniciar::all()->where("finalizado", "==", 1);
        return view('processos.index', compact('processos', 'processos_finalizados', 'processos_abertos'));
    }

    public function sequencia($id)
    {
        $paberto = ProcessoIniciar::where('id', $id)->first();
        $etapas = Etapa::all()->where("processos_id", "=", $paberto->processos_id);
        return view('processos/inicioProcesso', ['etapas' => $etapas]);
    }
}
