<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    protected $primaryKey = 'id_especie';
    protected $fillable = ['nome','tipo'];

    public function pets(){
        return $this->belongsTo(Pets::class,'id_especie','id_especie');
    }
}
