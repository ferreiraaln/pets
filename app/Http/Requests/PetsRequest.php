<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PetsRequest extends ValidationRequest{

    public function __construct(Request $request){
        $this->validation($request);
    }

    public function validation($request){
        $data = $request->all();
        foreach ($data as $value) {
            if(!isset($value['nome'])){
                throw new HttpResponseException(
                    response()->json(['errors' => "Campo nome deve ser enviado"])
                );
            }

            if(strlen($value['nome']) < 2 ){
                throw new HttpResponseException(
                    response()->json(['errors' => "O nome deve ter no minimo dois caracteres"])
                );
            }

            if(!isset($value['especie'])){
                throw new HttpResponseException(
                    response()->json(['errors' => "Campo especie deve ser enviado"])
                );
            }

            $especie = DB::table('especies')->where('tipo', $value['especie'])->first();
            if(!isset($especie)){
                throw new HttpResponseException(
                    response()->json(['errors' => "A especie '".$value['especie']. "' nao existe. Envie C (cao) ou G (gato)" ])
                );
            }
        }
    }
}
