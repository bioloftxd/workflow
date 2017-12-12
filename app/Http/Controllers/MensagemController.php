<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;
use App\Messenger;
use App\Processo;
use App\Etapa;

class MensagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userLogado = Auth::user()->id;

        $processo = Processo::where("usuario_id", $userLogado)->select('id')->first();
        
        if($processo != NULL){
            $processo_id = $processo->id;
            $mensagens = Messenger::where("processo_id", $processo_id)->get();
            $mensagem = "1";

            return view("mensagem.index", compact("processo", "mensagens", "mensagem"));
        }
        else{
            $mensagem = "0";
            return view("mensagem.index", compact("mensagem"));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMensagem($processo, $etapa)
    {
        $processos = DB::table('processos')->where('id', $processo)->first();
        $etapas    = DB::table('etapas')->where('id', $etapa)->first();

        return view("mensagem.create", ["processo" => $processos, "etapa" => $etapas]);
    }

    public function create()
    {
        return('Está retornanndo pra create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm = $request->all();

        $admin = DB::table('processos')->where("id", $dataForm['processo_id'])->select('usuario_id')->first();

        $insert = Messenger::create([
            'user_id'       => $dataForm['usuario_id'],
            'processo_id'   => $dataForm['processo_id'],
            'admin_id'      => $admin->usuario_id,
            'etapa_id'      => $dataForm['etapa_id'],
            'mensagem'      => $dataForm['mensagem'],
            'status_admin'  => "false"
        ]);


        if($insert)
            return redirect('/processos');
        else
            return "Error";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etapas = Etapa::where("processos_id", $id)->get();

        $ids = $id;

        return view("mensagem.show", compact("etapas", "ids"));

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
    public function update($id)
    {
        $update = Messenger::where("id", $id)->update(array('status_admin' => 'true'));

        if($update){
            return redirect()->route('mensagem.index');
        }
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
