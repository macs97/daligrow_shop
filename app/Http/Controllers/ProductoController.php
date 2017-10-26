<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class ProductoController extends Controller
{  
    protected function getValue() {
        return new Producto;
    }
    protected function getFieldValue($data) {
        return [   
                    'nombre' => $data['nombre'],
                    'precio' => $data['precio'],
                    'marca' => $data['marca'],
                    'descripcion' => $data['descripcion'],
                    'codCategoria' => $data['codCategoria']              
                ];
    }
    protected function getFieldValueUpdate($data,$producto,$request) {
        $producto->nombre = $data['nombre'];
        $producto->precio = $data['precio'];
        $producto->marca = $data['marca'];
        $producto->descripcion = $data['descripcion'];
        $producto->codCategoria = $data['codCategoria'];
        return $producto;
    }
}    