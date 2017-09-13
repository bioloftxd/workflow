<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
     protected $fillable = [
    	'id',
    	'nome',
    	'descricao',
    	'obsevacao',
    	'verificacao',
    	'desativado',
    	'id_anexo'
    ];
}
