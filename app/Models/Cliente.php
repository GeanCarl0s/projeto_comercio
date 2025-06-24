<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome', 'nome_fantasia', 'codigo_fiscal', 'inscricao_estadual',
        'data_nascimento', 'endereco', 'numero', 'bairro', 'id_estado',
        'id_cidade', 'foto',
    ];
}
