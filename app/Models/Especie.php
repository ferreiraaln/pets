<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    protected $primaryKey = 'id_especie';
    protected $fillable = ['nome','tipo'];
}
