<?php namespace  App\Models;

 use Illuminate\Database\Eloquent\Model;
 

 class Pedido extends Model
 {
     protected $table = 'Pedido';     
     protected $fillable = ['id','fecha', 'idcliente'];
     public $timestamps = false;
     public function detalles()
     {
         return $this->hasMany('App\Models\Detalle');
     }
 }