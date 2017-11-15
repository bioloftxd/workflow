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
        'usuario_id'
    ];


    protected $table = "processos";


    public function categoria()
    {
        return $this->belongsTo(Categoria::class, "id", "categorias_id");
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id', 'usuario_id');
    }

    public function etapa()
    {
        return $this->hasMany(Etapa::class, "processos_id", "id");
    }
}
