<?php namespace  App\Models;

 use Illuminate\Database\Eloquent\Model;
 

 class Categoria extends Model
 {
     protected $table = 'Categoria';
     protected $fillable = ['id','nombre'];
     public $timestamps = false;     
 }