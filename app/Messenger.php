<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messenger extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'admin_id',
        'processo_id',
        'etapa_id',
        'mensagem',
        'status_user',
        'status_admin'
    ];
}
