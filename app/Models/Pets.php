<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pets extends Model{
    protected $primaryKey = 'id_pets';
    protected $fillable = ['nome','id_especie'];
}
