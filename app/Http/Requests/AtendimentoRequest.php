<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AtendimentoRequest extends ValidationRequest{

    public function __construct(Request $request){
        $this->validation($request);
    }

    public function validation($request){
        $data = $request->all();
        foreach ($data as $value) {

            if(!isset($value['id_pet'])){
                throw new HttpResponseException(
                    response()->json(['errors' => "Campo id_pet deve ser enviado"])
                );
            }

            $pet = DB::table('pets')->where('id_pets', $value['id_pet'])->first();
            if(!isset($pet)){
                throw new HttpResponseException(
                    response()->json(['errors' => "O Pet enviado nao existe." ])
                );
            }

            if(!isset($value['data_atendimento'])){
                throw new HttpResponseException(
                    response()->json(['errors' => "Campo data_atendimento deve ser enviado"])
                );
            }
        }
    }
}
