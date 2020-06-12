<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pets extends Model{
    protected $primaryKey = 'id_pets';
    protected $fillable = ['nome','id_especie'];

    public function especie(){
        return $this->hasOne(Especie::class,'id_especie','id_especie');
    }

    public function atendimentos(){
        return $this->hasMany(Atendimento::class,'id_pet','id_pets');
    }
}
