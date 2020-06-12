<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

Abstract class AppRepository{

    protected $model;
 
    public function __construct(Model $model){
        $this->model = $model;
    }
 
    public function get(){
        return $this->model->get();
    }

    public function paginate($request){
        return $this->model->paginate($request->input('limit', 10));
    }
 
    public function store($request){
        $data = $this->setData($request);
        $item = $this->model;
        foreach ($data as $value) {
            $item::create($value); 
        }
        return $item;
    }

    public function show($id){
        return $this->model->findOrFail($id);
    }

    public function delete($id){
        return $this->model->destroy($id);
    }

    abstract public function setData($request);
}
