<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class processo extends Model
{
    protected $fillable = [
    	'id',
    	'nome',
    	'descricao',
    	'obsevacao',
    	'id_categoria',
    	'id_etapa',
    	'id_usuario'
    ];
}
