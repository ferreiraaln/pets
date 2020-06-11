<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PetsRepository;


class PetsController extends Controller
{

    protected $repository;
    public function __construct(PetsRepository $repository){
        $this->repository = $repository;
    }

    public function index(Request $request){
        $items = $this->repository->paginate($request);
        return response()->json(['items' => $items]);
    }

    public function store(Request $request){
        try {
            $item = $this->repository->store($request);
            return response()->json(['item' => $item]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function show($id){
        try {
            $item = $this->repository->show($id);
            return response()->json(['item' => $item]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function destroy($id){
        try {
            $this->repository->delete($id);
            return response()->json([], 204);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
}
