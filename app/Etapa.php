<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
     protected $fillable = [
    	'id',
    	'processo_id'
    	'nome',
    	'descricao',
    	'obsevacao',
    	'verificacao',
    	'desativado'
    ];
}
