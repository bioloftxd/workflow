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
    	'categoria_id',
    	'usuario_id'
    ];
}
