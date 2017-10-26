<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});


$app->post('/users/login', ['uses'=>'UsuarioController@login']);
$app->post('/cliente/login', ['uses'=>'ClienteController@login']);

//Usuario
    $app->get('/users', ['uses'=>'UsuarioController@getAll']);
    $app->get('/users/{id}', ['uses'=>'UsuarioController@getById']);
    $app->post('/users', ['uses'=>'UsuarioController@save']);
    $app->put('/users/{id}', ['uses'=>'UsuarioController@update']);
    $app->delete('/users/{id}', ['uses'=>'UsuarioController@delete']);
//End

//Categoria
    $app->get('/categoria', ['uses'=>'CategoriaController@getAll']);
    $app->get('/categoria/{id}', ['uses'=>'CategoriaController@getById']);
    $app->post('/categoria', ['uses'=>'CategoriaController@save']);
    $app->put('/categoria/{id}', ['uses'=>'CategoriaController@update']);
    $app->delete('/categoria/{id}', ['uses'=>'CategoriaController@delete']);
//End

//Cliente
    $app->get('/cliente', ['uses'=>'ClienteController@getAll']);
    $app->get('/cliente/{id}', ['uses'=>'ClienteController@getById']);
    $app->post('/cliente', ['uses'=>'ClienteController@save']);
    $app->put('/cliente/{id}', ['uses'=>'ClienteController@update']);
    $app->delete('/cliente/{id}', ['uses'=>'ClienteController@delete']);
//End Cliente

//Producto
    $app->get('/producto', ['uses'=>'ProductoController@getAll']);
    $app->get('/producto/{id}', ['uses'=>'ProductoController@getById']);
    $app->post('/producto', ['uses'=>'ProductoController@save']);
    $app->put('/producto/{id}', ['uses'=>'ProductoController@update']);
    $app->delete('/producto/{id}', ['uses'=>'ProductoController@delete']);
//End Producto

//Rol
    $app->get('/rol', ['uses'=>'RolController@getAll']);
    $app->get('/rol/{id}', ['uses'=>'RolController@getById']);
    $app->post('/rol', ['uses'=>'RolController@save']);
    $app->put('/rol/{id}', ['uses'=>'RolController@update']);
    $app->delete('/rol/{id}', ['uses'=>'RolController@delete']);
//End Rol.



$app->group(['middleware' => 'auth'], function () use ($app) {    
    //Pedidos
    $app->get('/pedido', ['uses'=>'PedidoController@getAllDetalle']);
    $app->get('/rol/{id}', ['uses'=>'PedidoController@getById']);
    $app->post('/pedido', ['uses'=>'PedidoController@save']);
    $app->put('/pedido/{id}', ['uses'=>'PedidoController@update']);
    $app->delete('/rol/{id}', ['uses'=>'PedidoController@delete']);
    //End
});