<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/** @var Router $router */

$router->get('/', function () use ($router) {
    return 'Api Laravel 9 working on ' . $router->app->version();
});

$router->group(['prefix' => 'auth'], function ($router) {

    $router->post('register',  'RegisterController@register');

    $router->post('login', 'RegisterController@login');
});

$router->group(['prefix' => 'v1', 'middleware' => 'auth:sanctum'], function ($router) {
    $router->resource('products', API\ProductController::class);
});
