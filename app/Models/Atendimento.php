<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model{
    protected $table = 'atendimentos';
    protected $fillable = ['descricao', 'data_atendimento', 'id_pets'];

    public function pets(){
        return $this->belongsToMany(Pets::class,'id_pet','id_pets');
    }
}
