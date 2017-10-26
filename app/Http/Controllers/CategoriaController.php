<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class CategoriaController extends Controller
{
    protected function getValue() {
        return new Categoria;
    }
    protected function getFieldValue($data) {
        return [   
                'nombre' => $data['nombre']                
        ];
    }   
    protected function getFieldValueUpdate($data,$categoria,$request) {
        $categoria->nombre = $data['nombre'];         
        return $categoria;
    }
}
