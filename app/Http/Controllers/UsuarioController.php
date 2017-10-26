<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    protected function getValue() {
        return new Usuario;
    }
    protected function getFieldValue($data) {
        return [               
            'username'   => $data['username'],
            'password'   => Hash::make($data['password']),
            'codigoRol' => $data['codigoRol'],  
            'api_token' => str_random(60)            
        ];
    }   
    protected function getFieldValueUpdate($data,$usuario,$request) {
        $usuario->username = $data['username']; 
        $usuario->password = $data['password']; 
        $usuario->codigoRol = $data['codigoRol'];         
        return $usuario;
    }
    
    public function login(Request $request){  
        try{
          $data = $request->json()->all();      
          $user = Usuario:: where('username', $data['username'])->first(); 
          if($user && Hash::check($data['password'], $user->password)){
            
            $token=str_random(60);
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
