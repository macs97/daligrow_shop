<?php

namespace App\Http\Controllers;
use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    protected function getValue() {
        return new Pedido;
    }

    protected function getFieldValue($data) {
        return [
                'documento' => $data['fecha'],
                'username'   => $data['idcliente']
                ];
    }

    protected function getFieldValueUpdate($data,$pedido,$request) {
        $token = $request->header('api_token');
        dd($token);
        $cliente = Cliente::where('api_token', $token);
        $idCliente = $cliente->id;
        $pedido->fecha = $data['fecha'];
        $pedido->idcliente = $data['idcliente'];
        return $pedido;
    }
    
    public function getAllDetalle(Request $request){        
        if($request->isJson()){
            $pedidos = Pedido::with('detalles')->get();
            return response()->json($pedidos,200);
        }else{
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }
}
