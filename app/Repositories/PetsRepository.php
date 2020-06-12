<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Repositories\AppRepository;
use App\Models\Pets;
use App\Models\Especie as Especie;
use Illuminate\Support\Facades\DB;

class PetsRepository extends AppRepository{
    
    protected $model;
    
    public function __construct(Pets $model){
        $this->model = $model;
    }

    public function setData($request){
        $data = $request->all();
        $result = array();

        foreach ($data as $value) {
            $item = DB::table('especies')->where('tipo', $value['especie'])->first();
            $value['id_especie'] = $item->id_especie;
            array_push($result, $value);
        }

        return $result;
    }

    public function getByName($name){
        return $this->model::query()->whereLike('nome', $name)->get();
    }

    public function getData($request){
        return $this->model->paginate($request->input('limit', 10));
    }
}
