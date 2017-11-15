<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    protected $fillable = [
        'id',
        'etapas_id',
        'nome',
        'caminho',
        'desativado'
    ];

    protected $table = "anexos";


    public function etapa()
    {
        return $this->belongsTo(Etapa::class, "id", "etapas_id");
    }
}
