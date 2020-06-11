<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    protected $fillable = ['descricao', 'data_atendimento', 'id_pets'];
}
