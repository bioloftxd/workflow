<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'id',
        'nome',
        'desativado'
    ];

    protected $table = "categorias";

    public function processo()
    {
        return $this->hasMany(Processo::class, "categorias_id", "id");
    }
}
