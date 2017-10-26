<?php

namespace App\Http\Controllers;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class RolController extends Controller
{
    
    protected function getValue(){
        return new Rol;
    }
    
    protected function getFieldValue($data){
        return  [  
                    'rol' => $data['rol']                
        ];
    }

    protected function getFieldValueUpdate($data,$rol,$request){
        $rol = Rol::findOrFail($id);
        $data = $request->json()->all();
        $rol->rol = $data['rol'];
        return $rol;
    }

}