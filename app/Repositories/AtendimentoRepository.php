<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Repositories\AppRepository;
use App\Models\Atendimento;
use App\Models\Pets;
use App\Models\Especie as Especie;
use Illuminate\Support\Facades\DB;

class AtendimentoRepository extends AppRepository{
    
    protected $model;
    
    public function __construct(Atendimento $model){
        $this->model = $model;
    }

    public function setData($request){
        $data = $request->all();
        $result = array();
        $aux = array();

        foreach ($data as $value) {
            $aux['descricao'] = $value['descricao'];
            $aux['id_pet'] = $value['id_pet'];
            $aux['data_atendimento'] = $value['data_atendimento'];
            array_push($result,$aux);
        }

        return $result;
    }

    public function getByName($name){
        $pets = Pets::query()->whereLike('nome', $name)->get();
        $result = array();
        foreach ($pets as $pet) {
            array_push($result,$this->getDados($pet) );
        }
        $arrayLimpo = array_filter($result);
        return $arrayLimpo;
    }

    public function getData($id){
        $pet = Pets::where('id_pets',$id)->first();

        if(is_null($pet)){
            return "pet nao encontrado";
        }

        if(empty($this->getDados($pet))){
            return "O pet {$pet->nome} ainda nao possui atendimento";
        }
        return $this->getDados($pet);
    }

    public function getDados($pet){
        $atendimentos = $pet->atendimentos()->get();
        $especie = $pet->especie()->first();
        $result = array();

        foreach ($atendimentos as  $value) {
            array_push(
                $result,
                "Em {$this->format_date($value->data_atendimento)} o pet {$pet->nome} ({$especie->nome}) {$value->descricao}"
            );
        }
        return $result;
    }

    public function format_date($date){
        return \Carbon\Carbon::parse($date)->format('d/m/Y');
    }
}
