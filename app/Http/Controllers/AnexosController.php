<?php

namespace App\Http\Controllers;

use App\Anexo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnexosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anexos = Anexo::all()->where("desativado", "!=", 1);
        return view("anexos.index", ["anexos" => $anexos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $anexo->save();
            DB::commit();
            return 1;
        } catch (\Throwable $error) {
            DB::rollback();
            return $error->erroInfo[1];
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        DB::beginTransaction();
        try {
            $anexo->save();
            DB::commit();
            return 1;
        } catch (\Throwable $error) {
            DB::rollback();
            return $error->erroInfo[1];
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
        $anexo = Anexo::find($id);
        $anexo->desativado = 1;
        DB::beginTransaction();
        try {
            $anexo->save();
            DB::commit();
            return 1;
        } catch (\Throwable $error) {
            DB::rollback();
            return $error->errorInfo[1];
        }
    }
}
