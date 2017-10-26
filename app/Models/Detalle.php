<?php namespace  App\Models;

 use Illuminate\Database\Eloquent\Model;
 

 class Detalle extends Model
 {
     protected $table = 'detalle';     
     protected $fillable = ['producto_id','pedido_id', 'cantidad'];
     public $timestamps = false;     
     public function pedido()
     {
         return $this->belongsTo('App\Models\Pedido');
     }
 }