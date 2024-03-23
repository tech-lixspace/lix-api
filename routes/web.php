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

/*
ROLE GUIDE
1 = Super Admin
2 = Admin (Branches)
3 = Chef
4 = Cashier
5 = Consumer
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
    $router->get('list/{page}/{limit}', ['middleware' => ['auth_jwt', 'role_guard:1,2'], 'uses' => 'Menu@list']);
    $router->get('detail/{id}', ['middleware' => ['auth_jwt', 'role_guard:1,2'], 'uses' => 'Menu@detail']);
    $router->post('create', ['middleware' => ['auth_jwt', 'role_guard:1,2'], 'uses' => 'Menu@create']);
    $router->put('update/{id}', ['middleware' => ['auth_jwt', 'role_guard:1,2'], 'uses' => 'Menu@update']);
    $router->delete('delete/{id}', ['middleware' => ['auth_jwt', 'role_guard:1,2'], 'uses' => 'Menu@delete']);
});

$router->group(['prefix' => 'admin/category'], function () use ($router) {
    $router->get('list/{page}/{limit}', ['middleware' => ['auth_jwt', 'role_guard:1,2'], 'uses' => 'Category@list']);
    $router->get('detail/{id}', ['middleware' => ['auth_jwt', 'role_guard:1,2'], 'uses' => 'Category@detail']);
    $router->post('create', ['middleware' => ['auth_jwt', 'role_guard:1,2'], 'uses' => 'Category@create']);
    $router->put('update/{id}', ['middleware' => ['auth_jwt', 'role_guard:1,2'], 'uses' => 'Category@update']);
    $router->delete('delete/{id}', ['middleware' => ['auth_jwt', 'role_guard:1,2'], 'uses' => 'Category@delete']);
});