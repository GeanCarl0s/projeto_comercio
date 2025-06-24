<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = ['id', 'nome', 'sigla'];

    public function cidades()
    {
        return $this->hasMany(Cidade::class);
    }
}
