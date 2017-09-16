<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
 protected $fillable = [
    	'id',
    	'etapa_id',
    	'nome',
    	'caminho',
    	'desativado'
    ];
}
