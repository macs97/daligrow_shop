<?php namespace  App\Models;

 use Illuminate\Database\Eloquent\Model;
 

 class Cliente extends Model
 {
     protected $table = 'Cliente';
     protected $fillable = ['id','documento', 'username', 'api_token','password'];
     protected $hidden = ['password'];
     public $timestamps = false;     
 }