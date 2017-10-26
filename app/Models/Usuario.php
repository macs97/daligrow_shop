<?php namespace  App\Models;

 use Illuminate\Database\Eloquent\Model;
 

 class Usuario extends Model
 {
     protected $table = 'Usuario';
     protected $fillable = ['username','codigoRol','api_token','password'];
     protected $hidden = ['password'];
     public $timestamps = false;     
 }