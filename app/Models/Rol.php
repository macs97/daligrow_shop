<?php namespace  App\Models;

 use Illuminate\Database\Eloquent\Model;
 

 class Rol extends Model
 {
     protected $table = 'Rol';
     protected $fillable = ['id','rol'];
     public $timestamps = false;     
 }