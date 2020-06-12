<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AtendimentoRepository;

class AtendimentoController extends Controller{

    protected $repository;
    public function __construct(AtendimentoRepository $repository){
        $this->repository = $repository;
    }

    public function index(Request $request){
        $items = $this->repository->get($request);
        return response()->json(['items' => $items],200);
    }

    public function store(AtendimentoRequest $request){
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
                $item = $this->repository->getData($id);
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
