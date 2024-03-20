<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use Illuminate\Http\Request;
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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Authentication Routes
$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('login', ['middleware' => 'auth_basic', 'uses' => 'Authentication@login']);
    $router->post('refresh-token', function () {
        return response()->json(['data' => 2]);
    });
});

// Menu Routes
$router->group(['prefix' => 'admin/menu'], function () use ($router) {
    $router->get('list/{page}/{limit}', ['middleware' => 'auth_jwt','uses' => 'Menu@list']);
    $router->get('detail/{id_menu}', ['uses' => 'Menu@detail']);
    $router->post('create', ['uses' => 'Menu@create']);
    $router->put('update/{id_menu}', ['uses' => 'Menu@update']);
    $router->delete('delete/{id_menu}', ['uses' => 'Menu@delete']);
});

$router->group(['prefix' => 'admin/category'], function () use ($router) {
    $router->get('list/{page}/{limit}', ['uses' => 'Category@list']);
    $router->get('detail/{id}', ['uses' => 'Category@detail']);
    $router->post('create', ['uses' => 'Category@create']);
    $router->put('update/{id}', ['uses' => 'Category@update']);
    $router->delete('delete/{id}', ['uses' => 'Category@delete']);
});