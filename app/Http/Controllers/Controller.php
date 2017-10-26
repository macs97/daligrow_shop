<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

abstract class Controller extends BaseController
{
    abstract protected function getValue();
    abstract protected function getFieldValue($data);
    abstract protected function getFieldValueUpdate($data,$model,$request);
    
    public function getAll(){
        return response()->json($this->getValue()->all());
    }
    
     public function getById($id){
        return response()->json($this->getValue()->find($id));
    }

    public function save(Request $request){
        if($request->isJson()){
            try{
                $data = $request->json()->all();                
                $dataResponse = $this->getValue()->create($this->getFieldValue($data));
                return response()->json($dataResponse);
            }
            catch(ModelNotFoundException $e)
            {
                return response()->json(['error'=>'No content'],406);
            }            
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }

    function delete(Request $request, $id){
        if($request->isJson()){
            try{
                $dataResponse = $this->getValue()->findOrFail($id);
                $dataResponse->delete();
                return response()->json($dataResponse,200);
            }
            catch(ModelNotFoundException $e)
            {
                return response()->json(['error' => 'Not found'], 406);
            }
        }
        else{
            return response()->json(['error' => 'Not authorized'],401,[] );
        }
    }

    function update(Request $request, $id){
        if($request->isJson()){
            try{
                $data = $request->json()->all();
                $model = $this->getValue()->findOrFail($id);
                $model = $this->getFieldValueUpdate($data,$model,$request);
                $model->save();
                return response()->json($model,200);
            }
            catch(ModelNotFoundException $e){
                return response()->json(['error' => 'Not found'],406);
            }
        }
        else{
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }
}
