<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Repositories\AppRepository;
use App\Models\Pets;

class PetsRepository extends AppRepository{
    
    protected $model;
    
    public function __construct(Pets $model){
        $this->model = $model;
    }

    public function store($request){
        $data = [
            'nome' => $request->input('nome'),
            'id_especie' => $request->input('id_especie')
        ];
        //$data = $this->setDataPayload($request);
        $item = $this->model;
        $item->fill($data);
        $item->save();
         return $item;
    }

    public function show($id){
        return $this->model->findOrFail($id);
    }

    public function delete($id){
        return $this->model->destroy($id);
    }
}
