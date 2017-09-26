<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    protected $fillable = [
    	'id',
    	'nome',
    	'descricao',
    	'obsevacao',
    	'desativado',
    	'categorias_id',
    	'usuarios_id'
    ];


    protected $table = "processos";

    
    public function categoria(){
        return $this->hasOne(Categoria::class,'id','categorias_id');
    }

     public function usuario(){
        return $this->hasOne(Usuario::class,'id','usuarios_id');
    }
}
