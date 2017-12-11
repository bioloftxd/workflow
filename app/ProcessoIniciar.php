<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessoIniciar extends Model
{
  protected $fillable = [
      'id',
      'processos_id',
      'usuario_id',
      'nome',
      'data_inicio',
      'data_final',
      'verificar',
      'finalizado',
  ];

  protected $table = "processo_iniciar";

  public function processo()
  {
      return $this->belongsTo(Processo::class, "id", "processos_id");
  }

  public function usuario()
  {
      return $this->hasMany(User::class, "usuario_id", "id");
  }
}
