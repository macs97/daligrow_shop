<?php namespace  App\Models;

 use Illuminate\Database\Eloquent\Model;
 

 class Producto extends Model
 {
     protected $table = 'Producto';
     protected $fillable = ['id','nombre', 'precio', 'marca', 'descripcion', 'codCategoria'];
     public $timestamps = false;     
 }