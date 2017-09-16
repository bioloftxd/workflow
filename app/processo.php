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
    	'id_categoria',
    	'id_etapa',
    	'id_usuario'
    ];
}
