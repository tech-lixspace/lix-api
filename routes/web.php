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
$router->group(['prefix' => 'menu'], function () use ($router) {
    $router->get('list/{page}/{limit}', function ($page, $limit) {
        return response()->json(['data' => 2, 'page' => $page, 'limit' => $limit]);
    });
    $router->get('detail/{id_menu}', function ($id_menu) {
        return response()->json(['data' => $id_menu]);
    });
    $router->post('create', function () {
        return response()->json(['data' => 2]);
    });
    $router->put('update/{id_menu}', function ($id_menu) {
        return response()->json(['data' => 2]);
    });
    $router->delete('delete/{id_menu}', function ($id_menu) {
        return response()->json(['data' => $id_menu]);
    });
});