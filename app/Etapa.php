<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    protected $fillable = [
        'id',
        'processos_id',
        'nome',
        'descricao',
        'obsevacao',
        'verificacao',
        'desativado'
    ];

    protected $table = "etapas";

    public function processo()
    {
        return $this->belongsTo(Processo::class, "id", "processos_id");
    }

    public function anexo()
    {
        return $this->hasMany(Anexo::class, "etapas_id", "id");
    }
}
