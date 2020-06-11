<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pets extends Model
{
    protected $fillable = ['nome','id_especie'];
}
