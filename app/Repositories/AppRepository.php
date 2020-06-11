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
 
    abstract protected function store($request);

    abstract public function show($id);

    abstract public function delete($id);
}
