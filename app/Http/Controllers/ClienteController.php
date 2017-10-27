<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    protected function getValue() {
        return new Cliente;
    }
    protected function getFieldValue($data) {
        
        return [
                'documento' => $data['documento'],
                'username'   => $data['username'],
                'password'   => Hash::make($data['password']),   
                'api_token' => str_random(60)
                ];
    }
    protected function getFieldValueUpdate($data,$cliente,$request) {
        $cliente->documento = $data['documento'];
        $cliente->username = $data['username'];
        $cliente->password = $data['password'];
        return $cliente;
    }

    public function login(Request $request){  
        try{
          $data = $request->json()->all();      
          $user = Cliente:: where('username', $data['username'])->first(); 
          if($user && Hash::check($data['password'], $user->password)){            
            $token=base64_encode(str_random(60));
            $user->api_token=$token;        
            $user->save();       
            return response()->json($user,200);
          }
          else{
            return response()->json(['error'=>'Datos invalidos'],200);
          }
        }
        catch(ModelNotFoundException $e)
        {
          return response()->json(['error'=>'Datos invalidos'],406);
        }
      }
}
