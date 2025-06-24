<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $fillable = ['id', 'nome', 'id_estado'];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
