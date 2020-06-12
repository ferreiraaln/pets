<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PetsRepository;
use App\Http\Requests\PetsRequest;


class PetsController extends Controller
{

    protected $repository;
    public function __construct(PetsRepository $repository){
        $this->repository = $repository;
    }

    public function index(Request $request){
        $items = $this->repository->paginate($request);
        return response()->json(['items' => $items],200);
    }

    public function store(PetsRequest $request){
        try {
            $item = $this->repository->store($request);
            return response()->json(['item' => "Registro cadastrado com sucesso"],200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function show($id){
        try {
            if(!intval($id)){
                $item = $this->repository->getByName($id);
            }else{
                $item = $this->repository->show($id);
            }
            
            return response()->json(['item' => $item],200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function destroy($id){
        try {
            $this->repository->delete($id);
            return response()->json(['item' => "Registro deletado com sucesso"], 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
}
